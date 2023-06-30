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
            $errors = $_SESSION['error_messages']; // Récupérer les erreurs depuis la session
            unset($_SESSION['error_messages']); // Supprimer les erreurs de la session
            $this->view($errors);
            return;
        }
        if(!$form->checkCategoryCreate()){
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
    }


    public function updateCategory(): void
    {
        $form = new UpdateCategory();
        $form->data['id'] = $_POST['id'];
        $formdata = $form->data;

        if (!$form->isValid()) {
            $errors = $_SESSION['error_messages'];
            unset($_SESSION['error_messages']);
            $this->view($errors);
            return;
        }

        if (!$form->checkCategoryUpdate()) {
            $errors = $_SESSION['error_messages'];
            unset($_SESSION['error_messages']);
            $this->view($errors);
            return;
        }

        $category = Category::populate($formdata['id']);
        $oldName = $category->getName();

        // Vérifier si le nom de la catégorie existe déjà
        $newName = $formdata['name'];
        if ($newName !== $oldName && $category->nameExists(['name' => $newName])) {
            array_push($_SESSION['error_messages'], "Le nom de la catégorie existe déjà.");
            $this->view();
            return;
        }

        // Mise à jour de l'image si une nouvelle image est sélectionnée
        $prefix = "assets/images/category/";
        $uploadedFile = $_FILES['picture'];
        $fileName = $uploadedFile['name'];
        $tempFilePath = $uploadedFile['tmp_name'];

        if (!empty($fileName)) {
            // Suppression de l'ancienne image
            $filePath = $prefix . $oldName . ".png";
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Ajout de la nouvelle image
            $nomFichier = $newName . ".png";
            $destinationPath = $prefix . $nomFichier;
            if (!move_uploaded_file($tempFilePath, $destinationPath)) {
                array_push($_SESSION['error_messages'], "Erreur lors du téléchargement du fichier.");
                $this->view();
                return;
            }

            // Mettre à jour le nom de l'image dans la base de données
            $category->setPicture($fileName);
        }

        // Mettre à jour le nom de la catégorie si celui-ci a été modifié
        if ($newName !== $oldName) {
            $category->setName($newName);
        }

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
