document.addEventListener('DOMContentLoaded', function() {
    async function fetchData(url, method, data) {
        const response = await fetch(url, {
            method: method,
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        });
        return response.json();
    }

    async function fetchCommentsAndRenderTable() {
        try {
            const commentsToManage = await fetchData('/back-read-comments', 'GET');
            const tableData1 = await Promise.all(commentsToManage.map(async (comment) => {
                const reviewData = await fetchData('/media-getdata', 'POST', { id: comment.id_review });

                let author = '';
                if (comment.id_user) {
                    const userData = await fetchData('/back-get-user?id=' + comment.id_user, 'GET');
                    author = userData.lastname + ' ' + userData.firstname;
                } else {
                    author = 'Compte supprimé';
                }

                return {
                    comment: comment.content,
                    review: reviewData.movie_name,
                    author: author,
                    accept: `<form method="post" action="back-publish-comments">
                                <input type="hidden" name="id" value="${comment.id}">
                                <button class="btn btn-primary" type="submit">Accepter</button>
                            </form>`,
                    delete: `<form method="post" action="back-delete-comments">
                                <input type="hidden" name="id" value="${comment.id}">
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>`
                };
            }));
            const validatedComments = await fetchData('/back-read-valid-comments', 'GET');
            const tableData2 = await Promise.all(validatedComments.map(async (comment) => {
                const reviewData = await fetchData('/media-getdata', 'POST', { id: comment.id_review });

                let author = '';
                if (comment.id_user) {
                    const userData = await fetchData('/back-get-user?id=' + comment.id_user, 'GET');
                    author = userData.lastname + ' ' + userData.firstname;
                } else {
                    author = 'Compte supprimé';
                }

                return {
                    comment: comment.content,
                    review: reviewData.movie_name,
                    author: author,
                    delete: `<form method="post" action="back-delete-comments">
                                <input type="hidden" name="id" value="${comment.id}">
                                <button class="btn btn-danger" type="submit">Supprimer</button>
                            </form>`
                };
            }));
            $('#myTable').DataTable({
                data: tableData1,
                columns: [
                    { data: 'comment' },
                    { data: 'review' },
                    { data: 'author' },
                    { data: 'accept' },
                    { data: 'delete' },
                ]
            });

            $('#myTable2').DataTable({
                data: tableData2,
                columns: [
                    { data: 'comment' },
                    { data: 'review' },
                    { data: 'author' },
                    { data: 'delete' },
                ]
            });
        } catch (error) {
            console.error('Erreur lors de la récupération et du rendu des données:', error);
        }
    }

    fetchCommentsAndRenderTable();
});
