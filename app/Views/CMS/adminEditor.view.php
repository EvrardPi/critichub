<h1 class="white-text">Création d'une review admin</h1>


<div class="new-admin-form-editor">
    <?php $this->partial("adminForm", $publishForm) ?>


    <div class="new-admin-form-preview">
        <div class="banner-image image-preview-container">
            <img class="banner-image" src="/assets/images/white-font.png" alt="">
        </div>

        <div class="img-position img-position-preview">
            <div class="image-preview-container new-admin-logo-preview">
                <img class="banner-image" src="/assets/images/white-font.png" alt="">
            </div>
        </div>

        <h2 class="white-text">Acteurs principaux</h2>
        <hr>
        <div id="actorsList" class="new-admin-actor-list container-90"></div>
    </div>

</div>

<script src="/assets/js/cms-preview-img.js"></script>
<script src="/assets/js/show-actors.js"></script>