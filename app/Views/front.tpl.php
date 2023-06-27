<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/assets/css/main.css">
    <?php include("includes.tpl.php"); ?>
</head>

<body>
    <main>
        <header id="navbar">
            <nav class="header">
                <div class="logo">
                    <img src="/assets/images/logo.svg" alt="logo">
                    <a href="/">
                        <h1 class="logo-title">Critic<span class="red-text">Hub</span></h1>
                    </a>
                </div>

                <ul class="list-of-medias">
                    <li><a href="#" class="white-text">MOVIES</a></li>
                    <li><a href="#" class="white-text">SERIES</a></li>
                    <li><a href="#" class="white-text">TV</a></li>
                    <li><a href="#" class="white-text">CARTOON</a></li>
                </ul>

                <ul class="menu-nav">
                    <?php if (isset($_SESSION['isAuth']) && $_SESSION['isAuth'] === true) : ?>
                        <li><a href="#" class="white-text button button-register">Mon compte</a></li>
                        <li><a href="logout" class="white-text button button-login">Déconnexion</a></li>

                    <?php else : ?>

                        <li><a href="/register" class="button button-register">Inscription</a></li>
                        <li class="login"><a href="/login" class="button button-login">Connexion</a></li>
                    <?php endif; ?>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- inclure la vue -->
        <?php include $this->view; ?>


        <footer>
            <div class="footer footer-logo">
                <img src="/assets/images/logo.svg" alt="">
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