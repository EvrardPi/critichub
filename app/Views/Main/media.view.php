<?php 
namespace App;
use App\Middlewares\Error;

    $allMediaIDs = $medias->getAllMediaIDs();
    $foundId = false;

    for ($i=0; $i < sizeof($allMediaIDs); $i++) { 
        $id_movie = $allMediaIDs[$i]["id_movie"];
        if ($id_movie == $_GET['id']) {
            $foundId = true;
        }
    }

    if ($foundId === false) {
        $error = new Error();
        header("Location: 404");
    }

    $mediaInformations = $medias->getMediaInfo(['id_movie' => $_GET['id']]);


?>

<section id="media-banner">

    <div class="banner container-75">
        <div class="inside-img">
            <h2 class="white-text"><?=$mediaInformations["titlemedia"]?></h2>
            <h3 class="white-text"><i><?=$mediaInformations["category"]?></i></h3>
            <?php 
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= $mediaInformations["stars"]) {
                    echo "<span class=\"white-text\"><i class='fa fa-star'></i></span>";
                } elseif ($i - $mediaInformations["stars"] <= 0.5) {
                    echo "<span class=\"white-text\"><i class='fa fa-star-half-full'></i></span>";
                } else {
                    echo "<span class=\"white-text\"><i class='fa fa-star-o'></i></span>";
                }
            }
            ?>
            <span class="white-text"><?=sprintf("%.1f", $mediaInformations["stars"])?></span>
        </div>
        <img class="banner-image" src="/<?=$mediaInformations["banner"]?>" alt="">
        <div class="img-position">
            <img class="banner-logo" src="<?=$mediaInformations["logo"]?>" alt="logo-game">
        </div>
    </div>



</section>

<section id="movie-description">

    <div class="description container-50">
        <span class="white-text description-title"><i><strong><u><?=$mediaInformations["slogan"]?></u></strong></i></span>
        <span class="white-text description-subtext"><?=$mediaInformations["description"]?>
    </div>

</section>

<section id="main-actors">
    <div class="main-actors container-50">
        <h2 class="white-text">Acteurs principaux</h2>
    </div>

    <div class="actors container-75">
        <div class="horizontal-line horizontal-line-movies">
            <?php 
            
            for ($i=1; $i <= $mediaInformations["actors"]; $i++) { 
                $actorPath = "actor".$i;

                echo "<a href=\"#\"><img src=".$mediaInformations[$actorPath]." alt=\"actor\"></a>";
            }

            ?>
        </div>
    </div>
</section>

<section id="media-critics">
    <div class="critics container-75">

        <div class="critics-reviews-leftside container-40">
            <div class="critics-reviews-stars">
                <span><b>Vos avis</b></span>

                <div class="critics-reviews-stars-numbers">
                    <span class="total-reviews"><b>4.7</b></span>
                    <div>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                    </div>

                    <span class="number-reviews"><span id="numberOfReviews">1000</span> avis</span>
                </div>

                <div class="critics-reviews-progress">
                    <div class="critics-reviews-progress-element">
                        <label for="progress-5">5</label>
                        <progress id="progress-5" class="star-5" value="50" max="100"></progress>
                        <span id="text-progress-5"><?php echo "<script>document.getElementById(\"text-progress-5\").innerHTML = '<b>' + document.getElementById(\"progress-5\").value + '% </b>'</script>" ?></span>
                        <span id="number-progress-5" class="sub-text"><?php echo "<script>document.getElementById(\"number-progress-5\").innerHTML = parseInt(document.getElementById(\"numberOfReviews\").innerHTML * document.getElementById(\"progress-5\").value / 100)</script>" ?></span>
                    </div>

                    <div class="critics-reviews-progress-element">
                        <label for="progress-4">4</label>
                        <progress id="progress-4" class="star-4" value="10" max="100"></progress>
                        <span id="text-progress-4" class="percentage-text"><b><?php echo "<script>document.getElementById(\"text-progress-4\").innerHTML = '<b>' + document.getElementById(\"progress-4\").value + '% </b>'</script>" ?></b></span>
                        <span id="number-progress-4" class="sub-text"><?php echo "<script>document.getElementById(\"number-progress-4\").innerHTML = parseInt(document.getElementById(\"numberOfReviews\").innerHTML * document.getElementById(\"progress-4\").value / 100)</script>" ?></span>
                    </div>

                    <div class="critics-reviews-progress-element">
                        <label for="progress-3">3</label>
                        <progress id="progress-3" class="star-3" value="5" max="100"> </progress>
                        <span id="text-progress-3" class="percentage-text"><b><?php echo "<script>document.getElementById(\"text-progress-3\").innerHTML = '<b>' + document.getElementById(\"progress-3\").value + '% </b>'</script>" ?></b></span>
                        <span id="number-progress-3" class="sub-text"><?php echo "<script>document.getElementById(\"number-progress-3\").innerHTML = parseInt(document.getElementById(\"numberOfReviews\").innerHTML * document.getElementById(\"progress-3\").value / 100)</script>" ?></span>
                    </div>

                    <div class="critics-reviews-progress-element">
                        <label for="progress-2">2</label>
                        <progress id="progress-2" class="star-2" value="26" max="100"></progress>
                        <span id="text-progress-2" class="percentage-text"><b><?php echo "<script>document.getElementById(\"text-progress-2\").innerHTML = '<b>' + document.getElementById(\"progress-2\").value + '% </b>'</script>" ?></b></span>
                        <span id="number-progress-2" class="sub-text"><?php echo "<script>document.getElementById(\"number-progress-2\").innerHTML = parseInt(document.getElementById(\"numberOfReviews\").innerHTML * document.getElementById(\"progress-2\").value / 100)</script>" ?></span>

                    </div>

                    <div class="critics-reviews-progress-element">
                        <label for="progress-1">1</label>
                        <progress id="progress-1" class="star-1" value="35" max="100"></progress>
                        <span id="text-progress-1" class="percentage-text"><b><?php echo "<script>document.getElementById(\"text-progress-1\").innerHTML = '<b>' + document.getElementById(\"progress-1\").value + '% </b>'</script>" ?></b></span>
                        <span id="number-progress-1" class="sub-text"><?php echo "<script>document.getElementById(\"number-progress-1\").innerHTML = parseInt(document.getElementById(\"numberOfReviews\").innerHTML * document.getElementById(\"progress-1\").value / 100)</script>" ?></span>

                    </div>
                </div>
            </div>

            <div class="critics-reviews-create-review">
                <hr>
                <h3>Écrire un commentaire</h3>
                <span>Donnez votre opinion sur cette oeuvre !</span>
                <a href="create-review"><button id="create-preview" class="button button-create-review">Écrire un commentaire</button></a>
                <hr>
            </div>
        </div>



        <div class="critics-reviews-text container-65">
            <span class="white-text critics-reviews-title"><b>Les évaluations pertinentes</b></span>

            <div class="critics-reviews-element">
                <div class="user-profile">
                    <img class="profile-picture" src="/assets/images/icon-circle-man.png" alt="">
                    <span class="white-text">Username</span>
                </div>
                <div class="stars stars-5">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <span class="white-text"><b>À couper le souffle<b></span>
                </div>
                <span class="sub-text">Commenté le 02/07/2023 à 15:56</span>
                <div class="critics-reviews-element-content">
                    <span class="white-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum est obcaecati earum officiis nisi veritatis a velit, officia possimus accusantium ratione expedita assumenda qui rem nulla debitis dolore eveniet architecto.</span>
                </div>

                <div class="critics-reviews-element-buttons">
                    <button id="validate-review" class="button button-moderate">Like</button></a>
                    <hr>
                    <a href="report-review"><button id="report-review" class="button button-moderate">Signaler</button></a>
                </div>
            </div>

            <div class="critics-reviews-element">
                <div class="user-profile">
                    <img class="profile-picture" src="/assets/images/icon-circle-man.png" alt="">
                    <span class="white-text">Username</span>
                </div>
                <div class="stars stars-4">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    <span class="white-text"><b>À couper le souffle<b></span>
                </div>
                <span class="sub-text">Commenté le 02/07/2023 à 15:56</span>
                <div class="critics-reviews-element-content">
                    <span class="white-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum est obcaecati earum officiis nisi veritatis a velit, officia possimus accusantium ratione expedita assumenda qui rem nulla debitis dolore eveniet architecto.</span>
                </div>

                <div class="critics-reviews-element-buttons">
                    <button id="validate-review" class="button button-moderate">Like</button></a>
                    <hr>
                    <a href="report-review"><button id="report-review" class="button button-moderate">Signaler</button></a>
                </div>
            </div>

            <div class="critics-reviews-element">
                <div class="user-profile">
                    <img class="profile-picture" src="/assets/images/icon-circle-man.png" alt="">
                    <span class="white-text">Username</span>
                </div>
                <div class="stars stars-3">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                    <i class="fa fa-star-o"></i>
                    <span class="white-text"><b>À couper le souffle<b></span>
                </div>
                <span class="sub-text">Commenté le 02/07/2023 à 15:56</span>
                <div class="critics-reviews-element-content">
                    <span class="white-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolorum est obcaecati earum officiis nisi veritatis a velit, officia possimus accusantium ratione expedita assumenda qui rem nulla debitis dolore eveniet architecto.</span>
                </div>

                <div class="critics-reviews-element-buttons">
                    <button id="validate-review" class="button button-moderate">Like</button></a>
                    <hr>
                    <a href="report-review"><button id="report-review" class="button button-moderate">Signaler</button></a>
                </div>
            </div>

        </div>
    </div>
</section>