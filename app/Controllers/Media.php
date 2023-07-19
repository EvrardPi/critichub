<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Elementard;

class Media
{
    public function mediaView(): void
    {
        $view = new View("MediaPage/media", "media");
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