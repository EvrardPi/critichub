<section id="media-creator">

    <div class="new-admin container-75">
        <div class="inside-img">
            <!-- <h2 class="white-text">The Last of us</h2> -->
            <h2 class="white-text"><i><textarea name="new-admin-title" id="new-admin-title" cols="15" rows="1" placeholder="Title"></textarea></i></h2>
            <h4>
                <select id="media-category" name="media-category">
                    <option value="0">Category</option>
                    <option value="Horreur">Horreur</option>
                    <option value="Comédie">Comédie</option>
                    <option value="Drama">Drama</option>
                    <option value="Action">Action</option>
                </select>
            </h4>
            <h5>
                <select id="media-stars" name="media-stars">
                    <option value="0">Stars</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </h5>
        </div>
        <!-- <img class="banner-image" src="/assets/images/tlou-banner.jpg" alt=""> -->
        <div>
            <div>
                <button class="new-admin-inside-img white-text" onclick="document.getElementById('getFileBanner').click()">Image bannière</button>
                <input type="file" id="getFileBanner" class="image-input new-admin-inside-img" accept="image/*" style="display:none;">

            </div>
            <div class="banner-image image-preview-container"></div>

        </div>

        <div class="img-position">
            <button class="new-admin-prompt" onclick="document.getElementById('getFileLogo').click()">Votre logo ici</button>
            <input type="file" id="getFileLogo" class="image-input" accept="image/*" style="display:none;">
            <div class="image-preview-container new-admin-logo"></div>
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
                <button class="new-admin-prompt" onclick="document.getElementById('getFileActor1').click()">Insérer Acteur</button>
                <input type="file" id="getFileActor1" class="image-input" accept="image/*" style="display:none;">
                <div class="image-preview-container new-admin-actor"></div>
            </div>
            <div>
                <button class="new-admin-prompt" onclick="document.getElementById('getFileActor2').click()">Insérer Acteur</button>
                <input type="file" id="getFileActor2" class="image-input" accept="image/*" style="display:none;">
                <div class="image-preview-container new-admin-actor"></div>
            </div>
            <div>
                <button class="new-admin-prompt" onclick="document.getElementById('getFileActor3').click()">Insérer Acteur</button>
                <input type="file" id="getFileActor3" class="image-input" accept="image/*" style="display:none;">
                <div class="image-preview-container new-admin-actor"></div>
            </div>
            <div>
                <button class="new-admin-prompt" onclick="document.getElementById('getFileActor4').click()">Insérer Acteur</button>
                <input type="file" id="getFileActor4" class="image-input" accept="image/*" style="display:none;">
                <div class="image-preview-container new-admin-actor"></div>
            </div>
            <div>
                <button class="new-admin-prompt" onclick="document.getElementById('getFileActor5').click()">Insérer Acteur</button>
                <input type="file" id="getFileActor5" class="image-input" accept="image/*" style="display:none;">
                <div class="image-preview-container new-admin-actor"></div>
            </div>
            <div>
                <button class="new-admin-prompt" onclick="document.getElementById('getFileActor6').click()">Insérer Acteur</button>
                <input type="file" id="getFileActor6" class="image-input" accept="image/*" style="display:none;">
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