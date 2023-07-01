<!DOCTYPE html>
<html>

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/assets/css/side-nav-bar.css">
  <?php include("includes.tpl.php"); ?>
</head>

<body>
  <div class="side-bar">
    <div class="side-bar-header">

      <h2>Back Office</h2>
    </div>
    <div class="menu">
      <div class="item">
        <a href="#" class="active"><span class="material-symbols-outlined">Dashboard</span>

        </a>
      </div>
      <div class="item">
        <a href="#" class="sub-btn"><span class="material-symbols-outlined">Table</span>


        </a>
        <div class="sub-menu">
          <a href="#" class="sub-item">Gestion Des Utilisateurs</a>
          <a href="#" class="sub-item">Sub Titre 2</a>
          <a href="#" class="sub-item">Sub Titre 3</a>
        </div>
      </div>
      <div class="item">
        <a href="#" class="norm"><span class="material-symbols-outlined">assignment</span>

        </a>
      </div>
      <div class="item">
        <a href="#" class="sub-btn"><span class="material-symbols-outlined">Settings</span>
        </a>
        <div class="sub-menu">
          <a href="#" class="sub-item">Sub Titre 1</a>
          <a href="#" class="sub-item">Sub Titre 2</a>
        </div>
      </div>
    </div>
  </div>
  <!-- inclure la vue -->
  <?php include $this->view; ?>

  <script src="./assets/js/side-nav-bar.js"></script>
</body>

</html>