<h2>Se connecter</h2>

<?php foreach ($_SESSION['error_messages'] as $error) { ?>
<div class="alert alert-danger register-alert" role="alert">
    <?php echo $error; ?>
    <br>
</div>
<?php
}

// $this->partial("form", $form, $formErrors);
// $this->partial("form", $form);
$this->partial("form", $loginForm);
?>