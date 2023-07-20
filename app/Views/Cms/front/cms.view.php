<div class="side-bar">
    <div class="side-bar-header">
        <div class="close-elementard">
            <span class="material-symbols-outlined">
                cancel
            </span>
            <h3>Quitter</h3>
        </div>
        <span class="material-symbols-outlined"> document_scanner </span>
        <h2>ELEMENTARD</h2>
    </div>
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                Page
            </button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                Data
            </button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                type="button" role="tab" aria-controls="nav-contact" aria-selected="false">
                API
            </button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
            tabindex="0">
            <!-- element of Page nav bar here -->
            <div class="colorDiv">
                <h2>Background color</h2>
                <input type="color" id="colorPicker" name="colorPicker" />
            </div>
            <div class="colorDiv">
                <h2>Critique Background color</h2>
                <input type="color" id="colorPickerTwo" name="colorPicker" />
            </div>
            <div class="template">
                <h2>Template</h2>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="option1" checked />
                    <label class="form-check-label" for="inlineRadio1">1</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="option2" />
                    <label class="form-check-label" for="inlineRadio2">2</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3"
                        value="option3" />
                    <label class="form-check-label" for="inlineRadio3">3</label>
                </div>
            </div>
            <div class="font-family">
                <h2>Font Family</h2>
                <select class="form-select fontFamily" id="fontSelect" aria-label="Default select example">
                    <option selected value="sans-serif">Sélectionner une font</option>
                    <option value="Montserrat">Montserrat</option>
                    <option value="Roboto">Roboto</option>
                    <option value="Playfair Display">Playfair Display</option>
                </select>
            </div>
            <h2>Sélectionner une ou plusieurs catégories de films:</h2>
            <div class="form-group">
                <div id="optionsCategories"></div>
            </div>
            <div class="colorDiv">
                <h2>Catégories Color</h2>
                <input type="color" id="colorPickerFive" name="colorPicker" />
            </div>
            <div class="colorDiv">
                <h2>Font Color</h2>
                <input type="color" id="colorPickerThree" name="colorPicker" />
            </div>
            <div class="colorDiv">
                <h2>Text Area Font Color</h2>
                <input type="color" id="colorPickerFour" name="colorPicker" />
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
            <!--  -->
            <input type="text" class="data-input" id="movie-name" placeholder="Nom du Film" disabled />
            <input type="text" class="data-input" id="movie-slogan" placeholder="Slogan de la Critique" />
            <h2 for="note">Sélectionnez une note :</h2>
            <select id="note" name="note">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <div class="editor-container">
                <div class="toolbar">
                    <button onclick="execCmd('bold')">Bold</button>
                    <button onclick="execCmd('italic')">Italic</button>
                    <button onclick="execCmd('underline')">Underline</button>
                </div>
                <div class="editor" contenteditable="true" data-placeholder="Entrez votre Critique ici..."></div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
            <div id="movieDropdown" class="dropdown">
                <input type="text" id="search" class="form-control dropdown-toggle" data-bs-toggle="dropdown"
                    placeholder="Rechercher un film..." autocomplete="off" />
                <ul id="results" class="dropdown-menu" aria-labelledby="search"></ul>
            </div>
        </div>
    </div>
</div>
<!-- type of template -->
<div class="prototype">
    <div class="protopage-1">
        <div class="top">
            <img class="img-background" src="assets/images/elementard/wireframe.jpg" alt="img-background" />
        </div>
        <div class="container">
            <div class="first-section info">
                <img class="movie-img" src="assets/images/elementard/wireframe.jpg" alt="image" />
                <div class="title">
                    <h2 class="movie-title">Nom Du Film</h2>
                    <h3 class="movie-slogan">Slogan de la Critique</h3>
                </div>
            </div>
            <div class="critique">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
                illo unde aliquid, ullam quas officiis est tenetur natus enim
                laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed
                architecto dicta nesciunt error. Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas
                officiis est tenetur natus enim laboriosam mollitia perspiciatis
                voluptatibus quaerat omnis sed architecto dicta nesciunt error.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
                illo unde aliquid, ullam quas officiis est tenetur natus enim
                laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed
                architecto dicta nesciunt error. Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas
                officiis est tenetur natus enim laboriosam mollitia perspiciatis
                voluptatibus quaerat omnis sed architecto dicta nesciunt error.
                <br />
                <br />
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
                illo unde aliquid, ullam quas officiis est tenetur natus enim
                laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed
                architecto dicta nesciunt error. Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas
                officiis est tenetur natus enim laboriosam mollitia perspiciatis
                voluptatibus quaerat omnis sed architecto dicta nesciunt error.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
                illo unde aliquid, ullam quas officiis est tenetur natus enim
                laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed
                architecto dicta nesciunt error. Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas
                officiis est tenetur natus enim laboriosam mollitia perspiciatis
                voluptatibus quaerat omnis sed architecto dicta nesciunt error.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
                illo unde aliquid, ullam quas officiis est tenetur natus enim
                laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed
                architecto dicta nesciunt error. Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Pariatur illo unde aliquid, ullam quas
                officiis est tenetur natus enim laboriosam mollitia perspiciatis
                voluptatibus quaerat omnis sed architecto dicta nesciunt error.
            </div>

            <div class="third-section">
                <div class="mini-data">
                    <h4>Date de sortie:</h4>
                    <span id="date-sortie"></span>
                    <h4>Durée du film:</h4>
                    <span id="movie-time"></span>
                    <div id="badgesContainer"></div>
                </div>
                <div class="social">
                    <div class="social-layout">
                        <span class="material-symbols-outlined icon"> favorite </span>
                        <span>Nombre de like</span>
                    </div>
                    <div class="social-layout">
                        <span class="material-symbols-outlined icon"> comment </span>
                        <span>Nombre de commentaire</span>
                    </div>
                    <div class="social-layout">
                        <div class="noteContainer">
                            <h2 class="note">4</h2>
                            <h2>/5</h2>
                        </div>
                        <span>Note du rédacteur</span>
                    </div>
                </div>
                <div class="director">
                    <h3>Realisateur:</h3>
                    <h3 class="nameOfDirector">John Doe</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="control-btn-sidebar">
    <span class="material-symbols-outlined control"> close </span>
</div>
<div class="save">
    <span class="material-symbols-outlined save-icon"> save </span>
</div>