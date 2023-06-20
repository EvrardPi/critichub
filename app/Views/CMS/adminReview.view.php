<section id="media-creator">

    <div class="banner container-75">
        <div class="inside-img">
            <h2 class="white-text"><?= $_GET["titleMedia"]?></h2> 

            <h4>
                <div class="white-text"><i><?= $_GET["category"]?></i></div>
            </h4>
            <h5>
                <?php for ($i=1; $i<= 5; $i++) { 
                    if ($i <= $_GET['stars']) {
                        echo "<i class='fa fa-star'></i>";
                    } elseif ($i - $_GET['stars'] <= 0.5) {
                        echo "<i class='fa fa-star-half-full'></i>";
                    } else {
                        echo "<i class='fa fa-star-o'></i>";
                    }
                   
                } ?>
                <span class="white-text"><?= sprintf("%.1f",$_GET["stars"]) ?></span>
            </h5>
        </div>
        <div>
            <div>
                <button class="new-admin-inside-img white-text" onclick="document.getElementById('getFileBanner').click()">Image bannière</button>
                <input type="file" id="getFileBanner" class="image-input new-admin-inside-img" accept="image/png" style="display:none;">

            </div>
            <div class="banner-image image-preview-container">
                <img class="banner-image" src="/assets/images/white-font.png" alt="">
            </div>

        </div>

        <div class="img-position">
            <button class="new-admin-prompt" onclick="document.getElementById('getFileLogo').click()">Votre logo ici</button>
            <input type="file" id="getFileLogo" class="image-input" accept="image/png" style="display:none;">
            <div class="image-preview-container new-admin-logo"></div>
        </div>
    </div>



</section>

<section id="movie-description">
    <div class="new-admin description container-50">
        <span class="white-text description-title"><i><strong><u><?= $_GET["slogan"]?></u></strong></i></span>
        <span class="white-text description-subtext"><?= $_GET["description"]?></span>
    </div>

</section>

<section id="main-actors">
    <div class="main-actors container-50">
        <h2 class="white-text">Acteurs principaux</h2>
    </div>

    <div class="actors container-90">
        <div class="horizontal-line horizontal-line-movies">
            <div>
                <button class="new-admin-prompt" onclick="document.getElementById('getFileActor1').click()">Insérer Acteur</button>
                <input type="file" id="getFileActor1" class="image-input" accept="image/png" style="display:none;">
                <div class="image-preview-container new-admin-actor"></div>
            </div>
            <div>
                <button class="new-admin-prompt" onclick="document.getElementById('getFileActor2').click()">Insérer Acteur</button>
                <input type="file" id="getFileActor2" class="image-input" accept="image/png" style="display:none;">
                <div class="image-preview-container new-admin-actor"></div>
            </div>
            <div>
                <button class="new-admin-prompt" onclick="document.getElementById('getFileActor3').click()">Insérer Acteur</button>
                <input type="file" id="getFileActor3" class="image-input" accept="image/png" style="display:none;">
                <div class="image-preview-container new-admin-actor"></div>
            </div>
            <div>
                <button class="new-admin-prompt" onclick="document.getElementById('getFileActor4').click()">Insérer Acteur</button>
                <input type="file" id="getFileActor4" class="image-input" accept="image/png" style="display:none;">
                <div class="image-preview-container new-admin-actor"></div>
            </div>
            <div>
                <button class="new-admin-prompt" onclick="document.getElementById('getFileActor5').click()">Insérer Acteur</button>
                <input type="file" id="getFileActor5" class="image-input" accept="image/png" style="display:none;">
                <div class="image-preview-container new-admin-actor"></div>
            </div>
            <div>
                <button class="new-admin-prompt" onclick="document.getElementById('getFileActor6').click()">Insérer Acteur</button>
                <input type="file" id="getFileActor6" class="image-input" accept="image/png" style="display:none;">
                <div class="image-preview-container new-admin-actor"></div>
            </div>
        </div>
    </div>
</section>

<section id="media-critics">
    <div class="critics container-90">
        <h2 class="white-text">Les avis des internautes</h2>
        <hr>
        <h1 class="white-text">Aucune critique pour le moment</h1>
    </div>
</section>

<div class="container-100 button-submit">
    <a href="#" class="button button-review">Publier la review administrateur</a>
</div>

<script src="/assets/js/cms-preview-img.js"></script>