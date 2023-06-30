<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\User\Create;
use App\Forms\Register;
use App\Forms\User\Update;
use App\Helper;
use App\Models\User;
use App\Core\SQL;

class Users
{

    public function view(array $errors = []): void
    {
        $view = new View("BackOffice/userGestion", "back");
        $createForm = new Create();
        $view->assign("createForm", $createForm->getConfig());
        $updateForm = new Update();
        $view->assign("updateForm", $updateForm->getConfig());
        $view->assign("errors", $errors);
    }

    public function createUser(): void
    {
        $form = new Create();
        if (!$form->isValid()){
            $errors = $_SESSION['error_messages']; // Récupérer les erreurs depuis la session
            // var_dump($errors, $_SESSION['error_messages'], $form);
            unset($_SESSION['error_messages']); // Supprimer les erreurs de la session
            $this->view($errors);
            return;
        }
        $formdata = $form->data;
        $user = new User();
        $user->setFirstname($formdata['firstname']);
        $user->setLastname($formdata['lastname']);
        $user->setEmail($formdata['email']);
        $user->setPassword($formdata['password']);
        $user->setBirthDate($formdata['birth_date']);
        $user->setRole($formdata['role']);
        $user->save();
        $this->view();
    }


    public function updateUser(): void
    {
        $form = new Update();
        if (!$form->isValid()) {
            $this->view();
        }
        $formdata = $form->data;


        $user = User::populate($formdata['id']); // Récupérer l'utilisateur à partir de la base de données*/

        // Mettre à jour les propriétés de l'utilisateur
        $user->setFirstname($formdata['firstname']);
        $user->setLastname($formdata['lastname']);
        $user->setEmail($formdata['email']);
        $user->setRole($formdata['role']);
        $user->setBirthDate($formdata['birth_date']);

        // Enregistrer les modifications dans la base de données
        $user->save();
        $this->view();
    }

//pour l'installer ne pas le faire dans un controller mais le mettre dans le systeme de routing
    public function getUser()
    {
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

            $id = intval($_POST['id']);
            $user = new User();
            $user->delete($id);
        }
        $this->view();
    }

    public function readUser(): void
    {
        $user = new User();
        $rows = $user->getAll();
        header('Content-Type: application/json');
        echo json_encode($rows);
    }


}
