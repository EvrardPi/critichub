<?php 
namespace App\Views\Partials;

use App\Helper;
$action = "";


if (isset($_POST['submit'])) {
    $countImagesSucceded = 0;
    
    foreach ($_FILES as $inputName => $file) {
    
        //Définition des variables d'input
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];
        $allowed = array('png');

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                if ($fileSize > 1000000) {
                    $errors[] = "Votre fichier doit être inférieur à 2Mo !";
                }
            } else {
                $errors[] = "Il y'a eu un soucis avec l'upload de votre fichier";
            }
        } else {
            $errors[] = "Seuls les fichiers PNG sont autorisés !";
        }
    }

    if (empty($errors)) {
        // header("Location: /admin-preview");
        // exit();
        // $action = "/admin-preview";
    }
}

?>

<form method="<?= $config["config"]["method"] ?>"
      action="<?= $action ?>"
      enctype="<?= $config["config"]["enctype"] ?>"
      id="<?= $config["config"]["id"] ?>"
      class="<?= $config["config"]["class"] ?>">

      <input type="hidden" name="csrf_token" value="<?= Helper::generateCSRFToken() ?>">

      <?php if (!empty($errors)): ?>
        <ul class=" button button-review error-list">
            <?php foreach ($errors as $error): ?>
                <li><?= $error ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php foreach ($config["inputs"] as $name => $configInput): ?>
        <?php if ($configInput["type"] !== "select"): ?>
            <input name="<?= $name ?>"
                   placeholder="<?= $configInput["placeholder"] ?>"
                   class="<?= $configInput["class"] ?>"
                   id="<?= $configInput["id"] ?>"
                   type="<?= $configInput["type"] ?>"
                   <?php if ( $configInput["type"] === "file") { ?>
                    accept="image/png"
                    <?php } ?>
                <?= $configInput["required"] ? "required" : "" ?>
                   value="<?= $configInput["value"] ?>">

        <?php else: ?>
            <select name="<?= $name ?>"
                   placeholder="<?= $configInput["placeholder"] ?>"
                   class="<?= $configInput["class"] ?>"
                   id="<?= $configInput["id"] ?>"
                   type="<?= $configInput["type"] ?>"
                <?= $configInput["required"] ? "required" : "" ?>
                   value="<?= $configInput["value"] ?>">

                   <option value="" selected disabled><?= $configInput["placeholder"] ?></option>
                   <?php foreach ($configInput["options"] as $option): ?>
                        <option value="<?= $option ?>"><?= $option ?></option>
                    <?php endforeach; ?>
                   </select>
        <?php endif; ?>
    <?php endforeach; ?>

    <?php foreach ($config["button"] as $name => $configButton): ?>
            <button 
                name="<?= $name ?>"
                type="<?= $configButton["type"] ?>"
                id="<?= $configButton["id"] ?>"
                class="<?= $configButton["class"] ?>"
                onclick="<?= $configButton["onclick"] ?>"
                <?= $configButton["required"] ? "required" : "" ?>>
                <?= $configButton["textToDisplay"] ?>
            </button>
    <?php endforeach; ?>
    <input type="submit" name="submit" value="<?= $config["config"]["submit"] ?>">

</form>


<?php
//Suppression des inputs d'acteurs si le formulaire est invalide
echo "<script>
for (i = 1; i <= 6; i++) {
    actorInput = document.getElementById('admin-cms-form-actor' + i);
    if (actorInput) {
        actorInput.remove();
    }
}
</script>";
