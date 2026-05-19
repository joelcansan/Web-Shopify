<?php
declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Models\Tip;

class TutorialController extends Controller
{
    public function index(): void
    {
        $tips = Tip::bySeccion('tutorial');

        $this->render('tutorial/index', [
            'page_title'    => 'Tutorial · Primeros pasos',
            'tips'          => $tips,
        ]);
    }
}