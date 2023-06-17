document.addEventListener('DOMContentLoaded', function() {
    fetch('/read', {
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
                console.log(row);
                var roleText = (row.role === 1) ? "Administrateur" : "Utilisateur";
                return {

                    name: row.firstname + ' ' + row.lastname,
                    email: row.email,
                    role: roleText,
                    button: '<button type="button" class="btn btn-warning update-btn" data-id="' + row.id + '" data-bs-toggle="modal" data-bs-target="#updateModal">Modifier</button>',

                    button2: '<form method="post" action="delete">' +
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
        });
});