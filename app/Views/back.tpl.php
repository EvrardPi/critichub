<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Super site</title>
  <meta name="description" content="ceci est un super site">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"
    integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/assets/Modules/datatables.css" />
  <script src="/assets/Modules/datatables.js"></script>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/side-nav-bar.css">
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
  
  <script src="./assets/js/side-nav-bar.js"></script>
</body>

</html>