<?php

namespace App\Controllers;


use App\Core\View;
use App\Forms\Category\CreateCategory;
use App\Forms\Category\UpdateCategory;
use App\Helper;
use App\Middlewares\CheckIsAdmin;
use App\Models\Category;
use App\Models\User;


class Categorys
{

    public function viewCategory(array $errors = []): void
    {
        CheckIsAdmin::isAdmin();
        $view = new View("BackOffice/categoryGestion", "back");
        $view->assign("pageName", "Backoffice-Catégories");
        $createForm = new CreateCategory();
        $view->assign("createForm", $createForm->getConfig());
        $updateForm = new UpdateCategory();
        $view->assign("updateForm", $updateForm->getConfig());
        $view->assign("errors", $errors);
    }

    public function createCategory(): void
    {
        if (Helper::methodUsed() === Helper::POST) {
            CheckIsAdmin::isAdmin();
            $form = new CreateCategory();
            $formdata = $form->data;

            if (!$form->isValid()) {
                $errors = $_SESSION['error_messages']; // Récupérer les erreurs depuis la session
                unset($_SESSION['error_messages']); // Supprimer les erreurs de la session
                $this->viewCategory($errors);
                return;
            }
            if (!$form->checkCategoryCreate()) {
                $errors = $_SESSION['error_messages']; // Récupérer les erreurs depuis la session
                unset($_SESSION['error_messages']); // Supprimer les erreurs de la session
                $this->viewCategory($errors);
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
                Helper::redirectTo('/back-view-category');//remettre le $this view et mettre la variable erreur
                return;
            }
            //Enrengistrement dans la bdd
            $category->setName($formdata['name']);
            $category->setPicture($fileName);
            $category->save();
            Helper::redirectTo('/back-view-category');
        }
    }


    public function updateCategory(): void
    {

        CheckIsAdmin::isAdmin();
        if (Helper::methodUsed() === Helper::POST) {
            $form = new UpdateCategory();
            if (isset($_POST['id'])) {
                $form->data['id'] = $_POST['id'];
            }
            $formdata = $form->data;


            if (!$form->isValid()) {
                $errors = $_SESSION['error_messages'];
                unset($_SESSION['error_messages']);
                $this->viewCategory($errors);
                return;
            }

            if (!$form->checkCategoryUpdate()) {
                $errors = $_SESSION['error_messages'];
                unset($_SESSION['error_messages']);
                $this->viewCategory($errors);
                return;
            }

            $category = Category::populate($formdata['id']);
            $oldName = $category->getName();

            // Vérifier si le nom de la catégorie existe déjà
            $newName = $formdata['name'];
            if ($newName !== $oldName && $category->nameExists(['name' => $newName])) {
                array_push($_SESSION['error_messages'], "Le nom de la catégorie existe déjà.");
                Helper::redirectTo('/back-view-category');
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
                    $errors = $_SESSION['error_messages'];
                    unset($_SESSION['error_messages']);
                    $this->viewCategory($errors);
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
            Helper::redirectTo('/back-view-category');
        }
    }



    public function getCategory()
    {
        CheckIsAdmin::isAdmin();
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
        CheckIsAdmin::isAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $id = intval($_POST['id']);
            $name = $_POST['name'];
            $filePath = 'assets/images/category/' . $name . '.png';
            unlink($filePath);
            $category = new Category();
            $category->delete($id);
        }
        Helper::redirectTo('/back-view-category');
    }

    public function readCategory(): void
    {
        CheckIsAdmin::isAdmin();
        $category = new Category();
        $error = new Error();

        if (!isset($_SESSION['isAuth'])) {
            $error->error404();
            exit;          
        }
          $userLoggedIn = new User();
          $userStatus = $userLoggedIn->getUserInfo(['email' => $_SESSION['email']]);
          
          if($userStatus['role'] != 1) {
            $error->error404();
            exit;
        }
        
        $rows = $category->getAll();
        header('Content-Type: application/json');

        echo json_encode($rows);
          
    }


}
