document.addEventListener("DOMContentLoaded", function () {
  let imgSrc = sessionStorage.getItem("img");
  let movieTitle = sessionStorage.getItem("movie-title");

  getMovies(movieTitle);

  //faire un fetch pour récupérer les données de la page media
  
});

function setData(data) {
  let backgroundColor = document.body.backgroundColor;
  backgroundColor = data.backgroundColor;

  let critiqueDiv = document.querySelector(".critique");

  critiqueDiv.style.backgroundColor = data.critiqueBackgroundColor;

  let fontColor = document.querySelector(".prototype");
  fontColor = data.fontColor;

  let font = document.body.fontFamily;
  font = data.font;

  let fontTextAreaColor = document.querySelector(".critique");
  fontTextAreaColor = data.fontTextAreaColor;

  let movieName = document.querySelector(".movie-title"); //a gerer en api
  movieName.textContent = data.movieName;

  let sloganMovie = document.querySelector(".movie-slogan");
  sloganMovie.textContent = data.sloganMovie;

  let critique = document.querySelector(".critique");
  critique.innerHTML = data.critique;

  setCategoriesSelectionnees(data.categories.split(","));

  let img_background = document.querySelector(".movie-img");
  img_background.src = data.imageUrl;

  let img_backgroundTwo = document.querySelector(".img-background");
  img_backgroundTwo.src = data.imageUrl;

  let note = document.querySelector(".note");
  note.textContent = data.note;

  let directorName = document.querySelector(".nameOfDirector");
  directorName.textContent = data.directorName;

  let dateSortie = document.querySelector("#date-sortie");
  dateSortie.textContent = data.dateSortie;

  let movieTime = document.querySelector("#movie-time");
  movieTime.textContent = data.movieTime;
}




search.addEventListener("keyup", function (e) {
    const query = e.target.value;
  
    if (query.length >= 3) {
      getMovies(query);
      dropdown.show(); // Show dropdown when results are available
    } else {
      dropdown.hide(); // Hide dropdown when less than 3 characters
    }
  });
  
  async function getMovies(query) {
    const response = await fetch(
      `https://api.themoviedb.org/3/search/movie?api_key=74ce31f29121ab432588a38104eb24fe&query=${query}&language=fr-FR`
    );
    const data = await response.json();
  
    displayResults(data.results);
  }
  
  function displayResults(movies) {
    results.innerHTML = ""; // clear results
  
    for (let movie of movies) {
      const li = document.createElement("li");
      li.classList.add("dropdown-item");
      li.textContent = `${movie.title} (${movie.release_date.split("-")[0]})`;
  
      li.addEventListener("click", async function () {
        const director = await getDirector(movie.id);
        const duration = await getDuration(movie.id);
        displayMovieDetails(movie, director, duration);
        dropdown.hide(); // Hide dropdown after selection
      });
  
      results.appendChild(li);
    }
  }
  
  async function getDirector(movieId) {
    const response = await fetch(
      `https://api.themoviedb.org/3/movie/${movieId}/credits?api_key=74ce31f29121ab432588a38104eb24fe`
    );
    const data = await response.json();
    const director = data.crew.find((member) => member.job === "Director");
  
    return director ? director.name : "Inconnu";
  }
  
  async function getDuration(movieId) {
    const response = await fetch(
      `https://api.themoviedb.org/3/movie/${movieId}?api_key=74ce31f29121ab432588a38104eb24fe`
    );
    const data = await response.json();
  
    return data.runtime;
  }
  
  function displayMovieDetails(movie, director, duration) {
    let inputApi = document.querySelector("#search");
    let movieTitle = document.getElementById("movie-name");
    let movieTitleElement = document.querySelector(".movie-title");
    let img_background = document.querySelector(".movie-img");
    let img_backgroundTwo = document.querySelector(".img-background");
    let directorName = document.querySelector(".nameOfDirector");
    let dateSortie = document.querySelector("#date-sortie");
    let movieTime = document.querySelector("#movie-time");
  
    movieTime.textContent = `${duration} minutes`;
  
    inputApi.value = movie.title;
    movieTitle.value = movie.title;
    movieTitleElement.textContent = movie.title;
  
    dateSortie.textContent = movie.release_date.split("-")[0];
  
    directorName.textContent = `${director}`;
    img_background.src = `https://image.tmdb.org/t/p/w500${movie.poster_path}`;
    img_backgroundTwo.src = `https://image.tmdb.org/t/p/w500${movie.poster_path}`;
  
    // Append these to your DOM somewhere
  }