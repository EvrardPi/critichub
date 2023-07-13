<?php

namespace App;
use App\Models\User;
use App\Controllers\Error;

$error = new Error();

if (!isset($_SESSION['isAuth'])) {
  $error->error404();
  exit;
}

$userLoggedIn = new User();
$userStatus = $userLoggedIn->getUserInfo(['email' => $_SESSION['email']]);

if($userStatus['role'] != 1) {
  $error->error404();
  exit;
}


?>
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
        <a class="active sub-btn"><span class="material-symbols-outlined">Gestion BackOffice</span></a>
        <div class="sub-menu">
          <a href="view" class="sub-item">Utilisateurs</a>
          <a href="category" class="sub-item">Catégories</a>
          <a href="media-list" class="sub-item">Médias</a>
        </div>
      </div>
    </div>
  </div>
  <!-- inclure la vue -->
  <?php include $this->view; ?>

  <script src="./assets/js/side-nav-bar.js"></script>
</body>

</html>