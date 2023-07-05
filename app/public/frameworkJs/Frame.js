import BrowserRouter from "./components/BrowserRouter.js";
import routes from "./routes.js";

let leftClickListener;
let rightClickListener;

BrowserRouter(routes, document);

navigation();
arrowHandle();



function navigation() {
  let leftArrow = document.querySelector(".navigation span:first-child");
  let rightArrow = document.querySelector(".navigation span:last-child");
  let etape = document.querySelector(".form-container h3 span");
  loadData();
  if (etape.innerHTML === "Étape 2:") {
    saveData();
  }

  if (leftClickListener) {
    leftArrow.removeEventListener("click", leftClickListener);
  }

  leftClickListener = () => {
    if (etape.innerHTML === "Étape 3:") {
      changePage("/setup");
    }
  };

  leftArrow.addEventListener("click", leftClickListener);

  if (rightClickListener) {
    rightArrow.removeEventListener("click", rightClickListener);
  }

  rightClickListener = () => {
    if (etape.innerHTML === "Étape 1:") {
      saveData();
      // Commenting out navigation() to avoid double event handling
      // navigation();
    }
    if (etape.innerHTML === "Étape 3:") {
      saveData();
    }
  };

  rightArrow.addEventListener("click", rightClickListener);

  arrowHandle();
}

function changePage(pathname) {
  window.history.pushState(null, null, pathname);
  navigation();
}



function arrowHandle() {
  let leftArrow = document.querySelector(".navigation span:first-child");
  let rightArrow = document.querySelector(".navigation span:last-child");
  let etape = document.querySelector(".form-container h3 span");

  if (etape.innerHTML === "Étape 1:") {
    leftArrow.style.opacity = "0";
  }
  if (etape.innerHTML === "Étape 2:") {
    rightArrow.style.opacity = "0";
    leftArrow.style.opacity = "0";
  }
  if (etape.innerHTML === "Étape 3:") {
    rightArrow.style.opacity = "1";
  }
}



function saveData() {
  let etape = document.querySelector(".form-container h3 span");
  let data = {};
  let url = "";

  // Sélectionnez tous les éléments input de type texte
  let inputs = document.querySelectorAll('input[type="text"]');

  // Parcourez chaque input et ajoutez sa valeur à l'objet data
  inputs.forEach(function (input) {
    let placeholder = input.placeholder;
    let value = input.value;

    // Ajoutez la valeur à l'objet data avec le placeholder comme clé
    data[placeholder] = value;
  });


  if (etape.innerHTML === "Étape 1:") {
    sessionStorage.setItem("step1", JSON.stringify(data));
    url = 'installer/setdata';
  }
  
  if (etape.innerHTML === "Étape 2:") {
    data['init'] = 'true';
    url = 'installer/initdatabase';
  }

  if (etape.innerHTML === "Étape 3:") {
    sessionStorage.setItem("step3", JSON.stringify(data));
    url = 'installer/createAdminAccount';
  }






  // Affichez l'objet data dans la console
  console.log(data);
  console.log(url);

  // Créez une Promise pour gérer la requête AJAX de manière asynchrone
  const sendRequest = new Promise(function(resolve, reject) {
    // Envoyer les données via AJAX
    let xhr = new XMLHttpRequest();
    xhr.open('POST', url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onload = function() {
      if (xhr.status === 200) {
        // Réponse avec succès
        let response = removeScriptTags(xhr.responseText);
        response = JSON.parse(response);
        resolve(response);
      } else {
        // Erreur lors de la requête
        reject(new Error('Erreur lors de la requête.'));
      }
    };

    xhr.onerror = function() {
      // Erreur lors de la requête
      reject(new Error('Erreur lors de la requête.'));
    };

    xhr.send(JSON.stringify(data));
  });

  // Utilisez la Promise pour traiter la réponse de la requête
  sendRequest
    .then(function(response) {
      // Faites quelque chose avec la réponse
      if (response.success) {
        if (etape.innerHTML === "Étape 1:") {
          alert('Données enregistrées avec succès !');
          changePage("/setup2");
        }
        if (etape.innerHTML === "Étape 2:") {
          alert('Base de données initialisée avec succès !');
          changePage("/setup3");
        }
      } else {
        if (etape.innerHTML === "Étape 1:") {
          alert('Erreur lors de l\'enregistrement des données.' + '\n' + response.message);
        }
        if (etape.innerHTML === "Étape 2:") {
          alert('Erreur lors de l\'initialisation de la Base de données.' + '\n' + response.message);
        }
      }
    })
    .catch(function(error) {
      // Gérez les erreurs de la requête
      alert(error.message);
    });
}


function removeScriptTags(response) {
  const regex = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi;
  const cleanedResponse = response.replace(regex, '');
  return cleanedResponse;
}


function loadData() {
  let valeur = sessionStorage.getItem('step1');
  let valeur2 = sessionStorage.getItem('step3');
  let etape = document.querySelector(".form-container h3 span");
  if (valeur && etape.innerHTML === "Étape 1:") {
    valeur = JSON.parse(valeur);
    remplirChamps(valeur);
  }
  if (valeur2 && etape === "Étape 3:") {
    valeur2 = JSON.parse(valeur2);
    remplirChamps(valeur2);
  }

}


function remplirChamps(data) {
  let inputs = document.querySelectorAll('input[type="text"]');
  for (let i = 0; i < inputs.length; i++) {
    let input = inputs[i];
    let placeholder = input.placeholder;

    if (data.hasOwnProperty(placeholder)) {
      input.value = data[placeholder];
    }
  }
}
