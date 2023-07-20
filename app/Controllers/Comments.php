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

    public function viewComments(array $errors = []): void
    {
        CheckIsAdmin::isAdmin();
        $view = new View("BackOffice/commentsGestion", "back");
        $view->assign("pageName", "Backoffice-Commentaire");
        $view->assign("errors", $errors);
    }
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

    public function readComments(): void
    {
        CheckIsAdmin::isAdmin();
        $comments = new Comment();
        $error = new Error();

        if (!isset($_SESSION['isAuth'])) {
            $error->error404();
            exit;
        }

        // Récupérer les commentaires vérifiés
        $rows = $comments->getAllCommentsToVerify();

        // Créer un tableau pour stocker les données des commentaires
        $commentData = [];

        // Parcourir les commentaires et les ajouter au tableau de données
        foreach ($rows as $comment) {
            $commentData[] = [
                'id' => $comment->getId(),
                'content' => $comment->getContent(),
                'status' => $comment->getStatus(),
                'id_user' => $comment->getIdUser(),
                'id_review' => $comment->getIdReview(),
                'created_at' => $comment->getCreatedAt(),
            ];
        }

        // Définir le type de contenu de la réponse
        header('Content-Type: application/json');

        // Renvoyer les données au format JSON
        echo json_encode($commentData);
    }

    public function readValidComments (): void
    {
        CheckIsAdmin::isAdmin();
        $comments = new Comment();
        $error = new Error();

        if (!isset($_SESSION['isAuth'])) {
            $error->error404();
            exit;
        }

        // Récupérer les commentaires vérifiés
        $rows = $comments->getValidComments();

        // Créer un tableau pour stocker les données des commentaires
        $commentData = [];

        // Parcourir les commentaires et les ajouter au tableau de données
        foreach ($rows as $comment) {
            $commentData[] = [
                'id' => $comment->getId(),
                'content' => $comment->getContent(),
                'status' => $comment->getStatus(),
                'id_user' => $comment->getIdUser(),
                'id_review' => $comment->getIdReview(),
                'created_at' => $comment->getCreatedAt(),
            ];
        }

        // Définir le type de contenu de la réponse
        header('Content-Type: application/json');

        // Renvoyer les données au format JSON
        echo json_encode($commentData);
    }

    public function deleteComments()
    {
        CheckIsAdmin::isAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

            $id = intval($_POST['id']);
            $comment = new Comment();
            $comment->delete($id);
        }
        Helper::redirectTo('/back-view-comments');
    }

    public function publishComments()
    {
        CheckIsAdmin::isAdmin();
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

            $id = intval($_POST['id']);
            $comment = new Comment();
            $comment->publish($id);
        }
        Helper::redirectTo('/back-view-comments');
    }


}
