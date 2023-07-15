<?php 
namespace App;

use App\Controllers\EditorMemento;
use App\Controllers\History;

$id = $_GET['id'];

$history = new History();
$memento = new EditorMemento();

$memento->setId($id);
$mementoBuilder = $memento->buildMemento();
$history->pushObj($mementoBuilder);
$contentToDisplay = $mementoBuilder->getContent();
// echo(end($contentToDisplay[0]));

// ------------- RECUP ACTION CLICKED -------------
$action = isset($_POST['action']) ? $_POST['action'] : '';

if ($action == "save") {

    $modifiedMemento = new EditorMemento();
    $modifiedMemento->setContent($_POST['content']);
    $history->pushObj($modifiedMemento);

    // ------------- SAVE INTO DATABASE -------------
    if (!is_null($_POST['content'])) {
        $mementoToPush = new EditorMemento();
        $mementoToPush->setContent($history->getObj());
        $serializedMemento ='O:29:"App\Controllers\EditorMemento":1:{s:7:"content";' . serialize($mementoToPush->getContent()[0]) . "}";
        var_dump($serializedMemento);
        $history->pushToDB($serializedMemento,$id);
    }
}

if ($action == "undo") {
    // array_pop($mementoArray);
    // $memento->pop();

    var_dump($mementoBuilder->getContent());
    echo "<br> <br>";


    if (!is_null($_POST['content'])) {
        $mementoToPush = new EditorMemento();
        $mementoToPush->setContent($mementoBuilder->pop());
        var_dump($mementoToPush);
        $serializedMemento ='O:29:"App\Controllers\EditorMemento":1:{s:7:"content";' . serialize($mementoToPush->getContent()) . "}";
        $history->pushToDB($serializedMemento,$id);
    }
}


?>


<div class="container-60">
    <div class="create-review">
        <h2 class="white-text">Memento Demo View</h2> 


        <div class="create-review-confirmation-button container-50">
        <form method="POST" class="container-100" action="">
            <textarea name="content" style="resize:none; width:100%;" placeholder="<?= gettype($contentToDisplay) === "string" ? $contentToDisplay : end($contentToDisplay)  ?>"><?= gettype($contentToDisplay) === "string" ? $contentToDisplay : end($contentToDisplay)   ?></textarea>
            <br>
            <input id="saveInput" type="submit" class="button button-upload-review" name="action" value="save">
            <input id="undoInput" type="submit" class="button button-upload-review" name="action" value="undo">
        </form>
        </div>

        <div class="preview button-create-review container-50">
        <br>
        <h2 class="white-text">
        <?php
        if (gettype($contentToDisplay) === "array") {
            foreach ($contentToDisplay as $memento) {
                echo $memento;
                echo "<br>";
            }
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
