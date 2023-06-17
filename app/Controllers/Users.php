<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\Create;
use App\Forms\Register;
use App\Forms\Update;
use App\Models\User;
use App\Core\SQL;

class Users
{

    public function view(): void
    {
        $view = new View("BackOffice/userGestion", "back");
        $createForm = new Create();
        $view->assign("createForm", $createForm->getConfig());
        $updateForm = new Update();
        $view->assign("updateForm", $updateForm->getConfig());
    }

    public function createUser(): void
    {
        $form = new Create();
        if (!$form->isValid()){
            echo "error";
            die();
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


    public function updateUser($updateForm):void
    {
        if ($updateForm->isSubmited() && $updateForm->isValid()) {
            $user = new User();
            $user->setId($_POST['update-form-id']);
            $user->setFirstname($_POST['update-form-firstname']);
            $user->setLastname($_POST['update-form-lastname']);
            $user->setEmail($_POST['update-form-email']);
            $user->setBirthDate($_POST['birth_date']);
            $user->save();
        }
    }

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
