<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>
        <?= $pageName ?>
    </title>
    <link rel="stylesheet" href="assets/css/elementard.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&family=Montserrat:ital@1&family=Playfair+Display&family=Roboto&display=swap" rel="stylesheet">
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

    <!-- inclure la vue -->
    <?php include $this->view; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="assets/js/elementard.js"></script>
</body>

</html>