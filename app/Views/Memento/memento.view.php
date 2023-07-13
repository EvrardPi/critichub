<?php 
namespace App;

use App\Models\Memento as SendMemenToDb;


$sendMemento = new SendMemenToDb;
$mementoContent = $sendMemento->getContentFromMemento(7);
$mementoArray = unserialize($mementoContent["content"]);


// ------------- RECUP ACTION CLICKED -------------
$action = isset($_POST['action']) ? $_POST['action'] : '';

if ($action == "save") {

    // echo $_POST['content'];

    array_push($mementoArray,$_POST['content']);
    var_dump($mementoArray);

    // ------------- SAVE INTO DATABASE -------------
    if (!is_null($_POST['content'])) {
        $sendMemento->setContentIntoMemento(serialize($mementoArray),7);
    }
}

if ($action == "undo") {
    array_pop($mementoArray);

    if (!is_null($_POST['content'])) {
        $sendMemento->setContentIntoMemento(serialize($mementoArray),7);
    }}

?>


<div class="container-60">
    <div class="create-review">
        <h2 class="white-text">Memento Demo View</h2> 


        <div class="create-review-confirmation-button container-50">
        <form method="POST" class="container-100" action="">
            <textarea name="content" style="resize:none; width:100%;" placeholder="<?= end($mementoArray) ?>"><?= end($mementoArray) ?></textarea>
            <br>
            <input id="saveInput" type="submit" class="button button-upload-review" name="action" value="save">
            <input id="undoInput" type="submit" class="button button-upload-review" name="action" value="undo">
        </form>
        </div>

        <div class="preview button-create-review container-50">
        <br>
        <h2 class="white-text">
        <?php
            foreach ($mementoArray as $memento) {
                echo $memento; // Vous pouvez faire ce que vous souhaitez avec chaque valeur
                echo "<br>";
            }
        ?>
        </h2>
        </div>

    </div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {

    console.log(window.location.href);
    // Gestionnaire d'événement pour le bouton Save
    $("#saveInput").click(function(event) {
        // event.preventDefault();
        $.ajax({
            type: "POST",
            url: window.location.href, 
            data: {
                action: "save"
            },
            success: function(response) {
                console.log("Success");
            }
        });
    });

    // Gestionnaire d'événement pour le bouton Undo
    $("#undoInput").click(function(event) {
        // event.preventDefault();
        $.ajax({
            type: "POST",
            url: window.location.href,
            data: {
                action: "undo"
            },
            success: function(response) {
                console.log("Success");
            }
        });
    });
});
</script>
