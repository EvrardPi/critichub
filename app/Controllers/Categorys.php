<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\Category\CreateCategory;
use App\Forms\Category\UpdateCategory;
use App\Models\Category;
use App\Models\User;
use App\Core\SQL;

class Categorys
{

    public function view(array $errors = []): void
    {
        $view = new View("BackOffice/categoryGestion", "back");
        $createForm = new CreateCategory();
        $view->assign("createForm", $createForm->getConfig());
        $updateForm = new UpdateCategory();
        $view->assign("updateForm", $updateForm->getConfig());
        $view->assign("errors", $errors);
    }

    public function createCategory(): void
    {
        $form = new CreateCategory();
        $formdata = $form->data;

        if (!$form->isValid()){
            //var_dump($form, $_SESSION['error_messages']);
          //  die();
            $errors = $_SESSION['error_messages']; // Récupérer les erreurs depuis la session
            unset($_SESSION['error_messages']); // Supprimer les erreurs de la session
            $this->view($errors);
            return;
        }

        //Préparation de l'image
        $prefix = "assets/images/category/";
        $uploadedFile = $_FILES['picture'];
        $fileName = $uploadedFile['name'];
        $tempFilePath = $uploadedFile['tmp_name'];
        $nomFichier = $formdata['name'] . ".png";
        $category = new Category();

        //Enregistrement de l'image
        $destinationPath = $prefix . $nomFichier;
        if (!move_uploaded_file($tempFilePath, $destinationPath)) {
            array_push($_SESSION['error_messages'], "Erreur lors du téléchargement du fichier.");
            $this->view();
            return;
        }
        //Enrengistrement dans la bdd
        $category->setName($formdata['name']);
        $category->setPicture($fileName);
        $category->save();
        $this->view();

       /* //Vérification de la duplication du nom du fichier picture
        if ($category->namePictureExists(['picture' => $fileName])) {
            array_push($_SESSION['error_messages'], "Le nom du fichier existe déjà, veuillez choisir un autre fichier.");
            $this->view();
            return;
        }

        //Vérification de la duplication du nom de la catégorie
        if ($category->nameExists(['name' => $formdata['name']])) {
            array_push($_SESSION['error_messages'], "Le nom de la catégorie existe déjà, veuillez en choisir un autre.");
            $this->view();
            return;
        }

        // Vérification de l'extension du fichier
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if ($fileExtension !== 'png') {
            array_push($_SESSION['error_messages'], "Le fichier doit être au format PNG.");
            $this->view();
            return;
        }

        // Déplacer le fichier téléchargé vers le répertoire souhaité
        $destinationPath = $prefix . $fileName;
        if (!move_uploaded_file($uploadedFile, $destinationPath)) {
            array_push($_SESSION['error_messages'], "Erreur lors du téléchargement du fichier.");
            $this->view();
            return;
        }*/


    }


    public function updateCategory(): void
    {

        $form = new UpdateCategory();
        if (!$form->isValid()) {
            echo "error";
            die();
        }
        $formdata = $form->data;
        $category = Category::populate($formdata['id']);
        $oldName = $category->getName();
        //Ajout de la nouvelle image
        $prefix = "assets/images/category/";
        $base64 = $formdata['base64'];
        $nomFichier= $formdata['name'] .".png";
        $imageToSave = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
        file_put_contents($prefix . $nomFichier, $imageToSave);
        //Suppression de l'ancienne image
        $filePath = 'assets/images/category/' . $oldName . '.png';
        unlink($filePath);
        // Mettre à jour les propriétés de l'utilisateur
        $category->setName($formdata['name']);
        $category->setPicture($formdata['picture']);
        // Enregistrer les modifications dans la base de données
        $category->save();
        $this->view();
    }


    public function getCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $category = new Category();
            $where = ['id' => $id];
            $categoryData = $category->getOneWhere($where);
            header('Content-Type: application/json');
            echo json_encode($categoryData);
        }
    }

    public function deleteCategory(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

            $id = intval($_POST['id']);
            $name = $_POST['name'];
            $filePath = 'assets/images/category/' . $name . '.png';
            unlink($filePath);
            $category = new Category();
            $category->delete($id);
        }
        $this->view();
    }

    public function readCategory(): void
    {
        $category = new Category();
        $rows = $category->getAll();
        header('Content-Type: application/json');

        echo json_encode($rows);
    }


}
