<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="/assets/css/register.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <?php include("includes.tpl.php"); ?>
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>

<body>
    <video id="backround-video" autoplay loop muted>
        <source src="/assets/images/bg.mp4" type="video/mp4" />
    </video>
    <div class="form-container">
        <div class="login-form">
            <img src="/assets/images/logo.png" alt="logo" class="form-logo" />
            <!-- inclure la vue -->
            <?php include $this->view; ?>
        </div>
    </div>
    <span id="backround-video-control" class="material-symbols-outlined">
        pause
    </span>
    <script src="./assets/js/register.js"></script>
</body>

</html>