$(document).ready(function() { // code dans $(document) exécuté lorsque DOM (Document Object Model) est entièrement chargé

    $('tr[data-href]').on("click", function() { // Attache événements click à toutes les lignes data-href
        document.location = $(this).data('href');
    });

    // Attache filterTable() aux événements change de category-select et keyup de l'élément idrecherche
    $('#category-select').on('change', filterTable);
    $('#idrecherche').on('keyup', filterTable);

    function filterTable(event) { // appelée lorsque l'utilisateur change le select ou tape dans l'input de search
        const selectedCategory = $('#category-select').val();
        const searchValue = $('#idrecherche').val();
        const regex = new RegExp(searchValue, "i");
        // Crée expression régulière à partir du champ de recherche
        // i = expression régulière insensible à la casse.

        $('tbody tr').each(function() { // Parcourt toutes les lignes de la table

            var categories = $(this).data('categories').split(',');
            var movieName = $(this).find('td').eq(2).text();

            // SI catégorie sélectionnée = all 
            // OU incluse dans les catégories 
            // ET champ de recherche est vide 
            // OU nom du film = valeur du champ de recherche
            if ((selectedCategory === 'all' || categories.includes(selectedCategory)) &&
                (!searchValue || regex.test(movieName))) {
                $(this).removeClass('hidden');
            } else {
                $(this).addClass('hidden');
            }
        });
    };
});