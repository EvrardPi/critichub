<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title><?= $pageName ?></title>
  <meta name="description" content="ceci est un super site">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/Views/Modules/datatables.css" />
  <script src="/Views/Modules/datatables.js"></script>
  
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../Components/dist/main.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="../../Components/fontawesome/css/fontawesome.css" rel="stylesheet">
  <link href="../../Components/fontawesome/css/brands.css" rel="stylesheet">
  <link href="../../Components/fontawesome/css/solid.css" rel="stylesheet">   
</head>

<body>
    <main>
        <header id="navbar">
            <nav class="header">
                <div class="logo">
                    <img src="../../Components/src/images/logo.svg" alt="logo">
                    <a href="/"><h1 class="logo-title">Critic<span class="red-text">Hub</span></h1></a>
                </div>


        <!-- inclure la vue -->
        <?php include $this->view; ?>


        <footer>
            <div class="footer footer-logo">
                <img src="../../Components/src/images/logo.svg" alt="">
                <h2 class="logo-title">Critic<span class="red-text">Hub</span></h2>
            </div>

            <div class="footer footer-categories">

                <div class="footer footer-category">
                    <h2 class="white-text">FILMS</h2>
                    <a href="#" class="white-text">Derniers films ajoutés</a>
                    <a href="#" class="white-text">Dernier article posté : Est-ce que ce ratio va vous plaire ?</a>
                    <a href="#" class="white-text">Actualités films</a>
                </div>

                <div class="footer footer-category">
                    <h2 class="white-text">SÉRIES</h2>
                    <a href="#" class="white-text">Derniers films ajoutés</a>
                    <a href="#" class="white-text">Dernier article posté : Est-ce que ce ratio va vous plaire ?</a>
                    <a href="#" class="white-text">Actualités films</a>
                </div>

                <div class="footer footer-category">
                    <h2 class="white-text">ANIMÉS</h2>
                    <a href="#" class="white-text">Derniers films ajoutés</a>
                    <a href="#" class="white-text">Dernier article posté : Est-ce que ce ratio va vous plaire ?</a>
                    <a href="#" class="white-text">Actualités films</a>
                </div>

                <div class="footer footer-category">
                    <h2 class="white-text">JEUX-VIDÉOS</h2>
                    <a href="#" class="white-text">Derniers films ajoutés</a>
                    <a href="#" class="white-text">Dernier article posté : Est-ce que ce ratio va vous plaire ?</a>
                    <a href="#" class="white-text">Actualités films</a>
                </div>

                <div class="footer footer-category">
                    <h2 class="white-text">CATÉGORIES</h2>
                    <a href="#" class="white-text">Derniers films ajoutés</a>
                    <a href="#" class="white-text">Dernier article posté : Est-ce que ce ratio va vous plaire ?</a>
                    <a href="#" class="white-text">Actualités films</a>
                </div>

                <div class="footer footer-category">
                    <h2 class="white-text">À PROPOS</h2>
                    <a href="#" class="white-text">Derniers films ajoutés</a>
                    <a href="#" class="white-text">Dernier article posté : Est-ce que ce ratio va vous plaire ?</a>
                    <a href="#" class="white-text">Actualités films</a>
                </div>

                <div class="footer footer-category">
                    <h2 class="white-text">RÉSEAUX</h2>
                    <a href="#" class="white-text">Derniers films ajoutés</a>
                    <a href="#" class="white-text">Dernier article posté : Est-ce que ce ratio va vous plaire ?</a>
                    <a href="#" class="white-text">Actualités films</a>
                </div>

            </div>
        </footer>
    </main>
</body>

</html>