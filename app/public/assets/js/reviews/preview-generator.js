document.addEventListener("DOMContentLoaded", function() {
    // Variable pour la preview
    let descriptionValue = document.getElementById("descriptionHolder");
    let previewElement = document.getElementById("create-review-preview");

    descriptionValue.addEventListener('input', function(){
        let descriptionText = descriptionValue.value;

        // Créer un nouvel élément <span> avec la classe "white-text"
        let previewTextElement = document.createElement("span");
        previewTextElement.classList.add("white-text");
        previewTextElement.textContent = descriptionText;

        // Effacer le contenu précédent de la prévisualisation
        previewElement.innerHTML = "";

        // Ajouter le nouvel élément comme enfant de la prévisualisation
        previewElement.appendChild(previewTextElement);
    });
});