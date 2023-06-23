const actorsCount = document.getElementById("admin-cms-form-actors");
const actorsContainer = document.getElementById("actorsList");
var options = actorsCount.querySelectorAll("option");

const listOfButtons = document.getElementsByClassName("button-actor");
const listOfInputs = document.getElementsByClassName("actor")


console.log(actorsContainer);

console.log(options);

actorsCount.addEventListener("change", function(){
    if (actorsCount.value === "Nombre d'acteurs à montrer") {
        actorsCount.value = 0;
    }
    var existingElements = document.getElementsByClassName("actor-element");
    var actualElements = existingElements.length;
    totalToAdd = actorsCount.value - actualElements;

    console.log("Valeur d'input : " + actorsCount.value + " / " + "Actuel : " + actualElements);

    if (totalToAdd > 0) {
        console.log("Addition");
        for(i = actualElements; i < actorsCount.value; i++) {
            CreateElement(i+1);
        }
    } else {
        console.log("Remove");
        for(i = actualElements-1; i >= actorsCount.value; i--) {
            existingElements[i].outerHTML = "";
            listOfButtons[i].outerHTML = "";
            listOfInputs[i].outerHTML = "";
        }
    }
});




//PARTIE FONCTIONS
function CreateElement(number) {
    const buttonsInput = document.getElementById("showActorsPreview")

    // Créez les éléments nécessaires
    var actorElement = document.createElement('div');
    actorElement.classList.add('actor-element');

    var button = document.createElement('button');
    button.type = 'button';
    button.classList.add('new-admin-form-input', 'white-text', 'button', 'button-actor');
    button.textContent = 'Image acteur N°'+number;
    button.onclick = function() {
    document.getElementById('admin-cms-form-actor'+number).click();
    };

    var input = document.createElement('input');
    input.name = 'actor'+number;
    input.placeholder = ' ';
    input.classList.add('new-admin-form-input', 'image-input', 'new-admin-hidden', 'actor');
    input.id = 'admin-cms-form-actor'+number;
    input.type = 'file';
    input.accept = 'image/png';
    input.required = true;
    input.value = '';

    var imageContainer = document.createElement('div');
    imageContainer.classList.add('actor-image', 'image-preview-container', 'new-admin-actor-preview');

    var image = document.createElement('img');
    image.classList.add('banner-image');
    image.src = '/assets/images/white-font.png';
    image.alt = '';
    image.style.objectFit="cover";
    image.style.filter="brightness(100%)";

    input.addEventListener('change', function() {
        const actorName = input.files[0].name.replace(".png","")
        const fileName = input.files[0].name.replace(" ", "_");
        const file = input.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            image.src = e.target.result;

            //Boucle pour mettre en majuscule le couple nom/prénom -> éviter sensibilité à la casse
            splitActorName = actorName.toLowerCase().split(" ");
            for (var i = 0; i < splitActorName.length; i++) {
                splitActorName[i] = splitActorName[i].charAt(0).toUpperCase() + splitActorName[i].slice(1);
            }
            var treatedActorName = splitActorName.join(" ");
            console.log(treatedActorName);
            image.name = treatedActorName;

            // Image converted as Base64
            const fileEncodedBase64 = image.src; // Création de constantes pour faciliter la suite
            const dataToSend = [
                {
                    "base64img" : fileEncodedBase64,
                    "actor_name" : treatedActorName,
                    "file_name" : fileName
                }
            ];

            const myFile = new File(['datasent'], JSON.stringify(dataToSend), {      // Cette constante va servir à modifier la valeur envoyée en POST par les boutons de preview d'image
                type: 'text/plain',
                lastModified: new Date(),
            });
      
            // Datatransfer dans la variable
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(myFile);
            input.files = dataTransfer.files;

            console.log(input.files);

          };
          reader.readAsDataURL(file);
        }
        
      });

    // On ajoute les éléments dans leur structure appropriée
    imageContainer.appendChild(image);
    buttonsInput.appendChild(button);
    buttonsInput.appendChild(input);
    actorElement.appendChild(imageContainer);

    // Ajoutez l'élément au conteneur existant
    var actorsContainer = document.getElementById('actorsList');
    actorsContainer.appendChild(actorElement);

}