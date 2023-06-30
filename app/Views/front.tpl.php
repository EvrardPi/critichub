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
            <div class="footer footer-parameters">
                <div class="footer-left-content">

                    <div class="footer footer-name">
                        <h2 class="logo-title">Critic<span class="red-text">Hub</span></h2>
                    </div>

                    <h5>
                        CriticHub est un site internet dynamique dédié aux critiques où les passionnés de cinéma peuvent partager leurs opinions.
                    </h5>

                    <div class="footer-icons">
                    <a href="https://twitter.com" ><i class="fa fa-twitter"></i></a>
                    <a href="https://instagram.com" ><i class="fa fa-instagram"></i></a>
                    <a href="https://facebook.com" ><i class="fa fa-facebook"></i></a>
                    <a href="https://youtube.com" ><i class="fa fa-youtube"></i></a>
                    <a href="https://wordpress.com" ><i class="fa fa-wordpress"></i></a>
                    </div>

                    <div class="footer footer-follow">
                        <span>Suivez notre avancée sur</span>
                        <div class="footer footer-follow-icons">
                            <a href="https://github.com" ><i class="fa fa-github"> Github</i></a>
                            <a href="https://gitlab.com" ><i class="fa fa-gitlab"> Gitlab</i></a>
                        </div>
                    </div>
                </div>

                <div class="footer footer-categories">
                    <div class="footer footer-category">
                        <span class="white-text ">Services</span>
                        <a href="#" >Fonctionnalités </a>
                        <a href="#" >Support Client</a>
                        <a href="#" >F.A.Q Produit</a>
                        <a href="#" >Notre CMS </a>
                        <a href="#" >Suggestions</a>
                    </div>

                    <div class="footer footer-category">
                        <span class="white-text ">
                            Sécurité du CMS
                        </span>
                        <a href="#" >Conseils de sécurité </a>
                        <a href="#" >Mises à jour de sécurité</a>
                        <a href="#" >Politique d'utilisation</a>
                        <a href="#" >Rapports de vulnérabilités </a>
                        <a href="#" >Protection des données</a>
                    </div>

                    <div class="footer footer-category">
                        <span class="white-text ">
                            À propos de nous
                        </span>
                        <a href="#" >Qui sommes nous</a>
                        <a href="#" >Notre Clientèle</a>
                        <a href="#" >Nos carrières</a>
                        <a href="#" >Nous contacter</a>
                        <a href="#" >Knowledge base</a>
                    </div>

                    <div class="footer footer-category">
                        <span class="white-text ">
                            Ressources
                        </span>
                        <a href="#" >Politique de confidentialité </a>
                        <a href="#" >Mentions Légales</a>
                        <a href="#" >Conditions d'utlisations</a>
                        <a href="#" >F.A.Q</a>
                        <a href="#" >Nos Partenaires</a>
                    </div>
                </div>

            </div>
        </footer>
    </main>
</body>

</html>