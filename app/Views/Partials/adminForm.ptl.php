<?php if (!empty($errors)): ?>
    <?php print_r($errors); ?>
<?php endif; ?>

<form method="<?= $config["config"]["method"] ?>"
      action="<?= $config["config"]["action"] ?>"
      enctype="<?= $config["config"]["enctype"] ?>"
      id="<?= $config["config"]["id"] ?>"
      class="<?= $config["config"]["class"] ?>">

    <?php foreach ($config["inputs"] as $name => $configInput): ?>
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

    <?php foreach ($config["select"] as $name => $configSelect): ?>
            <select name="<?= $name ?>"
                   placeholder="<?= $configSelect["placeholder"] ?>"
                   class="<?= $configSelect["class"] ?>"
                   id="<?= $configSelect["id"] ?>"
                   type="<?= $configSelect["type"] ?>"
                <?= $configSelect["required"] ? "required" : "" ?>
                   value="<?= $configSelect["value"] ?>">

                   <?php foreach ($configSelect["options"] as $option): ?>
                        <option value="<?= $option ?>"><?= $option ?></option>
                    <?php endforeach; ?>
                   </select>
    <?php endforeach; ?>

    <div id="showActorsPreview" class="showActorsPreview"></div>

    <input type="submit" name="submit" value="<?= $config["config"]["submit"] ?>">

</form>
