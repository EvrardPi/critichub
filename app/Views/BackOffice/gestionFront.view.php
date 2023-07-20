<div class="gestionFront">
    <h1>Gestion du front </h1>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-h1-tab" data-bs-toggle="tab" data-bs-target="#nav-h1" type="button"
            role="tab" aria-controls="nav-h1" aria-selected="true">
            H1
        </button>
        <button class="nav-link" id="nav-h2-tab" data-bs-toggle="tab" data-bs-target="#nav-h2" type="button" role="tab"
            aria-controls="nav-profile" aria-selected="false">
            H2
        </button>
        <button class="nav-link" id="nav-h3-tab" data-bs-toggle="tab" data-bs-target="#nav-h3" type="button" role="tab"
            aria-controls="nav-contact" aria-selected="false">
            H3
        </button>
        <button class="nav-link" id="nav-h4-tab" data-bs-toggle="tab" data-bs-target="#nav-h4" type="button" role="tab"
            aria-controls="nav-contact" aria-selected="false">
            H4
        </button>
        </button>
        <button class="nav-link" id="nav-h5-tab" data-bs-toggle="tab" data-bs-target="#nav-h5" type="button" role="tab"
            aria-controls="nav-contact" aria-selected="false">
            H5
        </button>
        <button class="nav-link" id="nav-h6-tab" data-bs-toggle="tab" data-bs-target="#nav-h6" type="button" role="tab"
            aria-controls="nav-contact" aria-selected="false">
            H6
        </button>
        <button class="nav-link" id="nav-text-tab" data-bs-toggle="tab" data-bs-target="#nav-text" type="button"
            role="tab" aria-controls="nav-contact" aria-selected="false">
            Texte
        </button>
        <button class="nav-link" id="nav-link-tab" data-bs-toggle="tab" data-bs-target="#nav-link" type="button"
            role="tab" aria-controls="nav-contact" aria-selected="false">
            Lien
        </button>
        <button class="nav-link" id="nav-strong-tab" data-bs-toggle="tab" data-bs-target="#nav-strong" type="button"
            role="tab" aria-controls="nav-contact" aria-selected="false">
            Strong
        </button>
        <button class="nav-link" id="nav-span-tab" data-bs-toggle="tab" data-bs-target="#nav-span" type="button"
            role="tab" aria-controls="nav-contact" aria-selected="false">
            Span
        </button>

        <button class="nav-link" id="nav-background-tab" data-bs-toggle="tab" data-bs-target="#nav-background"
            type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
            Background
        </button>

    </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-h1" role="tabpanel" aria-labelledby="nav-h1-tab" tabindex="0">
            <?php
            $createForm['inputs']['selected_tab']['value'] = 'H1';
            $this->partial("form", $createForm);
            ?>

        </div>
        <div class="tab-pane fade" id="nav-h2" role="tabpanel" aria-labelledby="nav-h2-tab" tabindex="0">
            <?php
            $createForm['inputs']['selected_tab']['value'] = 'H2';
            $this->partial("form", $createForm);
            ?>

        </div>
        <div class="tab-pane fade" id="nav-h3" role="tabpanel" aria-labelledby="nav-h3-tab" tabindex="0">
            <?php
            $createForm['inputs']['selected_tab']['value'] = 'H3';
            $this->partial("form", $createForm);
            ?>
        </div>
        <div class="tab-pane fade" id="nav-h4" role="tabpanel" aria-labelledby="nav-h4-tab" tabindex="0">
            <?php
            $createForm['inputs']['selected_tab']['value'] = 'H4';
            $this->partial("form", $createForm);
            ?>
        </div>
        <div class="tab-pane fade" id="nav-h5" role="tabpanel" aria-labelledby="nav-h5-tab" tabindex="0">
            <?php
            $createForm['inputs']['selected_tab']['value'] = 'H5';
            $this->partial("form", $createForm);
            ?>
        </div>
        <div class="tab-pane fade" id="nav-h6" role="tabpanel" aria-labelledby="nav-h6-tab" tabindex="0">
            <?php
            $createForm['inputs']['selected_tab']['value'] = 'H6';
            $this->partial("form", $createForm);
            ?>
        </div>
        <div class="tab-pane fade" id="nav-text" role="tabpanel" aria-labelledby="nav-text-tab" tabindex="0">
            <?php
            $createForm['inputs']['selected_tab']['value'] = 'Text';
            $this->partial("form", $createForm);
            ?>
        </div>
        <div class="tab-pane fade" id="nav-link" role="tabpanel" aria-labelledby="nav-link-tab" tabindex="0">
            <?php
            $createForm['inputs']['selected_tab']['value'] = 'link';
            $this->partial("form", $createForm);
            ?>
        </div>
        <div class="tab-pane fade" id="nav-strong" role="tabpanel" aria-labelledby="nav-strong-tab" tabindex="0">
            <?php
            $createForm['inputs']['selected_tab']['value'] = 'strong';
            $this->partial("form", $createForm);
            ?>
        </div>
        <div class="tab-pane fade" id="nav-span" role="tabpanel" aria-labelledby="nav-span-tab" tabindex="0">
            <?php
            $createForm['inputs']['selected_tab']['value'] = 'span';
            $this->partial("form", $createForm);
            ?>
        </div>
        <div class="tab-pane fade" id="nav-background" role="tabpanel" aria-labelledby="nav-background-tab"
            tabindex="0">
            <?php
            $createFormBackground['inputs']['selected_tab']['value'] = 'background';
            $this->partial("form", $createFormBackground);
            ?>
        </div>
    </div>


    <h2>Gestion landing page</h2>

    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-banniere-tab" data-bs-toggle="tab" data-bs-target="#nav-banniere"
            type="button" role="tab" aria-controls="nav-banniere" aria-selected="true">
            Bannière
        </button>
    </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-banniere" role="tabpanel" aria-labelledby="nav-banniere-tab"
            tabindex="0">
            <?php
            $createFormPicture['inputs']['selected_tab']['value'] = 'banner';
            $this->partial("form", $createFormPicture);
            ?>
            <img src="<?php echo $imageBanner; ?>">

        </div>
    </div>

</div>

<?php if (!empty($errors)): ?>
    <div class="errors">
        <ul>
            <?php foreach ($errors as $error): ?>
                <li>
                    <?php echo $error; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<script src="/assets/js/gestionFront/gestionFront.js"></script>