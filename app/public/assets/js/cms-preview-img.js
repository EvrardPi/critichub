// Sélectionne tous les éléments d'entrée de type fichier et la zone de prévisualisation
const imageInputs = document.querySelectorAll('.image-input');
const previewContainers = document.querySelectorAll('.image-preview-container');

// Parcourt tous les éléments d'entrée de type fichier
imageInputs.forEach((input, index) => {
  // Récupère le conteneur de prévisualisation correspondant
  const previewContainer = previewContainers[index];

  // Ajoute un écouteur d'événements pour chaque élément d'entrée de type fichier
  input.addEventListener('change', function() {
    // Vérifie si un fichier est sélectionné
    if (input.files && input.files[0]) {
      // Récupère le fichier sélectionné
      const selectedFile = input.files[0];

      // Crée un objet FileReader
      const reader = new FileReader();

      // Configure la fonction onload du FileReader
      reader.onload = function(e) {
        // Crée un élément d'image pour la prévisualisation
        const imageElement = document.createElement('img');
        imageElement.src = e.target.result;
        imageElement.style.width = '100%';
        imageElement.style.height = '100%';
        imageElement.style.objectFit = "cover";

        // Efface le contenu précédent du conteneur de prévisualisation
        previewContainer.innerHTML = '';

        // Ajoute l'élément d'image au conteneur de prévisualisation
        previewContainer.appendChild(imageElement);
      };

      // Lit le fichier sélectionné en tant qu'URL de données
      reader.readAsDataURL(selectedFile);
      imageInputs[index].style.display = "none";
    }
  });
});
