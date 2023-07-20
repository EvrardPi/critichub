<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Elementard;
use App\Forms\Comments\Create;
use App\Models\Comment;
use App\Core\SQL;
use App\Models\User;

class Media
{
    public function mediaView(): void
    {
        $commentsData = [];
        $view = new View("MediaPage/media", "media");
        $view->assign("pageName", "Média");
        $comments = new Create();
        $view->assign("comments", $comments->getConfig());
        $viewComments = new Comment();
        $commentsData = $viewComments->getByIdMedia($_GET['id']);
        $user = new User();

        $commentData = [];
        if ($commentsData !== null) {
            $user = new User();
            foreach ($commentsData as $comment) {
                $userId = $comment->getIdUser();
                $userInfo = $userId ? $user->getById($userId) : null;
                $firstName = $userInfo ? $userInfo->getFirstName() : null;
                $lastName = $userInfo ? $userInfo->getLastName() : null;
                $content = $comment->getContent();
                $createdAt = $comment->getCreatedAt();

                // Si $userId est null, on remplace $firstName et $lastName par "Anonyme"
                if ($userId === null) {
                    $firstName = "Anonyme";
                    $lastName = "";
                }

                $commentData[] = [
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'content' => $content,
                    'createdAt' => $createdAt,
                ];
            }
        }

        $view->assign("commentData", $commentData);
    }


    public function getMediaByID()
    {
        $media = new Elementard();

        // Récupérer les données JSON envoyées
        $json = file_get_contents('php://input');
        // Décoder les données JSON en tableau
        $postData = json_decode($json, true);

        $id = $postData['id'];
      
        $data = $media->getById($id);

        // Envoyer les données en réponse
        header('Content-Type: application/json');
        echo json_encode($data->getAllParametres());
    }
}