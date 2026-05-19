<?php
declare(strict_types=1);

namespace Core;

class Router
{
    private array $routes = [];

    public function get(string $path, string $handler): void
    {
        $this->routes['GET'][$path] = $handler;
    }

    public function dispatch(): void
    {
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';
        $uri    = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
        $uri    = rtrim($uri, '/') ?: '/';

        $handler = $this->routes[$method][$uri] ?? null;

        if ($handler === null) {
            http_response_code(404);
            echo $this->render404();
            return;
        }

        [$controllerName, $action] = explode('@', $handler);
        $fullClass = "Controllers\\{$controllerName}";

        if (!class_exists($fullClass)) {
            http_response_code(500);
            echo "<h1>Controlador no encontrado: {$fullClass}</h1>";
            return;
        }

        $controller = new $fullClass();

        if (!method_exists($controller, $action)) {
            http_response_code(500);
            echo "<h1>Acción no encontrada: {$action}</h1>";
            return;
        }

        $controller->$action();
    }

    private function render404(): string
    {
        return '<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8">
        <title>404 · ShopifyGuía</title>
        <link rel="stylesheet" href="/assets/css/style.css">
        </head><body style="display:flex;align-items:center;justify-content:center;min-height:100vh;flex-direction:column;gap:16px;">
        <h1 style="font-size:4rem;color:#95BF47;">404</h1>
        <p style="color:#8a96aa;">Página no encontrada</p>
        <a href="/" class="btn btn--primary">Volver al inicio</a>
        </body></html>';
    }
}