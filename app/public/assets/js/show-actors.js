const actorsCount = document.getElementById("admin-cms-form-actors");
const actorsContainer = document.getElementById("actorsList");
var options = actorsCount.querySelectorAll("option");


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
            // var htmlContent = "<div class=\"actor-element image-preview-container new-admin-actor-preview\"><img class=\"banner-image\" src=\"/assets/images/white-font.png\" alt=\"\"></div>"
            // var htmlContent = "<div class=\"actor-element\"><button type=\"button\" class=\"new-admin-form-input white-text button button-actor\" onclick=\"document.getElementById('admin-cms-form-actor1').click()\">Actor</button><input name=\"actor\" placeholder class=\"new-admin-form-input image-input new-admin-hidden actor\" id=\"admin-cms-form-actor1\" type=\"file\" required value><div class=\"actor-image image-preview-container new-admin-actor-preview\"><img class=\"banner-image\" src=\"/assets/images/white-font.png\" alt=\"\"></div></div>"
            // var htmlContent = `
            // <div class="actor-element">
            //     <button type="button" class="new-admin-form-input white-text button button-actor" onclick="document.getElementById('admin-cms-form-actor1').click()">Actor</button>
            //     <input name="actor" placeholder class="new-admin-form-input image-input new-admin-hidden actor" id="admin-cms-form-actor1" type="file" required value>
            //     <div class="actor-image image-preview-container new-admin-actor-preview">
            //     <img class="banner-image" src="/assets/images/white-font.png" alt="">
            //     </div>
            // </div>
            // `;
            
            // actorsContainer.innerHTML += htmlContent;
            CreateElement(i+1);
        }
    } else {
        console.log("Remove");
        for(i = actualElements-1; i >= actorsCount.value; i--) {
            existingElements[i].outerHTML = "";
        }
    }
});

function CreateElement(number) {
    // Créez les éléments nécessaires
    var actorElement = document.createElement('div');
    actorElement.classList.add('actor-element');

    var button = document.createElement('button');
    button.type = 'button';
    button.classList.add('new-admin-form-input', 'white-text', 'button', 'button-actor');
    button.textContent = 'Actor';
    button.onclick = function() {
    document.getElementById('admin-cms-form-actor'+number).click();
    };

    var input = document.createElement('input');
    input.name = 'actor';
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

    input.addEventListener('change', function() {
        const file = input.files[0];
        if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
            image.src = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      });

    // Ajoutez les éléments dans la structure appropriée
    imageContainer.appendChild(image);
    actorElement.appendChild(button);
    actorElement.appendChild(input);
    actorElement.appendChild(imageContainer);

    // Ajoutez l'élément au conteneur existant
    var actorsContainer = document.getElementById('actorsList');
    actorsContainer.appendChild(actorElement);

}