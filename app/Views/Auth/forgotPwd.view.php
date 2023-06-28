<h2 class="align-text">Mot de passe oublié ?</h2>

<?php  if (isset($_POST['email']) && empty($_SESSION['error_messages'])) { ?>
    <div class="success">Un email de confirmation vous a été envoyé. Veuillez regarder votre boite mail</div>
<?php } ?>

<h4 class="align-text white-text">Veuillez entrer l'e-mail correspondant à votre compte</h4>

<?php $this->partial("form", $forgotForm); ?>