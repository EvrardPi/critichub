<?php

namespace App\Controllers;

use App\Core\View;
use App\Forms\Create;
use App\Forms\Register;
use App\Forms\Update;
use App\Models\User;
use App\Core\SQL;

class Users
{

    public function createUser(): void
    {
        //remplacer le formulaire par un formulaire spécial pour le crud
        $createForm = new Create();
        $view = new View("BackOffice/userGestion", "back");
        $view->assign("createForm", $createForm->getConfig());
        //Form validé ? et correct ?
        if ($createForm->isSubmited() && $createForm->isValid()) {
            $user = new User();
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setCountry($_POST['country']);
            $user->setPwd($_POST['pwd']);
            $user->save();
        }
        $this->readUser($view);
    }

    public function updateUser()
    {



    }

    public function getUser()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            if (isset($_GET['id'])) {

                $id = $_GET['id'];
                $user = new User();
                $where = ['id' => $id];

                $userData = $user->getOneWhere($where);
                $jsonData = json_encode($userData);
                echo"$jsonData";
                header('Content-Type: application/json');
                exit;
            }
        }
    }


    public function deleteUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['id'])) {
                $id = $_POST['id'];
                $user = new User();
                $user->delete($id);
            }
        }
        $this->createUser();
    }



    public function readUser($view): void
    {
        $user = new User();
        $rows = $user->getAll();
        $view->assign("rows", $rows);
        $updateForm = new Update();
        $view->assign("updateForm", $updateForm->getConfig());

    }

}