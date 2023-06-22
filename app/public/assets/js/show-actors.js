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
    console.log(listOfButtons);
    console.log(listOfInputs);


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
        const file = input.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            image.src = e.target.result;

            console.log(image.src); // Base 64 image
            const fileEncodedBase64 = image.src; // Création de constantes pour faciliter la suite

            const myFile = new File(['datasent'], fileEncodedBase64, {      // Cette constante va servir à modifier la valeur envoyée en POST par les boutons de preview d'image
                type: 'text/plain',
                lastModified: new Date(),
            });
      
            // Datatransfer dans la variable
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(myFile);
            input.files = dataTransfer.files;

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