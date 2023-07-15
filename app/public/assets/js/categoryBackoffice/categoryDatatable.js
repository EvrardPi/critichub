document.addEventListener('DOMContentLoaded', function() {
    console.log('SHEEEEEESH');
    fetch('/back-read-category', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            console.log(data);

            var tableData = data.map(function(row) {
                console.log(row.name, row.id);
                return {
                    name: row.name,
                    pictureData: '<img class="categorie-img" src="assets/images/category/' + row.name + ".png" + '" alt="Category Picture">',
                    button: '<button type="button" class="btn btn-warning update-btn" data-id="' + row.id + '" data-bs-toggle="modal" data-bs-target="#updateModal">Modifier</button>',
                    button2: '<form method="post" action="back-delete-category">' +
                        '<input type="hidden" name="id" value="' + row.id + '">' +
                        '<input type="hidden" name="name" value="' + row.name + '">' +
                        '<button class="btn btn-danger" type="submit">Supprimer</button>' +
                        '</form>'
                };
            });

            $('#myTable').DataTable({
                data: tableData,
                columns: [
                    { data: 'name' },
                    { data: 'pictureData' },
                    { data: 'button' },
                    { data: 'button2' }
                ]
            });
        }).then(function() {
        console.log('test');
        // Attendre le chargement complet du DOM

        let updateButtons = document.querySelectorAll('.update-btn');
        console.log (updateButtons);
        updateButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                console.log("marche");
                let userId = this.getAttribute('data-id');

                fetch('/back-get-category?id=' + userId, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                    .then(function(response) {
                        return response.json(); // Convertir la réponse en JSON
                    })
                    .then(function(data) {
                        console.log(data);
                        // Pré-remplir les champs du formulaire avec les données de l'utilisateur
                        let name = document.getElementById('update-form-category-name');
                        let imagePreview = document.getElementById('image-preview');
                        let base64Input = document.getElementById('update-form-category-base64');
                        let idInput = document.getElementById('update-form-id');

                        if (name && idInput) {
                            name.value = data.name;
                            imagePreview.src = 'assets/images/category/' + data.name + '.png';
                            idInput.value = userId;
                            console.log(name, imagePreview, idInput);

                            // Afficher la modal de mise à jour
                            let updateModal = new bootstrap.Modal(document.getElementById('updateModal'));
                            updateModal.show();

                            // Ajouter un écouteur d'événements pour le changement de fichier
                            let imageInput = document.getElementById('update-form-category-picture');
                            imageInput.addEventListener('change', function(event) {
                                const file = event.target.files[0]; // Récupérer le fichier sélectionné

                                if (file) {
                                    const reader = new FileReader();

                                    reader.readAsDataURL(file);

                                    reader.onloadend = function() {
                                        const base64Data = reader.result;
                                        console.log(base64Data);

                                        // Mettre à jour la source de l'image de prévisualisation avec la base64
                                        imagePreview.src = base64Data;

                                        // Mettre à jour la valeur de l'input de la base64
                                        base64Input.value = base64Data;
                                    };
                                }
                            });
                        } else {
                            console.error('Les éléments du formulaire sont introuvables.');
                        }
                    })
                    .catch(function(error) {
                        console.error('Une erreur s\'est produite :', error);
                    });
            });
        });
    });
});
