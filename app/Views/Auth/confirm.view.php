<h2>Confirmation de compte</h2>

<?php foreach ($_SESSION['error_messages'] as $error) { ?>
<div class="alert alert-danger register-alert" role="alert">
    <?php echo $error; ?>
    <br>
</div>
<?php
}

?>