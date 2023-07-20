document.addEventListener('DOMContentLoaded', function() {
    // Premier appel fetch pour remplir la table 1 (myTable)
    fetch('/back-read-comments', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    })
        .then(function(response) {
            return response.json();
        })
        .then(function(data) {

            const tableData1 = data.map(function(comment) {
                // Premier appel fetch pour récupérer le nom de la review via l'id_review
                return fetch('/media-getdata', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ id: comment.id_review }) // Envoyez l'id_review en tant que paramètre POST
                })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(reviewData) {
                        // Deuxième appel fetch pour récupérer les données de l'utilisateur via l'id_user
                        return fetch('/back-get-user?id=' + comment.id_user, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json'
                            }
                        })
                            .then(function(response) {
                                return response.json();
                            })
                            .then(function(userData) {

                                return {
                                    comment: comment.content,
                                    review: reviewData.movie_name, // Utilisez le nom récupéré de la review via le premier appel fetch
                                    author: userData.lastname + ' ' + userData.firstname, // Utilisez les données de l'utilisateur récupérées via le deuxième appel fetch
                                    accept: `<form method="post" action="back-publish-comments">
                                                <input type="hidden" name="id" value="${comment.id}">
                                                <button class="btn btn-primary" type="submit">Accepter</button>
                                            </form>`,
                                    delete: `<form method="post" action="back-delete-comments">
                                                <input type="hidden" name="id" value="${comment.id}">
                                                <button class="btn btn-danger" type="submit">Supprimer</button>
                                            </form>`
                                };
                            });
                    });
            });

            // Deuxième appel fetch pour remplir la table 2 (myTable2)
            fetch('/back-read-valid-comments', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    const tableData2 = data.map(function(comment) {
                        return fetch('/media-getdata', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ id: comment.id_review })
                        })
                            .then(function(response) {
                                return response.json();
                            })
                            .then(function(reviewData) {
                                return fetch('/back-get-user?id=' + comment.id_user, {
                                    method: 'GET',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    }
                                })
                                    .then(function(response) {
                                        return response.json();
                                    })
                                    .then(function(userData) {
                                        return {
                                            comment: comment.content,
                                            review: reviewData.movie_name,
                                            author: userData.lastname + ' ' + userData.firstname,
                                            delete: `<form method="post" action="back-delete-comments">
                                                        <input type="hidden" name="id" value="${comment.id}">
                                                        <button class="btn btn-danger" type="submit">Supprimer</button>
                                                    </form>`
                                        };
                                    });
                            });
                    });

                    // Utilisez Promise.all() pour attendre tous les fetcs
                    Promise.all([Promise.all(tableData1), Promise.all(tableData2)]).then(function([tableDataResolved1, tableDataResolved2]) {
                        // Ajouter les données au premier tableau myTable
                        $('#myTable').DataTable({
                            data: tableDataResolved1,
                            columns: [
                                { data: 'comment' },
                                { data: 'review' },
                                { data: 'author' },
                                { data: 'accept' },
                                { data: 'delete' },
                            ]
                        });

                        // Ajouter les données au deuxième tableau myTable2
                        $('#myTable2').DataTable({
                            data: tableDataResolved2,
                            columns: [
                                { data: 'comment' },
                                { data: 'review' },
                                { data: 'author' },
                                { data: 'delete' },
                            ]
                        });
                    });
                });
        });
});
