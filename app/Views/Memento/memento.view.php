<?php 
namespace App;

use App\Controllers\EditorMemento;
use App\Controllers\History;
use App\Models\Memento as SendMemenToDb;

//  OBJECT INSTANTIATIONS 
$countMemento = new SendMemenToDb();
$history = new History();
$memento = new EditorMemento();

//  SET ID 
$id = $_GET['id'];

//  GET ELEMENTS FROM DATABASE TO DISPLAY 
$memento->setId($id);
$mementoBuilder = $memento->buildMemento();
$history->pushObj($mementoBuilder);
$contentToDisplay = $mementoBuilder->getContent();



//  RECUP ACTION CLICKED 
$action = isset($_POST['action']) ? $_POST['action'] : '';
$version = isset($_POST['selectVersion']) ? $_POST['selectVersion'] : '';


// -------------------------- ACTION PUSH --------------------------
if ($action == "save") {

    //  PUSH CONTENT TO VAR 
    $modifiedMemento = new EditorMemento();
    $modifiedMemento->setContent($_POST['content']);
    $history->pushObj($modifiedMemento);

    //  SAVE INTO DATABASE
    if (!is_null($_POST['content'])) {
        $mementoToPush = new EditorMemento();
        $mementoToPush->setContent($history->getObj());
        $serializedMemento ='O:29:"App\Controllers\EditorMemento":1:{s:7:"content";' . serialize($mementoToPush->getContent()[0]) . "}";
        var_dump($serializedMemento);
        $history->pushToDB($serializedMemento,$id);
    }
}
// -------------------------- ACTION UNDO --------------------------
if ($action == "undo") {
    if (!is_null($_POST['content'])) {
        //  POP ELEMENT FROM ARRAY 
        $mementoToPush = new EditorMemento();
        $mementoToPush->setContent($mementoBuilder->pop());
        var_dump($mementoToPush);
        $serializedMemento ='O:29:"App\Controllers\EditorMemento":1:{s:7:"content";' . serialize($mementoToPush->getContent()) . "}";
        $history->pushToDB($serializedMemento,$id);
    }
}

// -------------------------- ACTION SELECT VERSION --------------------------
if (isset($version)) {
    if (!empty($version)){
    $selectedVersion = $contentToDisplay[$version];
    ?>
    <script>
        $(document).ready(function() {
        let textAreaChanger = document.getElementById("contentArea");
        let textChanger = "<?php echo $selectedVersion; ?>";
        console.log(textAreaChanger);
        textAreaChanger.value = textChanger;
        textAreaChanger.placeholder = textChanger;
        });
    </script>
<?php }} ?>

<!-- -------------------------- HTML-------------------------- -->
<div class="container-60">
    <div class="create-review">
        <h2 class="white-text">Memento Demo View</h2> 


        <div class="create-review-confirmation-button container-50">
        <form id="form" method="POST" class="container-100" action="">
            <textarea id="contentArea" name="content" style="resize:none; width:100%;" placeholder="<?= gettype($contentToDisplay) === "string" ? $contentToDisplay : end($contentToDisplay)  ?>"><?= gettype($contentToDisplay) === "string" ? $contentToDisplay : end($contentToDisplay)   ?></textarea>
            <br>
            <input id="saveInput" type="submit" class="button button-upload-review" name="action" value="save">
            <input id="undoInput" type="submit" class="button button-upload-review" name="action" value="undo">
            <select id="selectVersionInput" onchange="this.form.submit()"    class="button button-upload-review" name="selectVersion" value="selectVersion">
                <option value="" disabled selected>Select your version</option>
                <?php 
                foreach ($contentToDisplay as $index => $value) {?>
                     <option value=<?= $index ?>><?= $value ?></option>
                <?php } ?>
            </select>
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

<!-- -------------------------- JS -------------------------- -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // -------------------------- SAVE BTN CLICKER --------------------------
    $("#saveInput").click(function(event) {
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

    // -------------------------- UNDO BTN CLICKER --------------------------
    $("#undoInput").click(function(event) {
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
