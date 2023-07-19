<style>
    .unselectable {
        -webkit-user-select: none;
        /* Chrome/Safari */
        -moz-user-select: none;
        /* Firefox */
        -ms-user-select: none;
        /* IE10+ */
        user-select: none;
        cursor: pointer;
    }

    /* Hide any table row with the class "hidden" */
    .hidden {
        display: none;
    }

    .description {
        display: table-cell;
        max-width: 300px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }

    .table td {
        border-right: 1px solid;
        border-color: inherit;
    }

    .table td:last-child {
        border-right: none;
    }
</style>

<section id="banner-image">

    <div class="home-slogan" style="margin-top: 3%;display: grid">

        <div style="font-size: 20px;margin-bottom: 3%">

            <input onkeyup="searchCatalog(event)" id="idrecherche" placeholder="Rechercher un nom de film" type="text">

            <select id="category-select">
                <option value="all">Toutes les catégories</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?= strtolower(str_replace(' ', '', $category['name'])) ?>"><?= $category['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="table-responsive">
            <table class="table unselectable" style="font-size: 16px;text-align: center;vertical-align: middle;">
                <thead>
                    <tr>
                        <th scope="col">Note</th>
                        <th scope="col">Image</th>
                        <th scope="col">Nom du film</th>
                        <th scope="col">Catégories</th>
                        <th scope="col">Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reviews as $review) : ?>
                        <tr data-categories="<?= strtolower(str_replace(' ', '', $review['categories'])) ?>" data-href="https://critichub.fr/media?id=<?= $review['id'] ?>">
                            <td><?= $review['note'] ?></td>
                            <td>
                                <img style="width: 5rem;" src="<?= $review['image_url'] ?>" alt="Affiche <?= $review['movie_name'] ?>">
                            </td>
                            <td><?= $review['movie_name'] ?></td>
                            <td><?= $review['categories'] ?></td>
                            <td class="description"><?= $review['critique'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <script>
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
        </script>

    </div>
</section>

<script type="module" src="/assets/js/gestionFront/applyFront.js"></script>
<script type="module" src="/assets/js/home.js"></script>