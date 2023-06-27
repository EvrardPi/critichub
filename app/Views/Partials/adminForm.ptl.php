<?php 
namespace App\Views\Partials;

use App\Helper;

if (!empty($errors)): ?>
    <?php print_r($errors); ?>
<?php endif; ?>

<form method="<?= $config["config"]["method"] ?>"
      action="<?= $config["config"]["action"] ?>"
      enctype="<?= $config["config"]["enctype"] ?>"
      id="<?= $config["config"]["id"] ?>"
      class="<?= $config["config"]["class"] ?>">

      <input type="hidden" name="csrf_token" value="<?= Helper::generateCSRFToken() ?>">

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
