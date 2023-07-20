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
        foreach ($commentsData as $comment) {
            $userId = $comment->getIdUser();
            $userInfo = $user->getById($userId);
            $firstName = $userInfo->getFirstName();
            $lastName = $userInfo->getLastName();
            $content = $comment->getContent();
            $createdAt = $comment->getCreatedAt();

            $commentData[] = [
                'firstName' => $firstName,
                'lastName' => $lastName,
                'content' => $content,
                'createdAt' => $createdAt
            ];
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
    
    public function addVue()
    {
        $media = new Elementard();

        // Récupérer les données JSON envoyées
        $json = file_get_contents('php://input');
        // Décoder les données JSON en tableau
        $postData = json_decode($json, true);

        $id = $postData['id'];
      
        $media->incrementViews($id);

        // Envoyer les données en réponse
        header('Content-Type: application/json');

         // renvoyer une réponse au format JSON
         $response = array('success' => true, 'message' => 'vue Incrementé');
         echo json_encode($response);
    }
}