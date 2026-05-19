<?php
declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Models\Articulo;

class LiquidController extends Controller
{
    public function index(): void
    {
        $cards = Articulo::bySeccion('liquid');

        $this->render('liquid/index', [
            'page_title' => 'Liquid · El lenguaje de Shopify',
            'cards'      => $cards,
        ]);
    }
}