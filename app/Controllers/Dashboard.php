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
    public function viewDashboard(array $errors = []): void
    {
        $view = new View("BackOffice/dashboard", "back");
        $view->assign("pageName", "Backoffice-Dashboard");
        $view->assign("errors", $errors);

        // Code pour créer et afficher le graphique
        $chartData = [
            ['Mois', 'Ventes'],
            ['Janvier', 1000],
            ['Février', 1500],
            ['Mars', 800],
        ];
        $view->assign("chartData", $chartData);

        $chartData2 = [
            ['Produit', 'Quantité'],
            ['Produit A', 50],
            ['Produit B', 30],
            ['Produit C', 20],
        ];
        $view->assign("chartData2", $chartData2);

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
}

