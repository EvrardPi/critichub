<h2 class="align-text">Réinitialisation du mot de passe</h2>

<?php 
if (!empty($_SESSION['error_messages'])) {
    foreach ($_SESSION['error_messages'] as $error) {?>
        <div class="alert alert-danger register-alert" role="alert">
            <?php echo $error; ?>
            <br>
        </div>
<?php    }
}
?>

<h4 class="align-text white-text">Veuillez entrer le nouveau mot de passe de votre compte</h4>

<?php $this->partial("form", $resetForm); ?>