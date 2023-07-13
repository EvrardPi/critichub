<h2 class="align-text">Mot de passe oublié ?</h2>

<?php  if (isset($_POST['emailForgot']) && empty($_SESSION['error_messages'])) { ?>
    <div class="success">Si votre adresse mail existe, un mail vous sera envoyé à cette adresse : <?= $_POST['emailForgot'] ?></div>
<?php } ?>

<?php 
if (!empty($_SESSION['error_mail_sent'])) {
    var_dump($_SESSION['error_mail_sent']);

}

if (!empty($_SESSION['error_messages'])) {
    foreach ($_SESSION['error_messages'] as $error) {?>
        <div class="alert alert-danger register-alert" role="alert">
            <?php echo $error; ?>
            <br>
        </div>
<?php    }
}
?>

<h4 class="align-text white-text">Veuillez entrer l'e-mail correspondant à votre compte</h4>

<?php $this->partial("form", $forgotForm); ?>