<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Super site</title>
  <meta name="description" content="ceci est un super site">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/Views/Modules/datatables.css" />
  <script src="/Views/Modules/datatables.js"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      min-height: 100vh;
      background-color: rgb(226, 226, 226);
      font-family: "Montserrat", sans-serif;
      display: flex;
      justify-content: flex-start;
      align-items: center;
    }

    .material-symbols-outlined {
      font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 48;
    }

    .side-bar {
      background-color: rgb(44, 44, 44);
      backdrop-filter: blur(15px);
      width: 200px;
      height: 100vh;
      overflow-y: auto;
    }

    .side-bar .side-bar-header {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 20px 0;
      color: white;
    }

    .side-bar .side-bar-header span {
      margin-right: 5px;
      font-size: 30px;
    }

    .side-bar .side-bar-header h2 {
      font-size: 20px;
    }

    .side-bar .menu {
      width: 100%;
    }

    .side-bar .menu .item {
      position: relative;
      cursor: pointer;
    }

    .side-bar .menu .item a {
      color: white;
      font-size: 15px;
      text-decoration: none;
      display: block;
      padding: 20px 30px;
      display: flex;
      justify-content: flex-start;
      align-items: center;
      transition: background-color 0.3s ease;
    }

    .side-bar .menu .item a:hover {
      background-color: royalblue;
      transition: background-color 0.3s ease;
    }

    .side-bar .menu .item a span {
      margin-right: 5px;
      font-size: 20px;
    }

    .side-bar .menu .item a .drop {
      position: absolute;
      right: 0;
      transition: transform 0.3s ease;
    }

    .side-bar .menu .item .sub-menu {
      background-color: rgb(151, 151, 151);
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease;
    }

    .side-bar .menu .item .sub-menu a {
      justify-content: center;
      font-size: 15px;
      padding: 20px 30px;
    }

    .side-bar .rotate {
      transform: rotate(90deg);
    }

    .side-bar .active {
      background-color: royalblue;
    }

    .layout-type-1 {
      height: 100vh;
      width: calc(100% - 200px);
      padding-left: 10px;
    }

    .layout-type-1 .layout-superieur {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      margin: 5px;
      padding: 5px;
    }

    .layout-type-1 .layout-superieur .cadre {
      width: 300px;
      height: 200px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .layout-type-1 .layout-inferieur {
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      margin: 5px;
      padding: 5px;
    }

    .layout-type-1 .layout-inferieur .cadre {
      width: 500px;
      height: 350px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .cadre {
      margin: 0px 20px;
      border-radius: 12px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
      background-color: azure;
      padding: 1rem;
      text-align: center;
    }

    #generateButton {
      position: absolute;
    }
  </style>
</head>

<body>
  <div class="side-bar">
    <div class="side-bar-header">
      <span class="material-symbols-outlined"> token </span>
      <h2>Back Office</h2>
    </div>
    <div class="menu">
      <div class="item">
        <a href="#" class="active"><span class="material-symbols-outlined">dashboard</span>
          Dashboard
        </a>
      </div>
      <div class="item">
        <a href="#" class="sub-btn"><span class="material-symbols-outlined">table</span>
          Table
          <span class="material-symbols-outlined drop">navigate_next</span>
        </a>
        <div class="sub-menu">
          <a href="#" class="sub-item">Gestion Des Utilisateurs</a>
          <a href="#" class="sub-item">Sub Titre 2</a>
          <a href="#" class="sub-item">Sub Titre 3</a>
        </div>
      </div>
      <div class="item">
        <a href="#" class="norm"><span class="material-symbols-outlined">assignment</span>
          Formulaire
        </a>
      </div>
      <div class="item">
        <a href="#" class="sub-btn"><span class="material-symbols-outlined">Settings</span>
          Paramètres
          <span class="material-symbols-outlined drop">navigate_next</span>
        </a>
        <div class="sub-menu">
          <a href="#" class="sub-item">Sub Titre 1</a>
          <a href="#" class="sub-item">Sub Titre 2</a>
        </div>
      </div>
    </div>
  </div>
  <!-- inclure la vue -->
  <?php include $this->view;?>
  
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      function verticalSlider() {
        function closeOpenSubMenus() {
          let openSubMenus = document.querySelectorAll(
            '.sub-menu:not([style*="max-height: 0"])'
          );
          openSubMenus.forEach(function (menu) {
            menu.style.maxHeight = "0px";
            menu.previousElementSibling
              .querySelector(".drop")
              .classList.remove("rotate");
          });
        }

        function verticalMenuAnimation() {
          let menuBtn = document.querySelectorAll(".sub-btn");
          menuBtn.forEach(function (btn) {
            btn.addEventListener("click", function () {
              let subMenu = this.nextElementSibling;
              let isHidden = window.getComputedStyle(subMenu).maxHeight === "0px";
              let leftArrow = this.querySelector(".drop");
              closeOpenSubMenus();
              if (isHidden) {
                subMenu.style.maxHeight = subMenu.scrollHeight + "px";
                leftArrow.classList.add("rotate");
              } else {
                subMenu.style.maxHeight = "0px";
                leftArrow.classList.remove("rotate");
              }
            });
          });
        }

        function activeClasse() {
          let selectedMenu = document.querySelectorAll(".item a:not(.sub-btn)");

          selectedMenu.forEach((item) => {
            item.addEventListener("click", function () {
              // Supprimer la classe "active" de tous les éléments
              selectedMenu.forEach((otherItem) => {
                otherItem.classList.remove("active");
              });

              // Ajouter la classe "active" à l'élément cliqué
              item.classList.add("active");
            });
          });
        }

        function closeSubMenusOnClick() {
          let menuItems = document.querySelectorAll(".item a:not(.sub-item)");
          menuItems.forEach(function (item) {
            item.addEventListener("click", function () {
              closeOpenSubMenus();
            });
          });
        }

        closeSubMenusOnClick();
        verticalMenuAnimation();
        activeClasse();
      }

      verticalSlider();
    });

  </script>
</body>

</html>