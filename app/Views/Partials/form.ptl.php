<?php 
namespace App\Views\Partials;

use App\Helper;

if (!empty($errors)) print_r($errors); ?>

<form method="<?= $config["config"]["method"] ?>"
      action="<?= $config["config"]["action"] ?>"
      enctype="<?= $config["config"]["enctype"] ?>"
      id="<?= $config["config"]["id"] ?>"
      class="<?= $config["config"]["class"] ?>">

    <input type="hidden" name="csrf_token" value="<?= Helper::generateCSRFToken() ?>">

    <?php foreach ($config["inputs"] as $name => $configInput): ?>
        <?php if ($name === "role"): ?>
            <select name="<?= $name ?>"
                    id="<?= $configInput["id"] ?>"
                    class="<?= $configInput["class"] ?>"
                <?= $configInput["required"] ? "required" : "" ?>>
                <?php foreach ($configInput["options"] as $value => $label): ?>
                    <option value="<?= $value ?>"><?= $label ?></option>
                <?php endforeach; ?>
            </select>
        <?php else: ?>
            <input name="<?= $name ?>"
                   placeholder="<?= $configInput["placeholder"] ?? "" ?>"
                   class="<?= $configInput["class"] ?? "" ?>"
                   id="<?= $configInput["id"] ?? "" ?>"
                   type="<?= $configInput["type"] ?>"
                   accept="<?= $configInput["accept"] ?>"
                <?= !empty($configInput["required"]) ? "required" : "" ?>
                   value="<?= $configInput["value"] ?? "" ?>">
        <?php endif; ?>
    <?php endforeach; ?>

    <button type="submit" class="submit"><?= $config["config"]["submit"] ?></button>

</form>
