document.addEventListener("DOMContentLoaded", function () {
    imageInput();
    editorInit();
    inputControl();
    //colorpicker
    const colorPicker = document.getElementById("colorPicker");
    colorPicker.addEventListener("change", function () {
      const selectedColor = colorPicker.value; //Background color
      document.body.style.backgroundColor = selectedColor;
    });
    //colorpickerTwo
    const colorPickerTwo = document.getElementById("colorPickerTwo");
    colorPickerTwo.addEventListener("change", function () {
      let critiqueDiv = document.querySelector(".second-section");
      let info = document.querySelectorAll(".info");
      let selectedColorTwo = colorPickerTwo.value; //Critique Background color
      critiqueDiv.style.backgroundColor = selectedColorTwo;
      if (info[0]) {
        info.forEach(function (info) {
          info.style.backgroundColor = selectedColorTwo;
        });
      }
    });
    //colorpickerThree
    const colorPickerThree = document.getElementById("colorPickerThree");
    colorPickerThree.addEventListener("change", function () {
      let selectedColorThree = colorPickerThree.value;
      let font = document.querySelector(".prototype");
      font.style.color = selectedColorThree;
    });
    //font family selector
    const fontSelect = document.getElementById("fontSelect");
    const body = document.body;
  
    fontSelect.addEventListener("change", function () {
      const selectedFont = fontSelect.value;
      body.style.fontFamily = selectedFont; //font selected
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
          const templateHTML = createTemplateHTMLPoto1();
          let prototypeDiv = document.querySelector(".prototype");
          let data = saveData();
          prototypeDiv.innerHTML = "";
          prototypeDiv.appendChild(templateHTML);
          setData(data);
          imageInput();
          editorInit();
          inputControl();
        } else if (selectedOption === "option2") {
          const templateHTML2 = createTemplateHTMLPoto2();
          let prototypeDiv = document.querySelector(".prototype");
          let data = saveData();
          prototypeDiv.innerHTML = "";
          prototypeDiv.appendChild(templateHTML2);
          setData(data);
          editorInit();
          imageInput();
          inputControl();
        } else if (selectedOption === "option3") {
          // Action for option 3
          console.log("Option 3 selected");
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
      if (sidebar.classList.contains("close")) {
        sidebar.classList.remove("close");
        icon.textContent = "close";
        icon.classList.remove("open");
        prototype.classList.remove("full");
        if (img_background) {
          img_background.classList.remove("full");
        }
      } else {
        sidebar.classList.add("close");
        icon.textContent = "keyboard_double_arrow_right";
        icon.classList.add("open");
        prototype.classList.add("full");
        if (img_background) {
          img_background.classList.add("full");
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
  
    let MovieTitle = document.getElementById("movie-name");
    let movieTitleElement = document.querySelector(".title h2");
    MovieTitle.addEventListener("input", function () {
      movieTitleElement.textContent = MovieTitle.value;
    });
  
    let sloganFilm = document.getElementById("movie-slogan");
    let sloganFilmElement = document.querySelector(".title h3");
    sloganFilm.addEventListener("input", function () {
      sloganFilmElement.textContent = sloganFilm.value;
    });
  
    let titleCritique = document.getElementById("title-critique");
    let titleCritiqueElement = document.querySelector(".second-section h1");
    titleCritique.addEventListener("input", function () {
      titleCritiqueElement.textContent = titleCritique.value;
    });
  }
  
  function imageInput() {
    let afficheUpload = document.getElementById("afficheUpload");
    let topImageUpload = document.getElementById("topImageUpload");
    let afficheElement = document.querySelector(".first-section img");
    let topImageElement = document.querySelector(".img-background");
    afficheUpload.addEventListener("change", function (event) {
      const file = event.target.files[0];
      const reader = new FileReader();
      reader.onload = function (e) {
        afficheElement.src = e.target.result;
      };
  
      reader.readAsDataURL(file);
    });
    topImageUpload.addEventListener("change", function (event) {
      const file = event.target.files[0];
      const reader = new FileReader();
      reader.onload = function (e) {
        topImageElement.src = e.target.result;
      };
  
      reader.readAsDataURL(file);
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
    // Création de l'élément <div> avec la classe "protopage-1"
    var protopageDiv = document.createElement("div");
    protopageDiv.className = "protopage-1";
  
    // Création de l'élément <div> avec la classe "top"
    var topDiv = document.createElement("div");
    topDiv.className = "top";
  
    // Création de l'élément <img> avec la classe "img-background" et l'attribut src
    var imgBackground = document.createElement("img");
    imgBackground.className = "img-background";
    imgBackground.src = "image.jpg";
    imgBackground.alt = "";
    imgBackground.srcset = "";
  
    // Ajout de l'élément <img> à l'élément <div> avec la classe "top"
    topDiv.appendChild(imgBackground);
  
    // Ajout de l'élément <div> avec la classe "top" à l'élément <div> avec la classe "protopage-1"
    protopageDiv.appendChild(topDiv);
  
    // Création de l'élément <div> avec la classe "container"
    var containerDiv = document.createElement("div");
    containerDiv.className = "container";
  
    // Création de l'élément <div> avec la classe "first-section"
    var firstSectionDiv = document.createElement("div");
    firstSectionDiv.className = "first-section info";
  
    // Création de l'élément <img> avec l'attribut src
    var img1 = document.createElement("img");
    img1.src = "image.jpg";
    img1.alt = "";
  
    // Création de l'élément <div> avec la classe "title"
    var titleDiv = document.createElement("div");
    titleDiv.className = "title";
  
    // Création de l'élément <h2> avec le texte "Nom Du Film"
    var h2 = document.createElement("h2");
    h2.textContent = "Nom Du Film";
  
    // Création de l'élément <h3> avec le texte "Slogan du film"
    var h3 = document.createElement("h3");
    h3.textContent = "Slogan du film";
  
    // Ajout des éléments <h2> et <h3> à l'élément <div> avec la classe "title"
    titleDiv.appendChild(h2);
    titleDiv.appendChild(h3);
  
    // Ajout de l'élément <img> et de l'élément <div> avec la classe "title" à l'élément <div> avec la classe "first-section"
    firstSectionDiv.appendChild(img1);
    firstSectionDiv.appendChild(titleDiv);
  
    // Ajout de l'élément <div> avec la classe "first-section" à l'élément <div> avec la classe "container"
    containerDiv.appendChild(firstSectionDiv);
  
    // Création de l'élément <div> avec la classe "second-section"
    var secondSectionDiv = document.createElement("div");
    secondSectionDiv.className = "second-section";
  
    // Création de l'élément <h1> avec le texte "Titre de ma critique"
    var h1 = document.createElement("h1");
    h1.textContent = "Titre de ma critique";
  
    // Création de l'élément <p> avec le texte du paragraphe
    var paragraph = document.createElement("div");
    paragraph.className = "critique";
    paragraph.innerHTML = `Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
      illo unde aliquid, ullam quas officiis est tenetur natus enim
      laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed
      architecto dicta nesciunt error. Lorem ipsum dolor sit amet
      consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas
      officiis est tenetur natus enim laboriosam mollitia perspiciatis
      voluptatibus quaerat omnis sed architecto dicta nesciunt error.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
      illo unde aliquid, ullam quas officiis est tenetur natus enim
      laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed
      architecto dicta nesciunt error. Lorem ipsum dolor sit amet
      consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas
      officiis est tenetur natus enim laboriosam mollitia perspiciatis
      voluptatibus quaerat omnis sed architecto dicta nesciunt error.
      <br />
      <br />
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
      illo unde aliquid, ullam quas officiis est tenetur natus enim
      laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed
      architecto dicta nesciunt error. Lorem ipsum dolor sit amet
      consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas
      officiis est tenetur natus enim laboriosam mollitia perspiciatis
      voluptatibus quaerat omnis sed architecto dicta nesciunt error.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
      illo unde aliquid, ullam quas officiis est tenetur natus enim
      laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed
      architecto dicta nesciunt error. Lorem ipsum dolor sit amet
      consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas
      officiis est tenetur natus enim laboriosam mollitia perspiciatis
      voluptatibus quaerat omnis sed architecto dicta nesciunt error.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
      illo unde aliquid, ullam quas officiis est tenetur natus enim
      laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed
      architecto dicta nesciunt error. Lorem ipsum dolor sit amet
      consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas
      officiis est tenetur natus enim laboriosam mollitia perspiciatis
      voluptatibus quaerat omnis sed architecto dicta nesciunt error.`;
  
    // Ajout de l'élément <h1> et de l'élément <p> à l'élément <div> avec la classe "second-section"
    secondSectionDiv.appendChild(h1);
    secondSectionDiv.appendChild(paragraph);
  
    // Ajout de l'élément <div> avec la classe "second-section" à l'élément <div> avec la classe "container"
    containerDiv.appendChild(secondSectionDiv);
  
    // Création de l'élément <div> avec la classe "third-section info"
    var thirdSectionDiv = document.createElement("div");
    thirdSectionDiv.className = "third-section info";
  
    // Création de l'élément <div> avec la classe "user"
    var userDiv = document.createElement("div");
    userDiv.className = "user";
  
    // Création de l'élément <span> avec la classe "material-symbols-outlined icon" et le texte "account_circle"
    var userIconSpan = document.createElement("span");
    userIconSpan.className = "material-symbols-outlined icon";
    userIconSpan.textContent = "account_circle";
  
    // Création de l'élément <h3> avec le texte "Écrit par:"
    var userH3 = document.createElement("h3");
    userH3.textContent = "Écrit par:";
  
    // Création de l'élément <h2> avec le texte "Nom de l'utilisateur"
    var userH2 = document.createElement("h2");
    userH2.textContent = "Nom de l'utilisateur";
  
    // Ajout des éléments <span>, <h3> et <h2> à l'élément <div> avec la classe "user"
    userDiv.appendChild(userIconSpan);
    userDiv.appendChild(userH3);
    userDiv.appendChild(userH2);
  
    // Création de l'élément <div> avec la classe "social"
    var socialDiv = document.createElement("div");
    socialDiv.className = "social";
  
    // Création du premier élément <div> avec la classe "social-layout"
    var socialLayout1Div = document.createElement("div");
    socialLayout1Div.className = "social-layout";
  
    // Création de l'élément <span> avec la classe "material-symbols-outlined icon" et le texte "favorite"
    var favoriteIconSpan = document.createElement("span");
    favoriteIconSpan.className = "material-symbols-outlined icon";
    favoriteIconSpan.textContent = "favorite";
  
    // Création de l'élément <span> avec le texte "Nombre de like"
    var likeSpan = document.createElement("span");
    likeSpan.textContent = "Nombre de like";
  
    // Ajout des éléments <span> à l'élément <div> avec la classe "social-layout"
    socialLayout1Div.appendChild(favoriteIconSpan);
    socialLayout1Div.appendChild(likeSpan);
  
    // Création du deuxième élément <div> avec la classe "social-layout"
    var socialLayout2Div = document.createElement("div");
    socialLayout2Div.className = "social-layout";
  
    // Création de l'élément <span> avec la classe "material-symbols-outlined icon" et le texte "comment"
    var commentIconSpan = document.createElement("span");
    commentIconSpan.className = "material-symbols-outlined icon";
    commentIconSpan.textContent = "comment";
  
    // Création de l'élément <span> avec le texte "Nombre de commentaire"
    var commentSpan = document.createElement("span");
    commentSpan.textContent = "Nombre de commentaire";
  
    // Ajout des éléments <span> à l'élément <div> avec la classe "social-layout"
    socialLayout2Div.appendChild(commentIconSpan);
    socialLayout2Div.appendChild(commentSpan);
  
    // Ajout des éléments <div> avec la classe "social-layout" à l'élément <div> avec la classe "social"
    socialDiv.appendChild(socialLayout1Div);
    socialDiv.appendChild(socialLayout2Div);
  
    // Ajout des éléments <div> avec la classe "user" et <div> avec la classe "social" à l'élément <div> avec la classe "third-section info"
    thirdSectionDiv.appendChild(userDiv);
    thirdSectionDiv.appendChild(socialDiv);
  
    // Ajout de l'élément <div> avec la classe "third-section info" à l'élément <div> avec la classe "container"
    containerDiv.appendChild(thirdSectionDiv);
  
    // Ajout de l'élément <div> avec la classe "container" à l'élément <div> avec la classe "protopage-1"
    protopageDiv.appendChild(containerDiv);
  
    // Retourne l'élément <div> avec la classe "protopage-1"
    return protopageDiv;
  }
  
  // prototype 2 js generator
  function createTemplateHTMLPoto2() {
    // Création de l'élément principal <div class="protopage-2">
    var divPrincipale = document.createElement("div");
    divPrincipale.classList.add("protopage-2");
  
    // Création de la section supérieure <div class="top">
    var divTop = document.createElement("div");
    divTop.classList.add("top");
  
    // Création de l'image d'arrière-plan <img class="img-background">
    var imgBackground = document.createElement("img");
    imgBackground.classList.add("img-background");
    imgBackground.src = "image.jpg";
    imgBackground.alt = "";
    divTop.appendChild(imgBackground);
  
    // Ajout de la section supérieure à l'élément principal
    divPrincipale.appendChild(divTop);
  
    // Création de la section de contenu <div class="container">
    var divContainer = document.createElement("div");
    divContainer.classList.add("container");
  
    // Création de la première section d'informations <div class="first-section info">
    var divFirstSection = document.createElement("div");
    divFirstSection.classList.add("first-section", "info");
  
    // Création de l'image <img>
    var imgFilm = document.createElement("img");
    imgFilm.src = "image.jpg";
    imgFilm.alt = "";
    divFirstSection.appendChild(imgFilm);
  
    // Création du conteneur du titre <div class="title">
    var divTitle = document.createElement("div");
    divTitle.classList.add("title");
  
    // Création du titre du film <h2>
    var h2TitreFilm = document.createElement("h2");
    h2TitreFilm.textContent = "Nom Du Film";
    divTitle.appendChild(h2TitreFilm);
  
    // Création du slogan du film <h3>
    var h3SloganFilm = document.createElement("h3");
    h3SloganFilm.textContent = "Slogan du film";
    divTitle.appendChild(h3SloganFilm);
  
    // Ajout du conteneur du titre à la première section d'informations
    divFirstSection.appendChild(divTitle);
  
    // Création de la section des réseaux sociaux <div class="social">
    var divSocial = document.createElement("div");
    divSocial.classList.add("social");
  
    // Création du premier bloc social <div class="social-layout">
    var divSocialLayout1 = document.createElement("div");
    divSocialLayout1.classList.add("social-layout");
  
    // Création de l'icône "favorite" <span class="material-symbols-outlined icon">
    var spanFavorite = document.createElement("span");
    spanFavorite.classList.add("material-symbols-outlined", "icon");
    spanFavorite.textContent = " favorite ";
    divSocialLayout1.appendChild(spanFavorite);
  
    // Création du texte "Nombre de like" <span>
    var spanLike = document.createElement("span");
    spanLike.textContent = "Nombre de like";
    divSocialLayout1.appendChild(spanLike);
  
    // Ajout du premier bloc social à la section des réseaux sociaux
    divSocial.appendChild(divSocialLayout1);
  
    // Création du deuxième bloc social <div class="social-layout">
    var divSocialLayout2 = document.createElement("div");
    divSocialLayout2.classList.add("social-layout");
  
    // Création de l'icône "comment" <span class="material-symbols-outlined">
    var spanComment = document.createElement("span");
    spanComment.classList.add("material-symbols-outlined", "icon");
    spanComment.textContent = " comment ";
    divSocialLayout2.appendChild(spanComment);
  
    // Création du texte "Nombre de commentaire" <span>
    var spanCommentaire = document.createElement("span");
    spanCommentaire.textContent = "Nombre de commentaire";
    divSocialLayout2.appendChild(spanCommentaire);
  
    // Ajout du deuxième bloc social à la section des réseaux sociaux
    divSocial.appendChild(divSocialLayout2);
  
    // Ajout de la section des réseaux sociaux à la première section d'informations
    divFirstSection.appendChild(divSocial);
  
    // Création de la section utilisateur <div class="user">
    var divUser = document.createElement("div");
    divUser.classList.add("user");
  
    // Création du titre "Écrit par:" <h3>
    var h3EcritPar = document.createElement("h3");
    h3EcritPar.textContent = "Écrit par:";
    divUser.appendChild(h3EcritPar);
  
    // Création du nom de l'utilisateur <h2>
    var h2NomUtilisateur = document.createElement("h2");
    h2NomUtilisateur.textContent = "Nom de l'utilisateur";
    divUser.appendChild(h2NomUtilisateur);
  
    // Création de l'icône "account_circle" <span class="material-symbols-outlined icon">
    var spanAccountCircle = document.createElement("span");
    spanAccountCircle.classList.add("material-symbols-outlined", "icon");
    spanAccountCircle.textContent = " account_circle ";
    divUser.appendChild(spanAccountCircle);
  
    // Ajout de la section utilisateur à la première section d'informations
    divFirstSection.appendChild(divUser);
  
    // Ajout de la première section d'informations à la section de contenu
    divContainer.appendChild(divFirstSection);
  
    // Création de la deuxième section <div class="secound-section">
    var divSecondSection = document.createElement("div");
    divSecondSection.classList.add("second-section");
  
    // Création du titre de la critique <h1>
    var h1TitreCritique = document.createElement("h1");
    h1TitreCritique.textContent = "Titre de ma critique";
    divSecondSection.appendChild(h1TitreCritique);
  
    // Création du paragraphe de la critique <p>
    var pCritique = document.createElement("div");
    pCritique.className = "critique";
    pCritique.innerHTML = `Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error.
    <br /><br />
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error.
    <br />
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur natus enim laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed architecto dicta nesciunt error.
    `;
    divSecondSection.appendChild(pCritique);
  
    // Ajout de la deuxième section à la section de contenu
    divContainer.appendChild(divSecondSection);
  
    // Ajout de la section de contenu à l'élément principal
    divPrincipale.appendChild(divContainer);
  
    // Retourner l'élément principal
    return divPrincipale;
  }
  
  let btn = document.querySelector(".save");
  btn.addEventListener("click", function () {
    let data = saveData();
    console.log(data);
  });
  
  function saveData() {
    let data = {
      backgroundColor: "",
      critiqueBackgroundColor: "",
      template: "",
      fontColor: "",
      font: "",
      movieName: "",
      sloganMovie: "",
      critiqueTitle: "",
      movieAffiche: "",
      movieTopimg: "",
      critique: "",
    };
  
    let computedStyle = getComputedStyle(document.body);
  
    let backgroundColor = computedStyle.backgroundColor;
    let critiqueDiv = document.querySelector(".second-section"); //info
    critiqueDiv = window.getComputedStyle(critiqueDiv).backgroundColor;
  
    let fontColor = document.querySelector(".prototype");
    fontColor = window.getComputedStyle(fontColor).color;
    let font = computedStyle.fontFamily;
    let selectedOption = document.querySelector(
      'input[name="inlineRadioOptions"]:checked'
    ).value;
    let movieName = document.querySelector(".title h2").textContent;
    let sloganMovie = document.querySelector(".title h3").textContent;
    let critiqueTitle = document.querySelector(".second-section h1").textContent;
    let movieAffiche = document.querySelector(".first-section img").src;
    let movieTopimg = document.querySelector(".img-background").src;
    let critique = document.querySelector(".critique").innerHTML;
  
    data.backgroundColor = backgroundColor;
    data.critiqueBackgroundColor = critiqueDiv;
    data.fontColor = fontColor;
    data.font = font;
    data.template = selectedOption;
    data.movieName = movieName;
    data.sloganMovie = sloganMovie;
    data.critiqueTitle = critiqueTitle;
    data.movieAffiche = movieAffiche;
    data.movieTopimg = movieTopimg;
    data.critique = critique;
  
  
      // Convertir l'objet en chaîne JSON
      let jsonData = JSON.stringify(data);
  
      // Créer une requête AJAX
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "votre_script_php.php", true);
      xhr.setRequestHeader("Content-Type", "application/json");
    
      // Envoyer les données JSON
      xhr.send(jsonData);
  
    return data;
  }
  
  function setData(data) {
    
    let backgroundColor = document.body.backgroundColor;
    backgroundColor = data.backgroundColor;
  
    
    let critiqueDiv = document.querySelector(".second-section");
    let info = document.querySelectorAll(".info");
    
    critiqueDiv.style.backgroundColor = data.critiqueBackgroundColor;
  
    info.forEach(function (info) {
      info.style.backgroundColor = data.critiqueBackgroundColor;
    });
  
  
    let fontColor = document.querySelector(".prototype");
    fontColor = data.fontColor;
  
    
    let font = document.body.fontFamily;
    font = data.font;
  
  
    
    let movieName = document.querySelector(".title h2");
    movieName.textContent = data.movieName;
  
    let sloganMovie = document.querySelector(".title h3");
    sloganMovie.textContent = data.sloganMovie;
  
    let critiqueTitle = document.querySelector(".second-section h1");
    critiqueTitle.textContent = data.critiqueTitle;
  
    let movieAffiche = document.querySelector(".first-section img");
    movieAffiche.src = data.movieAffiche;
  
    let movieTopimg = document.querySelector(".img-background");
    movieTopimg.src = data.movieTopimg;
  
    let critique = document.querySelector(".critique");
    critique.innerHTML = data.critique;
  }
  