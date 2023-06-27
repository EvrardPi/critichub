<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Elementard</title>
    <link rel="stylesheet" href="/assets/css/userReview.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@500&family=Roboto&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div class="side-bar">
        <div class="side-bar-header">
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
                    Contact
                </button>
                <button class="nav-link" id="nav-disabled-tab" data-bs-toggle="tab" data-bs-target="#nav-disabled"
                    type="button" role="tab" aria-controls="nav-disabled" aria-selected="false" disabled>
                    Disabled
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
                            value="option3" disabled />
                        <label class="form-check-label" for="inlineRadio3">3 (disabled)</label>
                    </div>
                </div>
                <div class="font-family">
                    <h2>Font Family</h2>
                    <select class="form-select" id="fontSelect" aria-label="Default select example">
                        <option selected value="">Sélectionner une font</option>
                        <option value="Montserrat">Montserrat</option>
                        <option value="Roboto">Roboto</option>
                        <option value="Playfair Display">Playfair Display</option>
                    </select>
                </div>
                <div class="colorDiv">
                    <h2>Font color</h2>
                    <input type="color" id="colorPickerThree" name="colorPicker" />
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                <!--  -->
                <input type="text" class="data-input" id="movie-name" placeholder="Nom du Film" />
                <input type="text" class="data-input" id="movie-slogan" placeholder="Slogan du film" />
                <input type="text" class="data-input" id="title-critique" placeholder="Titre de ma critique" />
                <div class="img-input">
                    <h2>Affiche du film</h2>
                    <input type="file" id="afficheUpload" accept="image/*">
                </div>
                <div class="img-input">
                    <h2>Bannière du film</h2>
                    <input type="file" id="topImageUpload" accept="image/*">
                </div>
                <div class="editor-container">
                    <div class="toolbar">
                        <button onclick="execCmd('bold')">Bold</button>
                        <button onclick="execCmd('italic')">Italic</button>
                        <button onclick="execCmd('underline')">Underline</button>
                        <button onclick="execCmd('insertOrderedList')">
                            Numbered List
                        </button>
                        <button onclick="execCmd('insertUnorderedList')">
                            Bullet List
                        </button>
                    </div>
                    <div class="editor" contenteditable="true" data-placeholder="Entrez votre Critique ici..."></div>
                </div>
                <button id="test">click</button>
            </div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
                ...
            </div>
            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab"
                tabindex="0">
                ...
            </div>
        </div>
    </div>
    <!-- type of template -->
    <div class="prototype">
        <div class="protopage-1">
            <div class="top">
                <img class="img-background" src="image.jpg" alt="" srcset="" />
            </div>
            <div class="container">
                <div class="first-section info">
                    <img src="image.jpg" alt="" />
                    <div class="title">
                        <h2>Nom Du Film</h2>
                        <h3>Slogan du film</h3>
                    </div>
                </div>
                <div class="second-section">
                    <h1>Titre de ma critique</h1>
                    <div class="critique">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
                        illo unde aliquid, ullam quas officiis est tenetur natus enim
                        laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed
                        architecto dicta nesciunt error. Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Pariatur illo unde aliquid, ullam
                        quas officiis est tenetur natus enim laboriosam mollitia
                        perspiciatis voluptatibus quaerat omnis sed architecto dicta
                        nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur
                        natus enim laboriosam mollitia perspiciatis voluptatibus quaerat
                        omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Pariatur illo unde aliquid,
                        ullam quas officiis est tenetur natus enim laboriosam mollitia
                        perspiciatis voluptatibus quaerat omnis sed architecto dicta
                        nesciunt error.
                        <br />
                        <br />
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
                        illo unde aliquid, ullam quas officiis est tenetur natus enim
                        laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed
                        architecto dicta nesciunt error. Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Pariatur illo unde aliquid, ullam
                        quas officiis est tenetur natus enim laboriosam mollitia
                        perspiciatis voluptatibus quaerat omnis sed architecto dicta
                        nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur
                        natus enim laboriosam mollitia perspiciatis voluptatibus quaerat
                        omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Pariatur illo unde aliquid,
                        ullam quas officiis est tenetur natus enim laboriosam mollitia
                        perspiciatis voluptatibus quaerat omnis sed architecto dicta
                        nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur
                        natus enim laboriosam mollitia perspiciatis voluptatibus quaerat
                        omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit
                        amet consectetur adipisicing elit. Pariatur illo unde aliquid,
                        ullam quas officiis est tenetur natus enim laboriosam mollitia
                        perspiciatis voluptatibus quaerat omnis sed architecto dicta
                        nesciunt error.
                    </div>
                </div>
                <div class="third-section info">
                    <div class="user">
                        <span class="material-symbols-outlined icon">
                            account_circle
                        </span>
                        <h3>Écrit par:</h3>
                        <h2>Nom de l'utilisateur</h2>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="protopage-2">
        <div class="top">
          <img class="img-background" src="image.jpg" alt="" srcset="" />
        </div>
        <div class="container">
          <div class="first-section info">
            <img src="image.jpg" alt="" />
            <div class="title">
              <h2>Nom Du Film</h2>
              <h3>Slogan du film</h3>
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
            </div>
            <div class="user">
              <h3>Écrit par:</h3>
              <h2>Nom de l'utilisateur</h2>
              <span class="material-symbols-outlined icon"> account_circle </span>
            </div>
          </div>
          <div class="second-section">
            <h1>Titre de ma critique</h1>
            <div class="critique">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
              illo unde aliquid, ullam quas officiis est tenetur natus enim
              laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed
              architecto dicta nesciunt error. Lorem ipsum dolor sit amet
              consectetur adipisicing elit. Pariatur illo unde aliquid, ullam
              quas officiis est tenetur natus enim laboriosam mollitia
              perspiciatis voluptatibus quaerat omnis sed architecto dicta
              nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing
              elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur
              natus enim laboriosam mollitia perspiciatis voluptatibus quaerat
              omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit
              amet consectetur adipisicing elit. Pariatur illo unde aliquid,
              ullam quas officiis est tenetur natus enim laboriosam mollitia
              perspiciatis voluptatibus quaerat omnis sed architecto dicta
              nesciunt error.
              <br />
              <br />
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
              illo unde aliquid, ullam quas officiis est tenetur natus enim
              laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed
              architecto dicta nesciunt error. Lorem ipsum dolor sit amet
              consectetur adipisicing elit. Pariatur illo unde aliquid, ullam
              quas officiis est tenetur natus enim laboriosam mollitia
              perspiciatis voluptatibus quaerat omnis sed architecto dicta
              nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing
              elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur
              natus enim laboriosam mollitia perspiciatis voluptatibus quaerat
              omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit
              amet consectetur adipisicing elit. Pariatur illo unde aliquid,
              ullam quas officiis est tenetur natus enim laboriosam mollitia
              perspiciatis voluptatibus quaerat omnis sed architecto dicta
              nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing
              elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur
              natus enim laboriosam mollitia perspiciatis voluptatibus quaerat
              omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit
              amet consectetur adipisicing elit. Pariatur illo unde aliquid,
              ullam quas officiis est tenetur natus enim laboriosam mollitia
              perspiciatis voluptatibus quaerat omnis sed architecto dicta
              nesciunt error.
              <br />
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur
              illo unde aliquid, ullam quas officiis est tenetur natus enim
              laboriosam mollitia perspiciatis voluptatibus quaerat omnis sed
              architecto dicta nesciunt error. Lorem ipsum dolor sit amet
              consectetur adipisicing elit. Pariatur illo unde aliquid, ullam
              quas officiis est tenetur natus enim laboriosam mollitia
              perspiciatis voluptatibus quaerat omnis sed architecto dicta
              nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing
              elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur
              natus enim laboriosam mollitia perspiciatis voluptatibus quaerat
              omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit
              amet consectetur adipisicing elit. Pariatur illo unde aliquid,
              ullam quas officiis est tenetur natus enim laboriosam mollitia
              perspiciatis voluptatibus quaerat omnis sed architecto dicta
              nesciunt error. Lorem ipsum dolor sit amet consectetur adipisicing
              elit. Pariatur illo unde aliquid, ullam quas officiis est tenetur
              natus enim laboriosam mollitia perspiciatis voluptatibus quaerat
              omnis sed architecto dicta nesciunt error. Lorem ipsum dolor sit
              amet consectetur adipisicing elit. Pariatur illo unde aliquid,
              ullam quas officiis est tenetur natus enim laboriosam mollitia
              perspiciatis voluptatibus quaerat omnis sed architecto dicta
              nesciunt error.
            </p>
          </div>
        </div> -->
    </div>
    </div>
    </div>
    <div class="control-btn-sidebar">
        <span class="material-symbols-outlined control"> close </span>
    </div>
    <div class="save">
        <span class="material-symbols-outlined save-icon"> save </span>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="./assets/js/userReview.js"></script>
</body>

</html>

<!-- <div class="toolbar">
          <button onclick="execCmd('bold')">Bold</button>
          <button onclick="execCmd('italic')">Italic</button>
          <button onclick="execCmd('underline')">Underline</button>
          <button onclick="execCmd('insertOrderedList')">Numbered List</button>
          <button onclick="execCmd('insertUnorderedList')">Bullet List</button>
          <button onclick="execCmd('justifyLeft')">Align Left</button>
          <button onclick="execCmd('justifyCenter')">Align Center</button>
          <button onclick="execCmd('justifyRight')">Align Right</button>
          <button onclick="insertLineBreak()">Insert Line Break</button>
        </div>
        <div class="editor" contenteditable="true"></div> -->