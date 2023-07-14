document.addEventListener('DOMContentLoaded', function() {
    console.log('SHEEEEEESODJIDKOIDH');
    fetch('/back-read-elementard', {
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
                console.log(row[2],row[6],row[7],row[11],row[12],row[16],row[17],row[18],row[19]);
                var createData = row[18];
                var dateParts = createData.split(' ')[0].split('-');
                var day = dateParts[2]; //
                var month = dateParts[1]; //
                var year = dateParts[0]; //
                var formattedDate = day + '-' + month + '-' + year;
                return {
                    name: row[12],
                    pictureData: '<img class="cms-img" src="' + row[11] + '" alt="Movie Picture" style="width: 100px; height: 150px;">',
                    userData : row[19],
                    categoriesData : row[2],
                    countViewData : row[17],
                    createData : formattedDate,
                    updateData : formattedDate,
                    button: '<button type="button" class="btn btn-primary view-btn" data-id="' + row[0] + '">Afficher</button>',
                    button2: '<button type="button" class="btn btn-warning update-btn" data-id="' + row[0] + '">Modifier</button>',
                    button3: '<form method="post" action="back-delete-cms">' +
                        '<input type="hidden" name="id" value="' + row[0] + '">' +
                        '<button class="btn btn-danger" type="submit">Supprimer</button>' +
                        '</form>'
                };
            });

            $('#myTable').DataTable({
                data: tableData,
                columns: [
                    { data: 'name' },
                    { data: 'pictureData' },
                    { data: 'userData' },
                    { data: 'categoriesData' },
                    { data: 'countViewData' },
                    { data: 'createData' },
                    { data: 'updateData' },
                    { data: 'button' },
                    { data: 'button2' },
                    { data: 'button3' },
                ]
            });

            // Ajout du console.log lors de l'appui sur le bouton "Modifier"
            $('#myTable').on('click', '.update-btn', function() {
                var id = $(this).data('id');
                console.log(id);
            });
        });
});
