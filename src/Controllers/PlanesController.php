<?php
declare(strict_types=1);

namespace Controllers;

use Core\Controller;
use Models\Plan;

class PlanesController extends Controller
{
    public function index(): void
    {
        $planes = Plan::all();

        $this->render('planes/index', [
            'page_title' => 'Planes de Shopify',
            'planes'     => $planes,
        ]);
    }
}