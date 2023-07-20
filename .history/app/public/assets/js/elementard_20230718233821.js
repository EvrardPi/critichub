document.addEventListener("DOMContentLoaded", function () {
  editorInit();
  inputControl();
  update();

  //colorpicker
  const colorPicker = document.getElementById("colorPicker");
  colorPicker.addEventListener("change", function () {
    const selectedColor = colorPicker.value; //Background color
    document.body.style.backgroundColor = selectedColor;
  });

  //colorpickerTwo
  const colorPickerTwo = document.getElementById("colorPickerTwo");
  colorPickerTwo.addEventListener("change", function () {
    let critiqueDiv = document.querySelector(".critique");
    let sectionBackground = document.querySelector(".first-section");
    let sectionBackgroundTwo = document.querySelector(".third-section");
    let selectedColorTwo = colorPickerTwo.value; //Critique Background color
    critiqueDiv.style.backgroundColor = selectedColorTwo;
    if (sectionBackground) {
      sectionBackground.style.backgroundColor = selectedColorTwo;
    }
    if (sectionBackgroundTwo) {
      sectionBackgroundTwo.style.backgroundColor = selectedColorTwo;
    }
  });

  //colorpickerThree
  const colorPickerThree = document.getElementById("colorPickerThree");
  colorPickerThree.addEventListener("change", function () {
    let selectedColorThree = colorPickerThree.value;
    let font = document.querySelector(".content");
    let fontSection = document.querySelector(".first-section");
    let fontSectionTwo = document.querySelector(".third-section");
    if (font) {
      font.style.color = selectedColorThree;
    }
    if (fontSection) {
      fontSection.style.color = selectedColorThree;
    }
    if (fontSectionTwo) {
      fontSectionTwo.style.color = selectedColorThree;
    }
  });

  //colorpickerFour
  const colorPickerFour = document.getElementById("colorPickerFour");
  colorPickerFour.addEventListener("change", function () {
    let selectedColorFour = colorPickerFour.value;
    let font = document.querySelector(".critique");
    font.style.color = selectedColorFour;
  });

  //colorpickerFive
  const colorPickerFive = document.getElementById("colorPickerFive");
  colorPickerFive.addEventListener("change", function () {
    let selectedColorFive = colorPickerFive.value;
    let badges = document.querySelectorAll(".badge");
    if (badges.length === 0) {
      return;
    } else {
      for (let i = 0; i < badges.length; i++) {
        badges[i].classList.remove("text-bg-dark");
        badges[i].style.backgroundColor = selectedColorFive;
      }
    }
  });

  //font family selector
  const fontSelect = document.getElementById("fontSelect");
  const body = document.body;
  fontSelect.addEventListener("change", function () {
    const selectedFont = fontSelect.value;
    body.style.fontFamily = selectedFont; //font selected
  });

  //rating selector
  const noteSelect = document.getElementById("note");
  noteSelect.addEventListener("change", function () {
    let note = document.querySelector(".note");
    note.textContent = noteSelect.value;
  });

  //radio button control
  const radioButtons = document.querySelectorAll(
    'input[name="inlineRadioOptions"]'
  );
  radioButtons.forEach(function (radioButton) {
    radioButton.addEventListener("change", function () {
      const selectedOption = document.querySelector(
        'input[name="inlineRadioOptions"]:checked'
      ).value;
      // Perform actions based on the selected option
      if (selectedOption === "option1") {
        let prototypeDiv = document.querySelector(".prototype");
        let data = saveData();
        prototypeDiv.innerHTML = "";
        createTemplateHTMLPoto1();
        setData(data);
        editorInit();
        inputControl();
      } else if (selectedOption === "option2") {
        let prototypeDiv = document.querySelector(".prototype");
        let data = saveData();
        prototypeDiv.innerHTML = "";
        createTemplateHTMLPoto2();
        setData(data);
        editorInit();
        inputControl();
      } else if (selectedOption === "option3") {
        // Action for option 3
        console.log("Option 3 selected");
        let prototypeDiv = document.querySelector(".prototype");
        let data = saveData();
        prototypeDiv.innerHTML = "";
        createTemplateHTMLPoto3();
        setData(data);
        editorInit();
        inputControl();
      }
    });
  });

  //sidebar control
  const closeBtn = document.querySelector(".control-btn-sidebar");
  const sidebar = document.querySelector(".side-bar");
  const icon = document.querySelector(".control");
  const prototype = document.querySelector(".prototype");

  closeBtn.addEventListener("click", function () {
    let img_background = document.querySelector(".img-background");
    let overlay = document.querySelector(".overlay");
    let controlBtn = document.querySelector(".control-btn-sidebar");
    if (sidebar.classList.contains("close")) {
      sidebar.classList.remove("close");
      icon.textContent = "close";
      icon.classList.remove("open");
      prototype.classList.remove("full");
      controlBtn.style.left = "460px";
      if (img_background) {
        img_background.classList.remove("full");
      }
      if (overlay) {
        overlay.classList.remove("full");
      }
    } else {
      sidebar.classList.add("close");
      icon.textContent = "keyboard_double_arrow_right";
      icon.classList.add("open");
      controlBtn.style.left = "20px";
      prototype.classList.add("full");
      if (img_background) {
        img_background.classList.add("full");
      }
      if (overlay) {
        overlay.classList.add("full");
      }
    }
  });
});

//editeur de texte
function execCmd(command) {
  document.execCommand(command, false, null);
}

function inputControl() {
  //input control
  let sloganFilm = document.getElementById("movie-slogan");
  let sloganFilmElement = document.querySelector(".movie-slogan");
  sloganFilm.addEventListener("input", function () {
    sloganFilmElement.textContent = sloganFilm.value;
  });
}

function editorInit() {
  // Récupère la div éditable et la div de sortie
  let editor = document.querySelector(".editor");
  let outputDiv = document.querySelector(".critique");

  // Récupère le texte de placeholder
  let placeholder = "Entrez votre Critique ici...";

  // Affiche ou masque le placeholder en fonction du contenu de l'éditeur
  function togglePlaceholder() {
    if (editor.innerHTML.trim() === "") {
      editor.setAttribute("data-placeholder", placeholder);
    } else {
      editor.removeAttribute("data-placeholder");
    }
  }

  // Gestionnaire d'événements pour la saisie de texte
  editor.addEventListener("input", function () {
    // Copie le contenu de la div éditable vers la div de sortie
    outputDiv.innerHTML = editor.innerHTML;

    // Affiche ou masque le placeholder en fonction du contenu de l'éditeur
    togglePlaceholder();
  });

  // Affiche le placeholder au chargement de la page si l'éditeur est vide
  togglePlaceholder();
}

// prototype 1 js generator
function createTemplateHTMLPoto1() {
  function generateHTML() {
    const html = `
          <div class="protopage-1">
        <div class="top">
          <img class="img-background" src="assets/images/elementard/wireframe.jpg" alt="img-background" />
        </div>
        <div class="container">
          <div class="first-section info">
            <img class="movie-img" src="assets/images/elementard/wireframe.jpg" alt="image" />
            <div class="title">
              <h2 class="movie-title">Nom Du Film</h2>
              <h3 class="movie-slogan">Slogan du film</h3>
            </div>
          </div>
          <div class="critique">
            <!-- Lorem ipsum... -->
          </div>
          <div class="third-section">
            <div class="mini-data">
              <h4>Date de sortie:</h4>
              <span id="date-sortie"></span>
              <h4>Durée du film:</h4>
              <span id="movie-time"></span>
              <div id="badgesContainer"></div>
            </div>
            <div class="social">
              <div class="social-layout">
                <span class="material-symbols-outlined icon"> favorite </span>
                <span>Nombre de like</span>
              </div>
              <div class="social-layout">
                <span class="material-symbols-outlined icon"> comment </span>
                <span>Nombre de commentaire</span>
              </div>
              <div class="social-layout">
                  <div class="noteContainer"><h2 class="note">4</h2><h2>/5</h2></div>
                  <span>Note des utilisateurs</span>
                </div>
            </div>
            <div class="director">
              <h3>Realisateur:</h3>
              <h3 class="nameOfDirector">John Doe</h3>
            </div>
          </div>
        </div>
      </div>
    `;

    return html;
  }
  let generatedHTML = generateHTML();
  document.querySelector(".prototype").innerHTML = generatedHTML;
}

// prototype 2 js generator
function createTemplateHTMLPoto2() {
  function generateHTML() {
    const html = `
        <div class="protopage-2">
          <div class="top">
            <img class="img-background" src="assets/images/elementard/wireframe.jpg" alt="img-background" />
          </div>
          <div class="container">
            <div class="first-section">
              <img class="movie-img" src="assets/images/elementard/wireframe.jpg" alt="image-movie" />
              <div class="title">
                <h2 class="movie-title">Nom Du Film</h2>
                <h3 class="movie-slogan">Slogan du film</h3>
              </div>
              <div class="mini-data">
                <h4>Date de sortie:</h4>
                <span id="date-sortie"></span>
                <h4>Durée du film:</h4>
                <span id="movie-time"></span>
                <div id="badgesContainer"></div>
              </div>
              <div class="social">
                <div class="social-layout">
                  <span class="material-symbols-outlined icon"> favorite </span>
                  <span>Nombre de like</span>
                </div>
                <div class="social-layout">
                  <span class="material-symbols-outlined icon"> comment </span>
                  <span>Nombre de commentaire</span>
                </div>
                <div class="social-layout">
                  <div class="noteContainer"><h2 class="note">4</h2><h2>/5</h2></div>
                  <span>Note des utilisateurs</span>
                </div>
              </div>
              <div class="director">
                <h3>Realisateur:</h3>
                <h3 class="nameOfDirector">John Doe</h3>
              </div>
            </div>
            <div class="critique">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error.
            </div>
          </div>
        </div>
      `;

    return html;
  }

  let generatedHTML = generateHTML();
  document.querySelector(".prototype").innerHTML = generatedHTML;
}

function createTemplateHTMLPoto3() {
  function generateHTML() {
    var html = '<div class="protopage-3">';
    html += '<div class="top">';
    html +=
      '<img class="img-background" src="assets/images/elementard/wireframe.jpg" alt="image" />';
    html += '<div class="overlay"></div>';
    html += '<div class="container">';
    html +=
      '<img class="movie-img" src="assets/images/elementard/wireframe.jpg" alt="image-movie" />';
    html += '<div class="content">';
    html += '<h2 class="movie-title">Nom Du Film</h2>';
    html += '<div class="mini-data">';
    html += "<h4>Date de sortie:</h4>";
    html += '<span id="date-sortie"></span>';
    html += "<h4>Durée du film:</h4>";
    html += '<span id="movie-time"></span>';
    html += '<div id="badgesContainer"></div>';
    html += "</div>";
    html += '<div class="social">';
    html += '<div class="social-layout">';
    html +=
      '<div class="noteContainer"><h2 class="note">4</h2><h2>/5</h2></div>';
    html += "<span>Note des utilisateurs</span>";
    html += "</div>";
    html += '<div class="social-layout">';
    html += '<span class="material-symbols-outlined icon"> favorite </span>';
    html += "<span>Nombre de like</span>";
    html += "</div>";
    html += '<div class="social-layout">';
    html += '<span class="material-symbols-outlined icon"> comment </span>';
    html += "<span>Nombre de commentaire</span>";
    html += "</div>";
    html += "</div>";
    html += '<h3 class="movie-slogan">Slogan du film</h3>';
    html += '<div class="director">';
    html += "<h3>Realisateur:</h3>";
    html += '<h3 class="nameOfDirector">John Doe</h3>';
    html += "</div>";
    html += '<div class="critique">';
    html +=
      "Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error.";
    html += "</div>";
    html += "</div>";
    html += "</div>";
    html += "</div>";

    return html;
  }
  let generatedHTML = generateHTML();
  document.querySelector(".prototype").innerHTML = generatedHTML;
}

//Button save #########################################################

let btn = document.querySelector(".save");
btn.addEventListener("click", function () {
  let data = saveData();
  console.log(data);
  sendDataToServer(data);
});

//######################################################################

function saveData() {
  let data = {
    backgroundColor: "",
    critiqueBackgroundColor: "",
    fontColor: "",
    font: "",
    template: "",
    fontTextAreaColor: "",
    movieName: "", //a gerer en api
    sloganMovie: "",
    critique: "",
    categories: "",
    categoriesColor: "",
    imageUrl: "",
    note: 1,
    directorName: "",
    dateSortie: 1,
    movieTime: 1,
  };

  let computedStyle = getComputedStyle(document.body);
  let backgroundColor = computedStyle.backgroundColor;

  let critiqueDiv = document.querySelector(".critique");
  critiqueDiv = window.getComputedStyle(critiqueDiv).backgroundColor;

  let fontColor = document.querySelector(".prototype");
  fontColor = window.getComputedStyle(fontColor).color;

  let font = document.querySelector(".fontFamily");
  data.font = font.value;

  let selectedOption = document.querySelector(
    'input[name="inlineRadioOptions"]:checked'
  ).value;

  let fontTextAreaColor = document.querySelector(".critique");
  fontTextAreaColor = window.getComputedStyle(fontTextAreaColor).color;

  let movieName = document.querySelector(".movie-title").textContent;
  let sloganMovie = document.querySelector(".movie-slogan").textContent;

  let critique = document.querySelector(".critique").innerHTML;

  let categoriesSelectionnees = getCategoriesSelectionnees();

  let img_background = document.querySelector(".movie-img");

  let note = document.querySelector(".note");

  let directorName = document.querySelector(".nameOfDirector");
  let dateSortie = document.querySelector("#date-sortie");
  let movieTime = document.querySelector("#movie-time");

  data.backgroundColor = backgroundColor;
  data.critiqueBackgroundColor = critiqueDiv;
  data.fontColor = fontColor;
  data.fontTextAreaColor = fontTextAreaColor;
  data.template = selectedOption;
  data.movieName = movieName;
  data.sloganMovie = sloganMovie;
  data.critique = critique;
  if (categoriesSelectionnees.length > 0) {
    data.categories = categoriesSelectionnees.join(",");
    let badges = document.querySelectorAll(".badge");
    data.categoriesColor = window.getComputedStyle(badges[0]).backgroundColor;
  }
  data.imageUrl = img_background.src;
  data.note = parseInt(note.textContent);
  data.directorName = directorName.textContent;
  data.dateSortie = parseInt(dateSortie.textContent);
  data.movieTime = parseInt(movieTime.textContent);

  return data;
}

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

//API ################################################################

const search = document.querySelector("#search");
const results = document.querySelector("#results");
const dropdown = new bootstrap.Dropdown(
  document.querySelector("#movieDropdown")
);

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

//gestion des categories #######################################################

var categories = {
  action: "Action",
  comedy: "Comedy",
  drama: "Drama",
  thriller: "Thriller",
  horror: "Horror",
  romance: "Romance",
  western: "Western",
  animation: "Animation",
  documentary: "Documentary",
};

function genererOptionsCategories(categories) {
  var optionsHtml = "";

  for (var categorie in categories) {
    var categorieValue = categories[categorie];
    optionsHtml += '<div class="form-check">';
    optionsHtml +=
      '<input class="form-check-input category" type="checkbox" value="' +
      categorieValue +
      '" id="categorie' +
      categorie +
      '">';
    optionsHtml +=
      '<label class="form-check-label" for="categorie' +
      categorie +
      '">' +
      categorieValue +
      "</label>";
    optionsHtml += "</div>";
  }

  return optionsHtml;
}

var optionsHtml = genererOptionsCategories(categories);
document.getElementById("optionsCategories").innerHTML = optionsHtml;

function genererBadges(options) {
  var badgesHtml = "";

  for (var i = 0; i < options.length; i++) {
    var option = options[i];
    badgesHtml +=
      '<span class="badge badge-primary badge-pill text-bg-dark">' +
      option +
      "</span> ";
  }

  return badgesHtml;
}

function afficherBadges() {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  var options = [];

  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      options.push(checkboxes[i].value);
    }
  }

  var badgesContainer = document.getElementById("badgesContainer");
  badgesContainer.innerHTML = genererBadges(options);
}

// Écoutez les événements de changement de coche pour mettre à jour les badges
var checkboxes = document.querySelectorAll('input[type="checkbox"]');
for (var i = 0; i < checkboxes.length; i++) {
  checkboxes[i].addEventListener("change", afficherBadges);
}

function getCategoriesSelectionnees() {
  var categoriesSelectionnees = [];
  var checkboxes = document.querySelectorAll(".category");

  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      categoriesSelectionnees.push(checkboxes[i].value);
    }
  }

  return categoriesSelectionnees;
}

function setCategoriesSelectionnees(categoriesSelectionnees) {
  var checkboxes = document.querySelectorAll(".category");

  for (var i = 0; i < checkboxes.length; i++) {
    var checkboxValue = checkboxes[i].value;
    checkboxes[i].checked = categoriesSelectionnees.includes(checkboxValue);
  }
}

//send data to server

function sendDataToServer(data) {
  // Créez une Promise pour gérer la requête AJAX de manière asynchrone
  const sendRequest = new Promise(function (resolve, reject) {
    // Envoyer les données via AJAX
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "back-getdata-elementard", true);
    xhr.setRequestHeader("Content-Type", "application/json");

    xhr.onload = function () {
      if (xhr.status === 200) {
        // Réponse avec succès
        let response = JSON.parse(xhr.responseText);
        resolve(response);
      } else {
        // Erreur lors de la requête
        reject(new Error("Erreur lors de la requête."));
      }
    };

    xhr.onerror = function () {
      // Erreur lors de la requête
      reject(new Error("Erreur lors de la requête."));
    };

    xhr.send(JSON.stringify(data));
  });

  // Utilisez la Promise pour traiter la réponse de la requête
  sendRequest
    .then(function (response) {
      // Faites quelque chose avec la réponse
      if (response.success) {
        console.log(response.message);
        window.location.href = "/";
      } else {
        alert(response.message);
      }
    })
    .catch(function (error) {
      // Gérez les erreurs de la requête
      alert(error.message);
    });
}

function update() {
  var storedId = sessionStorage.getItem("id");
  if (storedId) {
  }
}
