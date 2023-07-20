<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\User\Create;
use App\Forms\User\Update;
use App\Helper;
use App\Models\User;
use App\Middlewares\CheckIsAdmin;
use App\Core\SQL;
use App\Middlewares\Error;



class Users
{

    public function view(array $errors = []): void
    {
        CheckIsAdmin::isAdmin();
        $view = new View("BackOffice/userGestion", "back");
        $view->assign("pageName", "Backoffice-Utilisateurs");
        $createForm = new Create();
        $view->assign("createForm", $createForm->getConfig());
        $updateForm = new Update();
        $view->assign("updateForm", $updateForm->getConfig());
        $view->assign("errors", $errors);
    }

    public function createUser(): void
    {
        if (Helper::methodUsed() === Helper::POST) {
            CheckIsAdmin::isAdmin();
            $form = new Create();
            if (!$form->isValid()) {
                $errors = $_SESSION['error_messages']; // Récupérer les erreurs depuis la session
                // var_dump($errors, $_SESSION['error_messages'], $form);
                unset($_SESSION['error_messages']); // Supprimer les erreurs de la session
                $this->view($errors);
                return;
            }

            $formdata = $form->data;
            $user = new User();
            if ($user->emailExists($formdata['email'])) {
                $errors = $_SESSION['error_messages'];
                $errors[] = "Le mail utilisé existe déjà.";
                $this->view($errors);
                return;
            }
            $user->setFirstname($formdata['firstname']);
            $user->setLastname($formdata['lastname']);
            $user->setEmail($formdata['email']);
            $user->setPassword($formdata['password']);
            $user->setBirthDate($formdata['birth_date']);
            $user->setRole($formdata['role']);
            $user->setConfirm(1);
            $user->save();
            Helper::redirectTo('/back-view-user');
        }
    }


    public function updateUser(): void
    {
        CheckIsAdmin::isAdmin();
        if (Helper::methodUsed() === Helper::POST) {
            $form = new Update();
            if (!$form->isValid()) {
                $errors = $_SESSION['error_messages']; // Récupérer les erreurs depuis la session
                unset($_SESSION['error_messages']);
                $this->view($errors);
                return;
            }

            $formdata = $form->data;
            $user = User::populate($formdata['id']); // Récupérer l'utilisateur à partir de la base de données

            // Vérifier si l'email a été modifié
            if ($user->getEmail() !== $formdata['email']) {
                if ($user->emailExists($formdata['email'])) {
                    $errors = $_SESSION['error_messages'];
                    $errors[] = "L'email utilisé existe déjà.";
                    $this->view($errors);
                    return;
                }
            }

            // Mettre à jour les propriétés de l'utilisateur
            $user->setFirstname($formdata['firstname']);
            $user->setLastname($formdata['lastname']);
            $user->setEmail($formdata['email']);
            $user->setRole($formdata['role']);
            $user->setBirthDate($formdata['birth_date']);

            // Enregistrer les modifications dans la base de données
            $user->save();
            Helper::redirectTo('/back-view-user');
        }
    }


//pour l'installer ne pas le faire dans un controller mais le mettre dans le systeme de routing
    public function getUser()
    {
        CheckIsAdmin::isAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $user = new User();
            $where = ['id' => $id];
            $userData = $user->getOneWhere($where);



            header('Content-Type: application/json');
            echo json_encode($userData);
        }
    }



    public function deleteUser()
    {
        CheckIsAdmin::isAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

            $id = intval($_POST['id']);
            $user = new User();
            $user->delete($id);
        }
        Helper::redirectTo('/back-view-user');
    }

    public function readUser(): void
    {
        CheckIsAdmin::isAdmin();
        $user = new User();
        $error = new Error();

        if (!isset($_SESSION['isAuth'])) {
            $error->error404();
            exit;
          }
          
          $userStatus = $user->getUserInfo(['email' => $_SESSION['email']]);
          
          if($userStatus['role'] != 1) {
            $error->error404();
            exit;
        }

        
        $rows = $user->getAll();
        header('Content-Type: application/json');
        echo json_encode($rows);
    }


}
