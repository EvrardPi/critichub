<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\Create;
use App\Forms\Register;
use App\Forms\Login;
use App\Models\User;
use App\Core\SQL;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use App\Core\Mailer;
use App\Helper;
use App\Middlewares\CheckAuth;


class UsersReviews {

    
    public function fillUserReviewFromObject()
    {
        $data = json_decode(file_get_contents("php://input"));
        $userReview = new UserReview();

        $userReview->setBackgroundColor($data->backgroundColor);
        $userReview->setCritique($data->critique);
        $userReview->setCritiqueBackgroundColor($data->critiqueBackgroundColor);
        $userReview->setCritiqueTitle($data->critiqueTitle);
        $userReview->setFont($data->font);
        $userReview->setFontColor($data->fontColor);
        $userReview->setMovieAffiche($data->movieAffiche);
        $userReview->setMovieName($data->movieName);
        $userReview->setMovieTopimg($data->movieTopimg);
        $userReview->setSloganMovie($data->sloganMovie);
        $userReview->setTemplate($data->template);

        $userReview->save();
        $this->view();
    }

    public function view(): void
    {
        $view = new View("user/review", "front");
    }
}