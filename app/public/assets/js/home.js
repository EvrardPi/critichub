document.addEventListener("DOMContentLoaded", function () {
  console.log("Youri a dit wouf wouf");
  var request = new XMLHttpRequest();

  request.open("GET", "/back-read-six-elementard", true);
  request.setRequestHeader("Content-Type", "application/json");
  request.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log("Youri a dit wouf wouf wouf");
      let data = JSON.parse(this.responseText);
      let mediaList = [];

      data.forEach(function (obj) {
        let media = {
          media_id: obj.id,
          movie_name: obj.movie_name,
          image_url: obj.image_url,
        };
        mediaList.push(media);
      });

      let movieListDiv = document.querySelector(".popular-movies-list");
      movieListDiv.innerHTML = ""; // Supprimez le contenu existant

      mediaList.forEach(function (media, index) {
        let newMovieDiv = `
      <a href="/media?id=${media.media_id}">
          <div class="popular-movies-element">
              <img class="movie-img" src="${
                media.image_url
              }" alt="Image du film">
              <h3 class="movie-title">${media.movie_name}</h3>
          </div>
      </a>`;
        movieListDiv.insertAdjacentHTML("beforeend", newMovieDiv);
      });
    }
  };
  request.onerror = function () {
    console.error("An error occurred during the transaction");
  };
  request.send();
});
