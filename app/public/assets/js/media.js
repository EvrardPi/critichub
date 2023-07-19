document.addEventListener("DOMContentLoaded", function () {
  //API call to get the media data

  // Récupérer la valeur 'id' de l'URL
  let url = new URL(window.location.href);
  let id = url.searchParams.get("id");
  

  // Préparer les données à envoyer
  let mydata = { id: id };

  // Envoie de la requête POST
  let xhr = new XMLHttpRequest();

  xhr.open("POST", "/media-getdata", true);

  xhr.setRequestHeader("Content-Type", "application/json");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let data = JSON.parse(xhr.responseText);
      console.log("Données reçues avec succès:", data);
      generate(data)
    } else if (xhr.readyState === 4) {
      console.error(
        "Une erreur est survenue: HTTP error! status: " + xhr.status
      );
    }
  };

  xhr.send(JSON.stringify(mydata));
  //############################################################################################

  //genreation of the front of media

  function generate(data) {
    let mediaLoad = data;
    let prototypeDiv = document.querySelector(".prototype");
    prototypeDiv.innerHTML = "";

    if (mediaLoad.template === "option1") {
      createTemplateHTMLPoto1();
    } else if (mediaLoad.template === "option2") {
      createTemplateHTMLPoto2();
    } else if (mediaLoad.template === "option3") {
      createTemplateHTMLPoto3();
    } else {
      console.log("YOURI", mediaLoad.template);
    }

    setData(mediaLoad);
  }
});

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

function setData(data) {

 document.body.style.backgroundColor = data.background_color;

  let critiqueDiv = document.querySelector(".critique");

  critiqueDiv.style.backgroundColor = data.critique_background_color;

  let fontColor = document.querySelector(".prototype");
  fontColor = data.font_color;

  let font = document.body.fontFamily;
  font = data.font;

  let fontTextAreaColor = document.querySelector(".critique");
  fontTextAreaColor = data.font_textarea_color;

  let movieName = document.querySelector(".movie-title"); //a gerer en api
  movieName.textContent = data.movie_name;

  let sloganMovie = document.querySelector(".movie-slogan");
  sloganMovie.textContent = data.slogan_movie;

  let critique = document.querySelector(".critique");
  critique.innerHTML = data.critique;

  console.log(data.categories.split(","));
  setCategoriesSelectionnees(data.categories.split(","));

  let img_background = document.querySelector(".movie-img");
  img_background.src = data.image_url;

  let img_backgroundTwo = document.querySelector(".img-background");
  img_backgroundTwo.src = data.image_url;

  let note = document.querySelector(".note");
  note.textContent = data.note;

  let directorName = document.querySelector(".nameOfDirector");
  directorName.textContent = data.director_name;

  let dateSortie = document.querySelector("#date-sortie");
  dateSortie.textContent = data.date_sortie;

  let movieTime = document.querySelector("#movie-time");
  movieTime.textContent = data.movie_time;
}

function setCategoriesSelectionnees(categoriesSelectionnees) {
    var checkboxes = document.querySelectorAll(".category");
  
    for (var i = 0; i < checkboxes.length; i++) {
      var checkboxValue = checkboxes[i].value;
      checkboxes[i].checked = categoriesSelectionnees.includes(checkboxValue);
    }
  }
