<section id="media-creator">

    <div class="banner container-75">
        <div class="inside-img">
            <h2 class="white-text"><?= $_POST["titleMedia"]?></h2> 

            <h4>
                <div class="white-text"><i><?= $_POST["category"]?></i></div>
            </h4>
            <h5>
                <?php for ($i=1; $i<= 5; $i++) { 
                    if ($i <= $_POST['stars']) {
                        echo "<i class='fa fa-star'></i>";
                    } elseif ($i - $_POST['stars'] <= 0.5) {
                        echo "<i class='fa fa-star-half-full'></i>";
                    } else {
                        echo "<i class='fa fa-star-o'></i>";
                    }
                   
                } ?>
                <span class="white-text"><?= sprintf("%.1f",$_POST["stars"]) ?></span>
            </h5>
        </div>
        <div>
            <div class="banner-image image-preview-container">
                <?php $jsonBannerData = json_decode($_POST["banner"], true);?>
                <img class="banner-image" src="<?= $jsonBannerData[0]["base64img"]?>" alt="">
            </div>
        </div>

        <div class="img-position">
            <div class="image-preview-container">
                <?php $jsonLogoData = json_decode($_POST["logo"], true);?>
                <img class="banner-logo" src="<?= $jsonLogoData[0]["base64img"]?>" alt="">
            </div>
        </div>
    </div>



</section>

<section id="movie-description">
    <div class="new-admin description container-50">
        <span class="white-text description-title"><i><strong><u><?= $_POST["slogan"]?></u></strong></i></span>
        <span class="white-text description-subtext"><?= $_POST["description"]?></span>
    </div>

</section>

<section id="main-actors">
    <div class="main-actors container-50">
        <h2 class="white-text">Acteurs principaux</h2>
    </div>

    <div class="actors container-90">
        <div class="horizontal-line horizontal-line-movies container-75">
        <?php for ($i = 1; $i <= $_POST["actors"]; $i++ ) {
            $actor_data = "actor" . $i;
            $jsonActorData = json_decode($_POST[$actor_data], true);?>

            <div class="actors-libelle">
                <div class="actors-libelle-inside-img">
                    <h2><b><?= $jsonActorData[0]["actor_name"] ?></b></h2>
                </div>
                <img class="banner-image" src="<?= $jsonActorData[0]["base64img"] ?>" alt="">

            </div>

        <?php } ?>
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

<div class="button-submit">
    <a href="/new-admin-review" class="button button-review">Recommencer une preview</a>
    <a href="#" class="button button-review">Publier la review administrateur</a>
</div>

<script src="/assets/js/cms-preview-img.js"></script>