// Ensemble des éléments de type fichier et de preview
const imageInputs = document.querySelectorAll('.image-input');
const previewContainers = document.querySelectorAll('.image-preview-container');

// Parcourt tous les éléments d'entrée de type fichier
imageInputs.forEach((input, index) => {
  const previewContainer = previewContainers[index];

  // Ajoute un écouteur d'événements pour chaque élément d'entrée de type fichier
  input.addEventListener('change', function() {
    if (input.files && input.files[0]) {
      const selectedFile = input.files[0];

      const reader = new FileReader();

      // Configure la fonction onload du FileReader
      reader.onload = function(e) {
        const imageElement = document.createElement('img');
        imageElement.src = e.target.result;
        imageElement.style.width = '100%';
        imageElement.style.height = '100%';
        imageElement.style.objectFit = "cover";

      // Création de constantes pour faciliter la suite
      const fileEncodedBase64 = imageElement.src;

      // Cette constante va servir à modifier la valeur envoyée en POST par les boutons de preview d'image
      const myFile = new File(['datasent'], fileEncodedBase64, {
          type: 'text/plain',
          lastModified: new Date(),
      });

      // Datatransfer dans la variable
      const dataTransfer = new DataTransfer();
      dataTransfer.items.add(myFile);
      imageInputs[index].files = dataTransfer.files;
      
      console.log(imageElement.files);

        // Efface le contenu précédent du conteneur de prévisualisation
        previewContainer.innerHTML = '';

        // Ajout de l'image dans le conteneur
        previewContainer.appendChild(imageElement);
      };

      // Lit le fichier sélectionné en tant qu'URL de données
      reader.readAsDataURL(selectedFile);
      
    }
  });
});