<link rel="stylesheet" href="/assets/css/reviews.css">

<section id="banner-image">

    <div class="home-slogan" style="margin-top: 3%;display: grid">

        <div class="table-elements" style="font-size: 20px;margin-bottom: 3%">

        <div class="input-cover mrg-rgt-search">
            <input onkeyup="searchCatalog(event)" id="idrecherche" placeholder="Recherche" type="text">
        </div>

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
                            <td class="description"><?= $review['movie_name'] ?></td>
                            <td class="description"><?= $review['categories'] ?></td>
                            <td class="description"><?= $review['critique'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<script type="module" src="/assets/js/gestionFront/applyFront.js"></script>
<script type="module" src="/assets/js/home.js"></script>
<script type="module" src="/assets/js/reviews/reviews.js"></script>