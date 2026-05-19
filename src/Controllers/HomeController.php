<?php
declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Models\Articulo;

class HomeController extends Controller
{
    public function index(): void
    {
        $cards = Articulo::bySeccion('home');

        $this->render('home/index', [
            'page_title' => '¿Qué es Shopify?',
            'cards'      => $cards,
        ]);
    }
}