<?php

namespace App;
use App\Models\User;
use App\Middlewares\Error;

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
    <script src="https://www.gstatic.com/charts/loader.js"></script>
  <link rel="stylesheet" href="/assets/css/side-nav-bar.css">
  <link rel="stylesheet" href="/assets/css/dashboard.css">
  <link rel="stylesheet" href="/assets/css/gestionFront.css">
  <link rel="stylesheet" href="/assets/css/mediaBack.css">
  <link rel="stylesheet" href="/assets/css/userGestion.css">
  <?php include("includes.tpl.php"); ?>
    <meta name="description" content="Découvrez les meilleures critiques de films sur Critichub. Consultez les avis des utilisateurs et partagez vos propres critiques. Rejoignez la communauté cinéphile dès maintenant.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="critiques de films, avis, cinéphile, critiques en ligne, films, cinéma">
    <meta name="author" content="CriticHub">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="Critichub - Votre plateforme de critiques de films en ligne">
    <meta property="og:description" content="Découvrez les meilleures critiques de films sur Critichub. Consultez les avis des utilisateurs et partagez vos propres critiques. Rejoignez la communauté cinéphile dès maintenant.">
    <meta property="og:image" content="https://www.votresite.com/assets/images/logo.svg">
    <meta property="og:url" content="https://critichub.fr">
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