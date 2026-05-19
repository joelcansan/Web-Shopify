<?php
declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Models\Articulo;

class InterfazController extends Controller
{
    public function index(): void
    {
        $secciones = Articulo::bySeccion('interfaz');

        $this->render('interfaz/index', [
            'page_title' => 'Interfaz de Shopify',
            'secciones'  => $secciones,
        ]);
    }
}