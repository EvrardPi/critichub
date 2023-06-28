// Ensemble des éléments de type fichier et de preview
const imageInputs = document.querySelectorAll('.image-input');
const previewContainers = document.querySelectorAll('.image-preview-container');


imageInputs.forEach((input, index) => {         // Parcourt tous les éléments d'entrée de type fichier
  const previewContainer = previewContainers[index];

  
  input.addEventListener('change', function() { // Ajoute un écouteur d'événements pour chaque élément d'entrée de type fichier
    if (input.files && input.files[0]) {
      const selectedFile = input.files[0];

      const reader = new FileReader();

      
      reader.onload = function(e) { // Configure la fonction onload du FileReader
        const imageElement = document.createElement('img');
        imageElement.src = e.target.result;
        if (!imageInputs[index].classList.contains("actor")) { // Mise en place d'une vérif pour ne pas attribuer la taille aux images qui correspondent aux acteurs
        imageElement.style.width = '100%';
        imageElement.style.height = '100%';
        imageElement.style.objectFit = "cover";
        }
        previewContainer.innerHTML = ''; // Efface le contenu précédent du conteneur de prévisualisation

        
        previewContainer.appendChild(imageElement); // Ajout de l'image dans le conteneur
      };

      
      reader.readAsDataURL(selectedFile); // Lit le fichier sélectionné en tant qu'URL de données
      
    }
  });
});