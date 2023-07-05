<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\Category\CreateCategory;
use App\Forms\Category\UpdateCategory;
use App\Models\Category;
use App\Models\User;
use App\Core\SQL;

class Dashboard
{
    public function viewDashboard( array $errors = []): void
    {
        $view = new View("BackOffice/dashboard", "back");
        $view->assign("pageName", "Backoffice-Dashboard");
        $view->assign("errors", $errors);

        $chartData = $this->createUserCreationChart();
        $chartData2023 = $chartData['chartData2023'];
        $chartData2022 = $chartData['chartData2022'];
        $chartData2021 = $chartData['chartData2021'];
        $view->assign("chartData2021", $chartData2021);
        $view->assign("chartData2022", $chartData2022);
        $view->assign("chartData2023", $chartData2023);


        //Top 10 des préviews les plus vues
        $bestPreviewsView = $this->getBestPreviewsView();
        $view->assign("bestPreviewsView", $bestPreviewsView);

        //Top 10 des préviews les plus commentés
        $bestPreviewsComment = $this->getBestPreviewsComment();
        $view->assign("bestPreviewsComment", $bestPreviewsComment);

        //Nombre de signalement à vérifier
        $reporting = $this->getReportingCount();
        $view->assign("reporting", $reporting);

        //Nombre de commentaires à vérifier
        $checkComment = $this->getCheckCommentCount();
        $view->assign("checkComment", $checkComment);

        // Appeler la méthode getUserData et assigner le résultat à la vue
        $userData = $this->getUserData();
        $view->assign("userData", $userData);

        // Appeler la méthode getUserCount et assigner le résultat à la vue
        $userCount = $this->getUserCount();
        $view->assign("userCount", $userCount);
        $categoryCount = $this->getCategoriesCount();
        $view->assign("categoryCount", $categoryCount);
    }

    private function getUserCount(): int
    {
        $user = new User();
        return $user->getCount('paya4_user');
    }

    private function getCategoriesCount(): int
    {
        $category = new Category();
        return $category->getCount('paya4_category');
    }

    private function getReportingCount(): int
    {
        //$reporting = new Category();
       // return $reporting->getCount('paya4_category');
        $reporting = 2;
        return $reporting;
    }

    private function getCheckCommentCount(): int
    {
        //$category = new Category();
       // return $category->getCount('paya4_category');
        $checkComment = 59;
        return $checkComment;
    }

    private function getBestPreviewsView(): array
    {
        $bestPreviewsView = [
        ['Spider-Man : Across the Spider-Verse','Youri Ghlis', 10000],
        ['The Batman','Jean Christophe', 9600],
        ['The Flash','Pierre Evrard', 9000],
        ['The Matrix Resurrections','Ash BG', 8777],
        ['Doctor Strange in the Multiverse of Madness','Arthur Pika', 7655],
        ['Thor: Love and Thunder','Aurélien crane de sage', 6544],
        ['Black Panther: Wakanda Forever','Si le prof voit ce commit je peux avoir 1 point en plus ? ', 5433],
        ['Aquaman and the Lost Kingdom','Le fun', 4322],
        ['The Marvels','Jaiplus Dinspi', 3211],
        ['Black Adam','Wouf Waf', 2100]

    ];
        return $bestPreviewsView;
    }

    private function getBestPreviewsComment(): array
    {
        $bestPreviewsComment = [
            ['Spider-Man : Across the Spider-Verse','Youri Ghlis', 10000],
            ['The Batman','Jean Christophe', 9600],
            ['The Flash','Pierre Evrard', 9000],
            ['The Matrix Resurrections','Ash BG', 8777],
            ['Doctor Strange in the Multiverse of Madness','Arthur Pika', 7655],
            ['Thor: Love and Thunder','Aurélien crane de sage', 6544],
            ['Black Panther: Wakanda Forever','Si le prof voit ce commit je peux avoir 1 point en plus ? ', 5433],
            ['Aquaman and the Lost Kingdom','Le fun', 4322],
            ['The Marvels','Jaiplus Dinspi', 3211],
            ['Black Adam','Wouf Waf', 2100]

        ];
        return $bestPreviewsComment;
    }

    private function createUserCreationChart(): array
    {
        $userData = $this->getUserData();
        $userCreationCount2023 = [];
        $userCreationCount2022 = [];
        $userCreationCount2021 = [];

        // Agréger le nombre de créations d'utilisateurs par mois pour les années 2023, 2022 et 2021
        foreach ($userData as $date) {
            $year = date('Y', strtotime($date)); // Obtenir l'année
            $month = date('F', strtotime($date)); // Obtenir le mois

            if ($year === '2023') {
                if (isset($userCreationCount2023[$month])) {
                    $userCreationCount2023[$month]++;
                } else {
                    $userCreationCount2023[$month] = 1;
                }
            } elseif ($year === '2022') {
                if (isset($userCreationCount2022[$month])) {
                    $userCreationCount2022[$month]++;
                } else {
                    $userCreationCount2022[$month] = 1;
                }
            } elseif ($year === '2021') {
                if (isset($userCreationCount2021[$month])) {
                    $userCreationCount2021[$month]++;
                } else {
                    $userCreationCount2021[$month] = 1;
                }
            }
        }

        // Créer un tableau avec tous les mois de l'année
        $allMonths = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        // Remplir les mois manquants avec un compte de 0 pour l'année 2023
        foreach ($allMonths as $month) {
            if (!isset($userCreationCount2023[$month])) {
                $userCreationCount2023[$month] = 0;
            }
        }

        // Remplir les mois manquants avec un compte de 0 pour l'année 2022
        foreach ($allMonths as $month) {
            if (!isset($userCreationCount2022[$month])) {
                $userCreationCount2022[$month] = 0;
            }
        }

        // Remplir les mois manquants avec un compte de 0 pour l'année 2021
        foreach ($allMonths as $month) {
            if (!isset($userCreationCount2021[$month])) {
                $userCreationCount2021[$month] = 0;
            }
        }

        // Préparer les données pour l'année 2023
        $chartData2023 = [['Mois', 'Nombre de créations']];
        foreach ($allMonths as $month) {
            $chartData2023[] = [$month, $userCreationCount2023[$month]];
        }

        // Préparer les données pour l'année 2022
        $chartData2022 = [['Mois', 'Nombre de créations']];
        foreach ($allMonths as $month) {
            $chartData2022[] = [$month, $userCreationCount2022[$month]];
        }

        // Préparer les données pour l'année 2021
        $chartData2021 = [['Mois', 'Nombre de créations']];
        foreach ($allMonths as $month) {
            $chartData2021[] = [$month, $userCreationCount2021[$month]];
        }

        // Retourner les trois ensembles de données dans un tableau associatif
        return [
            'chartData2023' => $chartData2023,
            'chartData2022' => $chartData2022,
            'chartData2021' => $chartData2021
        ];
    }


    private function getUserData(): array
    {
        $user = new User();
        $userData = $user->getAll();
        $formattedDates = [];

        foreach ($userData as $user) {
            $timestamp = strtotime($user['creation_date']);
            $formattedDates[] = date('Y-m-d', $timestamp);
        }
        return $formattedDates;
    }

}

