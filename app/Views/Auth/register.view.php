<h2>S'inscrire</h2>

<?php if (isset($errorMessage)): ?>
    <div class="alert alert-danger register-alert" role="alert">
        <?php echo $errorMessage; ?>
    </div>
<?php endif; ?>

<?php $this->partial("form", $registerForm) ?>