// Récupérer la valeur 'id' de l'URL
let url = new URL(window.location.href);
let id = url.searchParams.get("id");

if (!id) {
  window.location.href = "/reviews";
}

document.addEventListener("DOMContentLoaded", function () {
  //API call to get the media data

  // Récupérer la valeur 'id' de l'URL
  let url = new URL(window.location.href);
  let id = url.searchParams.get("id");

  // Préparer les données à envoyer
  let mydata = { id: id };

  addVue(mydata);
  getMediaData(mydata);


  //############################################################################################

  

  // sélectionner le bouton et le champ de texte du commentaire
  const commentButton = document.querySelector(".btn-comment");
  const commentInput = document.querySelector(".add_comment");

  // sélectionner l'input et le bouton du formulaire
  const formInput = document.querySelector("#create-form-comment-content");
  const formButton = document.querySelector(".submit");

  console.log(commentButton, commentInput, formInput, formButton);
  // Ajouter un écouteur d'événement pour le bouton du commentaire
  commentButton.addEventListener("click", function () {
    // Copier le texte du commentaire dans le formulaire
    formInput.value = commentInput.value;

    alert("Votre commentaire a bien été ajouté et en attente de validation");
    // Simuler un clic sur le bouton du formulaire
    formButton.click();
  });
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
                <span class="material-symbols-outlined icon"> comment </span>
                <span id="nbrComment">Nombre de commentaire</span>
              </div>
              <div class="social-layout">
                  <div class="noteContainer"><h2 class="note">4</h2><h2>/5</h2></div>
                  <span>Note du rédacteur</span>
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
                  <span class="material-symbols-outlined icon"> comment </span>
                  <span id="nbrComment">Nombre de commentaire</span>
                </div>
                <div class="social-layout">
                  <div class="noteContainer"><h2 class="note">4</h2><h2>/5</h2></div>
                  <span>Note du rédacteur</span>
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
    html += "<span>Note du rédacteur</span>";
    html += "</div>";
    html += '<div class="social-layout">';
    html += '<span class="material-symbols-outlined icon"> comment </span>';
    html += "<span id='nbrComment'>Nombre de commentaire</span>";
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

  let categoriesList = data.categories.split(",");
  afficherBadges(categoriesList);
  
  document.body.style.backgroundColor = data.background_color;

  document.querySelector(".critique").style.backgroundColor = data.critique_background_color;


  document.querySelectorAll('.badge').forEach((badge) => {
    badge.style.backgroundColor = data.categories_color;
  });

  document.querySelector(".prototype").style.color = data.font_color;
  

  document.body.fontFamily = data.font;

  document.querySelector(".critique").style.color = data.font_textarea_color;
  

  document.querySelector(".movie-title").textContent = data.movie_name;

  document.querySelector(".movie-slogan").textContent = data.slogan_movie;
  

  let critique = document.querySelector(".critique");
  critique.innerHTML = data.critique;

  

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



function nombreDeCommentaires() {
  // Sélectionner tous les éléments de classe 'commentaire-content'
  const commentElements = document.querySelectorAll(".commentaire-content");

  // Compter le nombre d'éléments de commentaire
  const commentCount = commentElements.length;

  // Sélectionner l'élément qui affichera le nombre de commentaires
  const displayElement = document.querySelector("#nbrComment");

  console.log(displayElement);

  // Mettre à jour le contenu de l'élément avec le nombre de commentaires
  displayElement.innerHTML = commentCount;
}

function genererBadges(options) {
  var badgesHtml = "";

  for (var i = 0; i < options.length; i++) {
    var option = options[i];
    badgesHtml +=
      '<span class="badge badge-primary badge-pill">' +
      option +
      "</span> ";
  }

  return badgesHtml;
}

function afficherBadges(categorie) {
  var badgesContainer = document.getElementById("badgesContainer");
  badgesContainer.innerHTML = genererBadges(categorie);
}

function getMediaData(mydata) {
  // Envoie de la requête POST
  let xhr = new XMLHttpRequest();

  xhr.open("POST", "/media-getdata", true);

  xhr.setRequestHeader("Content-Type", "application/json");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let data = JSON.parse(xhr.responseText);
      console.log("Données reçues avec succès:", data);
      generate(data);
    } else if (xhr.readyState === 4) {
      console.error(
        "Une erreur est survenue: HTTP error! status: " + xhr.status
      );
    }
  };

  xhr.send(JSON.stringify(mydata));
}
function addVue(mydata) {
  // Envoie de la requête POST
  let xhr = new XMLHttpRequest();

  xhr.open("POST", "/media-addvue", true);

  xhr.setRequestHeader("Content-Type", "application/json");

  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      let data = JSON.parse(xhr.responseText);
      console.log("Données reçues avec succès:", data);
    } else if (xhr.readyState === 4) {
      console.error(
        "Une erreur est survenue: HTTP error! status: " + xhr.status
      );
    }
  };

  xhr.send(JSON.stringify(mydata));
}

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
  nombreDeCommentaires();
}
