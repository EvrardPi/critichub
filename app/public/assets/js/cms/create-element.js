//PARTIE FONCTIONS
function CreateElement(number) {
    const buttonsInput = document.getElementById("admin-cms-form")

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
    input.required = false;
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