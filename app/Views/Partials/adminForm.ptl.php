<?php if (!empty($errors)): ?>
    <?php print_r($errors); ?>
<?php endif; ?>

<form method="<?= $config["config"]["method"] ?>"
      action="<?= $config["config"]["action"] ?>"
      enctype="<?= $config["config"]["enctype"] ?>"
      id="<?= $config["config"]["id"] ?>"
      class="<?= $config["config"]["class"] ?>">

    <?php foreach ($config["inputs"] as $name => $configInput): ?>
        <?php if ($name === "role"): ?>
            <select name="<?= $name ?>"
                    id="<?= $configInput["id"] ?>"
                    class="<?= $configInput["class"] ?>"
                <?= $configInput["required"] ? "required" : "" ?>>
                <?php foreach ($configInput["options"] as $value => $label): ?>
                    <option value="<?= $value ?>"><?= $label ?></option>
                <?php endforeach; ?>
            </select><br>
        <?php else: ?>
            <input name="<?= $name ?>"
                   placeholder="<?= $configInput["placeholder"] ?>"
                   class="<?= $configInput["class"] ?>"
                   id="<?= $configInput["id"] ?>"
                   type="<?= $configInput["type"] ?>"
                <?= $configInput["required"] ? "required" : "" ?>
                   value="<?= $configInput["value"] ?>"><br>
        <?php endif; ?>
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
                   </select><br>
    <?php endforeach; ?>

    <input type="submit" name="submit" value="<?= $config["config"]["submit"] ?>">

</form>
