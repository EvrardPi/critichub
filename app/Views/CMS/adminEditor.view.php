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
        <div id="actorsList" class="new-admin-actor-list container-90">
            <!-- <div class="actor-element">
                <button type="button" class="new-admin-form-input white-text button button-actor" onclick="document.getElementById('admin-cms-form-actor10').click()">Actor</button>
                <input name="actor" placeholder class="new-admin-form-input image-input new-admin-hidden actor" id="admin-cms-form-actor10" type="file" required value>
                <div class="actor-image image-preview-container new-admin-actor-preview">
                    <img class="banner-image" src="/assets/images/white-font.png" alt="">
                </div>
            </div>
            <div class="actor-element">
                <button type="button" class="new-admin-form-input white-text button button-actor" onclick="document.getElementById('admin-cms-form-actor9').click()">Actor</button>
                <input name="actor" placeholder class="new-admin-form-input image-input new-admin-hidden actor" id="admin-cms-form-actor9" type="file" required value>
                <div class="actor-image image-preview-container new-admin-actor-preview">
                    <img class="banner-image" src="/assets/images/white-font.png" alt="">
                </div>
            </div> -->
        </div>
    </div>

</div>

<script src="/assets/js/cms-preview-img.js"></script>
<script src="/assets/js/show-actors.js"></script>