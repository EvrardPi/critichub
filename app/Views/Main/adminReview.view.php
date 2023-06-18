<section id="media-creator">

    <div class="new-admin container-75">
        <div class="inside-img">
            <!-- <h2 class="white-text">The Last of us</h2> -->
            <h2 class="white-text"><i><textarea name="new-admin-title" id="new-admin-title" cols="12" rows="1" placeholder="Title"></textarea></i></h2>
            <h4 class="white-text"><i><textarea name="new-admin-categories" id="new-admin-categories" cols="15" rows="1" placeholder="Categories"></textarea></i></h4>
            <!-- <span class="white-text">&#9733;</span>
            <span class="white-text">&#9733;</span>
            <span class="white-text">&#9733;</span>
            <span class="white-text">&#9733;</span>
            <span class="white-text">☆</span>
            <span class="white-text">4.0</span> -->
            <textarea name="new-admin-stars" id="new-admin-stars" cols="15" rows="1" placeholder="Number of stars"></textarea>
        </div>
        <!-- <img class="banner-image" src="/assets/images/tlou-banner.jpg" alt=""> -->
        <div>
            <div>
                <button class="new-admin-inside-img" onclick="document.getElementById('getFile').click()">Image bannière</button>
                <input type='file' id="getFile" style="display:none;">
            </div>
            <img class="banner-image" src="assets/images/white-font.png" alt="">
        </div>

        <div class="img-position">
            <button class="new-admin-prompt" onclick="document.getElementById('getFile').click()">Votre logo ici</button>
            <input type='file' id="getFile" style="display:none;">
            <!-- <input type="file" class="new-admin-logo" src="" alt="Logo"> -->
            <!-- <img class="banner-logo" src="/assets/images/the-last-of-us-firefly.svg" alt="logo-game"> -->
        </div>
    </div>



</section>

<section id="movie-description">

    <div class="new-admin description container-50">
        <span class="white-text description-title"><i><strong><u><textarea name="new-admin-slogan" id="new-admin-slogan" cols="30" rows="1" placeholder="Slogan"></textarea></u></strong></i></span>
        <span class="white-text description-subtext"><textarea name="new-admin-description" id="new-admin-description" cols="60" rows="10" placeholder="Description"></textarea></span>
    </div>

</section>

<section id="main-actors">
    <div class="main-actors container-50">
        <h2 class="white-text">Acteurs principaux</h2>
    </div>

    <div class="actors container-90">
        <div class="horizontal-line horizontal-line-movies">
                <div>
                    <button class="new-admin-prompt" onclick="document.getElementById('getFile').click()">Image Acteur</button>
                    <input type='file' id="getFile" style="display:none;">
                </div>
                <div>
                    <button class="new-admin-prompt" onclick="document.getElementById('getFile').click()">Image Acteur</button>
                    <input type='file' id="getFile" style="display:none;">
                </div>
                <div>
                    <button class="new-admin-prompt" onclick="document.getElementById('getFile').click()">Image Acteur</button>
                    <input type='file' id="getFile" style="display:none;">
                </div>
                <div>
                    <button class="new-admin-prompt" onclick="document.getElementById('getFile').click()">Image Acteur</button>
                    <input type='file' id="getFile" style="display:none;">
                </div>
                <div>
                    <button class="new-admin-prompt" onclick="document.getElementById('getFile').click()">Image Acteur</button>
                    <input type='file' id="getFile" style="display:none;">
                </div>  
                <div>
                    <button class="new-admin-prompt" onclick="document.getElementById('getFile').click()">Image Acteur</button>
                    <input type='file' id="getFile" style="display:none;">
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