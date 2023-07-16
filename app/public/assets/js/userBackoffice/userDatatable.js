document.addEventListener('DOMContentLoaded', function() {
    console.log('userDatatable.js chargé');
    fetch('/back-read-user', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {
            // Utilisez les données retournées pour effectuer les actions souhaitées
            var tableData = data.map(function(row) {

                var roleText = (row.role === 1) ? "Administrateur" : "Utilisateur";
                return {

                    name: row.firstname + ' ' + row.lastname,
                    email: row.email,
                    role: roleText,
                    button: '<button type="button" class="btn btn-warning update-btn" data-id="' + row.id + '" data-bs-toggle="modal" data-bs-target="#updateModal">Modifier</button>',
                    button2: '<form method="post" action="back-delete-user">' +
                        '<input type="hidden" name="id" value="' + row.id + '">' +
                        '<button class="btn btn-danger" type="submit">Supprimer</button>' +
                        '</form>'
                };
            });

            // Initialisez le tableau DataTable avec les données récupérées
            $('#myTable').DataTable({
                data: tableData,
                columns: [
                    { data: 'name' },
                    { data: 'email' },
                    { data: 'role' },
                    { data: 'button' },
                    { data: 'button2' }
                ]
            });
        })
    .then(function() {
        console.log('test');
        // Attendre le chargement complet du DOM

        let updateButtons = document.querySelectorAll('.update-btn');
        console.log (updateButtons);
        updateButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                console.log("marche");
                let userId = this.getAttribute('data-id');

                fetch('/back-get-user?id=' + userId, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json'
                    }
                })
                    .then(function(response) {
                        return response.json(); // Convertir la réponse en JSON
                    })
                    .then(function(data) {
                        console.log(userId,data);
                        // Pré-remplir les champs du formulaire avec les données de l'utilisateur
                        let firstnameInput = document.getElementById('update-form-firstname');
                        let lastnameInput = document.getElementById('update-form-lastname');
                        let emailInput = document.getElementById('update-form-email');
                        let dateOfBirthInput = document.getElementById('update-form-birth_date');
                        let roleInput = document.getElementById('update-form-role');
                        let idInput = document.getElementById('update-form-id');

                        if (firstnameInput && lastnameInput && emailInput && roleInput && idInput &&dateOfBirthInput) {

                            var dateOfBirth = new Date(data.creation_date);
                            var year = dateOfBirth.getFullYear();
                            var month = String(dateOfBirth.getMonth() + 1).padStart(2, '0');
                            var day = String(dateOfBirth.getDate()).padStart(2, '0');
                            var formattedDate = year + '-' + month + '-' + day;

                            firstnameInput.value = data.firstname;
                            lastnameInput.value = data.lastname;
                            emailInput.value = data.email;
                            dateOfBirthInput.value = formattedDate;
                            idInput.value = userId;

                            // Déterminer le texte du rôle en fonction de la valeur du rôle
                            if (data.role === 1) {
                                roleInput.value = 'admin';
                            } else if (data.role === 3) {
                                roleInput.value = 'utilisateur';
                            } else {
                                roleInput.value = ''; // Valeur par défaut si le rôle n'est ni 1 ni 3
                            }

                            // Afficher la modal de mise à jour
                            let updateModal = new bootstrap.Modal(document.getElementById('updateModal'));
                            updateModal.show();
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

