<?php 
namespace App;

use App\Controllers\EditorMemento;
use App\Controllers\History;

$id = 7;

$history = new History();
$memento = new EditorMemento();

$memento->setId($id);
$mementoBuilder = $memento->buildMemento();
echo("<br><h3 class=\"white-text\"> Content memento au moment du build<br>");
var_dump($mementoBuilder->getContent());
echo ("</h3>");
$history->pushObj($mementoBuilder);
echo("<br><h3 class=\"white-text\"> History Content from start<br>");
var_dump($history->getObj());
echo ("</h3>");
$contentToDisplay = $mementoBuilder->getContent();
// echo(end($contentToDisplay[0]));

// ------------- RECUP ACTION CLICKED -------------
$action = isset($_POST['action']) ? $_POST['action'] : '';

if ($action == "save") {

    $modifiedMemento = new EditorMemento();
    $modifiedMemento->setContent($_POST['content']);
    echo("<br><h3 class=\"white-text\"> Donnée memento à rajouter<br>");
    var_dump($modifiedMemento->getContent());
    echo ("</h3>");
    $history->pushObj($modifiedMemento);
    echo("<br><h3 class=\"white-text\"> History après push<br>");
    var_dump($history->getObj());
    echo ("</h3>");

    // ------------- SAVE INTO DATABASE -------------
    if (!is_null($_POST['content'])) {
        $mementoToPush = new EditorMemento();
        $mementoToPush->setContent($history->getObj());

        echo '<br>';
        $serializedMemento ='O:29:"App\Controllers\EditorMemento":1:{s:7:"content";' . serialize($mementoToPush->getContent()[0]) . "}";
  
        echo "<br>";
        echo($serializedMemento);
        $history->pushToDB($serializedMemento,$id);
    }
}

if ($action == "undo") {
    // array_pop($mementoArray);
    // $memento->pop();

    if (!is_null($_POST['content'])) {
        // $sendMemento->setContentIntoMemento(serialize($mementoArray),7);
        $memento->getState();
    }
}


?>


<div class="container-60">
    <div class="create-review">
        <h2 class="white-text">Memento Demo View</h2> 


        <div class="create-review-confirmation-button container-50">
        <form method="POST" class="container-100" action="">
            <textarea name="content" style="resize:none; width:100%;" placeholder="<?= gettype($contentToDisplay) === "string" ? $contentToDisplay : end($contentToDisplay[0])  ?>"><?= gettype($contentToDisplay) === "string" ? $contentToDisplay : end($contentToDisplay[0])   ?></textarea>
            <br>
            <input id="saveInput" type="submit" class="button button-upload-review" name="action" value="save">
            <input id="undoInput" type="submit" class="button button-upload-review" name="action" value="undo">
        </form>
        </div>

        <div class="preview button-create-review container-50">
        <br>
        <h2 class="white-text">
        <?php
        if (gettype($contentToDisplay[0]) === "array") {
            foreach ($contentToDisplay[0] as $memento) {
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
