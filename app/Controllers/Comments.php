<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\Comments\Create;
use App\Models\Comment;
use App\Helper;
use App\Middlewares\CheckIsAdmin;
use App\Core\SQL;
use App\Middlewares\Error;

class Comments
{
    public function createComments(): void
    {
       $form = new Create();

        $userId = $_SESSION['userId'];

         if (!$form->isValid()) {
              $errors = $_SESSION['error_messages']; // Récupérer les erreurs depuis la session
              // var_dump($errors, $_SESSION['error_messages'], $form);
              unset($_SESSION['error_messages']); // Supprimer les erreurs de la session
              $this->view($errors);
              return;
         }
            $formdata = $form->data;
            $comment = new Comment();
            $comment->setContent($formdata['content']);
            $comment->setStatus(1);
            $comment->setIdUser($userId);
            $comment->setIdReview($formdata['id-media']);
            $comment->save();
            Helper::redirectTo('/media' .'?id=' . $formdata['id-media']);


    }
}
