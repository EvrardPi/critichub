<h1>Gestion du front </h1>


<div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button
            class="nav-link active"
            id="nav-h1-tab"
            data-bs-toggle="tab"
            data-bs-target="#nav-h1"
            type="button"
            role="tab"
            aria-controls="nav-h1"
            aria-selected="true"
    >
        H1
    </button>
    <button
            class="nav-link"
            id="nav-h2-tab"
            data-bs-toggle="tab"
            data-bs-target="#nav-h2"
            type="button"
            role="tab"
            aria-controls="nav-profile"
            aria-selected="false"
    >
        H2
    </button>
    <button
            class="nav-link"
            id="nav-h3-tab"
            data-bs-toggle="tab"
            data-bs-target="#nav-h3"
            type="button"
            role="tab"
            aria-controls="nav-contact"
            aria-selected="false"
    >
        H3
    </button>
    <button
            class="nav-link"
            id="nav-h4-tab"
            data-bs-toggle="tab"
            data-bs-target="#nav-h4"
            type="button"
            role="tab"
            aria-controls="nav-contact"
            aria-selected="false"
    >
       H4
    </button>
    </button>
    <button
            class="nav-link"
            id="nav-h5-tab"
            data-bs-toggle="tab"
            data-bs-target="#nav-h5"
            type="button"
            role="tab"
            aria-controls="nav-contact"
            aria-selected="false"
    >
        H5
    </button>
    <button
            class="nav-link"
            id="nav-h6-tab"
            data-bs-toggle="tab"
            data-bs-target="#nav-h6"
            type="button"
            role="tab"
            aria-controls="nav-contact"
            aria-selected="false"
    >
        H6
    </button>
</div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div
            class="tab-pane fade show active"
            id="nav-h1"
            role="tabpanel"
            aria-labelledby="nav-h1-tab"
            tabindex="0"
    >
        <?php $this->partial("form", $createFormH1); ?>

    </div>
    <div
            class="tab-pane fade"
            id="nav-h2"
            role="tabpanel"
            aria-labelledby="nav-h2-tab"
            tabindex="0"
    >
        <?php $this->partial("form", $createFormH2); ?>

    </div>
    <div
            class="tab-pane fade"
            id="nav-h3"
            role="tabpanel"
            aria-labelledby="nav-h3-tab"
            tabindex="0"
    >
        <?php $this->partial("form", $createFormH3); ?>
    </div>
    <div
            class="tab-pane fade"
            id="nav-h4"
            role="tabpanel"
            aria-labelledby="nav-h4-tab"
            tabindex="0"
    >
        <?php $this->partial("form", $createFormH4); ?>
    </div>
    <div
            class="tab-pane fade"
            id="nav-h5"
            role="tabpanel"
            aria-labelledby="nav-h5-tab"
            tabindex="0"
    >
    <p>H5</p>
    </div>
    <div
            class="tab-pane fade"
            id="nav-h6"
            role="tabpanel"
            aria-labelledby="nav-h6-tab"
            tabindex="0"
    >
       <p>H6</p>
    </div>
    <div
            class="tab-pane fade"
            id="nav-disabled"
            role="tabpanel"
            aria-labelledby="nav-disabled-tab"
            tabindex="0"
    >
        <!-- element of Page nav bar here -->
    </div>
</div>
</div>