<section id="banner-image">
    <div class="home-image-banner">
        <img class="home-image-banner-width" src="<?php echo $imageBanner; ?>" alt="Image de décor">
    </div>

    <div class="home-spacing"></div>

    <div class="home-slogan">
        <h1 class="white-text home-slogan-text">Vos Critiques ont une histoire</h1>
    </div>
</section>

<section id="popular-movies">
    <div class="popular-movies container-90">
        <h2 class="popular-movies-title white-text">Dernières Critiques</h2>

        <div class="popular-movies-list">

            <!-- <a href="/media?id=1">
                <div class="popular-movies-element">
                    <img class="movie-img" src="/assets/images/tlou-front-pic.png" alt="Image du film">
                    <h3 class="movie-title">The Last Of Us</h3>
                </div>
            </a> -->
            <a href="/media?id=2">
                <div class="popular-movies-element">
                    <img class="movie-img" src="/assets/images/tlou-front-pic.png" alt="Image du film">
                    <h3 class="movie-title">The Last Of Us</h3>
                </div>
            </a>
            <a href="/media?id=3">
                <div class="popular-movies-element">
                    <img class="movie-img" src="/assets/images/tlou-front-pic.png" alt="Image du film">
                    <h3 class="movie-title">The Last Of Us</h3>
                </div>
            </a>
        </div>
    </div>
    </div>

</section>


<section id="events">
    <div class="event">
        <div class="event-banner">
            <h3 class="white-text">Liste des médias</h3>
            <small class="light-gray-text">Vous cherchez un film en particulier ? C'est ici que ça se passe !</small>

            <button class="button button-event">Accéder à la liste</button>
        </div>
        <img class="" src="<?php echo $imageMedia; ?>" alt="Image de décor">
    </div>

</section>

<script type="module" src="/assets/js/gestionFront/applyFront.js"></script>
<script type="module" src="/assets/js/home.js"></script>