<?php
declare(strict_types=1);

namespace Controllers;

use Core\Controller;

class DevThemeController extends Controller
{
    public function index(): void
    {
        $this->render('dev-theme/index', [
            'page_title' => 'Development Theme',
        ]);
    }
}