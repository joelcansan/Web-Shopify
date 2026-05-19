<?php
declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Models\Comando;

class CliController extends Controller
{
    public function index(): void
    {
        $comandos = Comando::allGrouped();

        $this->render('cli/index', [
            'page_title' => 'Shopify CLI · Comandos esenciales',
            'comandos'   => $comandos,
        ]);
    }
}