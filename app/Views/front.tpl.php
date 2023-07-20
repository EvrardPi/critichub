<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&family=Montserrat:ital@1&family=Playfair+Display&family=Roboto&display=swap"
        rel="stylesheet">
    <?php include("includes.tpl.php"); ?>
</head>

<body>
    <main>
        <div id="up-page"></div>
        <header id="navbar">
            <nav class="header">
                <div class="logo">
                    <a href="/">
                        <img src="/assets/images/logo.png" alt="logo">
                    </a>
                </div>
                <div class="list-of-medias">
                    <a href="#">Accueil</a>
                    <a href="#">Catégorie</a>
                    <a href="#">Reviews</a>
                </div>

                <div class="menu-nav">
                    <?php if (isset($_SESSION['isAuth']) && $_SESSION['isAuth'] === true): ?>
                        <li><a href="#" class="white-text button button-register">Mon compte</a></li>
                        <li><a href="logout" class="white-text button button-login">Déconnexion</a></li>
                    <?php else: ?>
                        <li><a href="/register" class="button button-register">Inscription</a></li>
                        <li class="login"><a href="/login" class="button button-login">Connexion</a></li>
                    <?php endif; ?>
                    </li>
                </div>
            </nav>
        </header>

        <!-- inclure la vue -->
        <?php include $this->view; ?>


        <footer class="footer">
            <div class="waves">
                <div class="wave" id="wave1"></div>
                <div class="wave" id="wave2"></div>
                <div class="wave" id="wave3"></div>
                <div class="wave" id="wave4"></div>
            </div>
            <div class="footer footer-name">
                <p class="logo-title">Critic<span class="red-text">Hub</span></p>
            </div>
            <ul class="social-icon">
                <li class="social-icon__item"><a class="social-icon__link" href="https://facebook.com">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="https://twitter.com">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="https://linkedin.com">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="https://instagram.com">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="https://github.com">
                        <ion-icon name="logo-github"></ion-icon>
                    </a></li>
                <li class="social-icon__item"><a class="social-icon__link" href="https://gitlab.com">
                        <ion-icon name="logo-gitlab"></ion-icon>
                    </a></li>
            </ul>
            <ul class="menu">
                <li class="menu__item"><a class="menu__link" href="#up-page">Haut de page</a></li>
                <li class="menu__item"><span class="white-text">•</span></li>
                <li class="menu__item"><a class="menu__link" href="/">Accueil</a></li>
                <li class="menu__item"><span class="white-text">•</span></li>
                <li class="menu__item"><a class="menu__link" href="/legals">Mentions légales</a></li>
                <li class="menu__item"><span class="white-text">•</span></li>
                <li class="menu__item"><a class="menu__link" href="/confidentiality">Politique de confidentialité</a>
                </li>
                <li class="menu__item"><span class="white-text">•</span></li>
                <li class="menu__item"><a class="menu__link" href="/sitemap">Sitemap</a></li>

            </ul>
        </footer>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </main>
</body>

</html>