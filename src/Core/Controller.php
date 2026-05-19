<?php
declare(strict_types=1);

namespace Core;

abstract class Controller
{
    /**
     * Renderiza un template dentro del layout principal.
     *
     * @param string $template  Ruta relativa dentro de templates/ (ej: 'home/index')
     * @param array  $data      Variables que estarán disponibles en el template
     */
    protected function render(string $template, array $data = []): void
    {
        // Extraer datos para que estén disponibles en el template
        extract($data, EXTR_SKIP);

        $templatePath = BASE_PATH . '/templates/' . $template . '.php';

        if (!file_exists($templatePath)) {
            http_response_code(500);
            echo "<h1>Template no encontrado: {$templatePath}</h1>";
            return;
        }

        // El layout hace include del template a través de $content
        $content = $templatePath;

        require BASE_PATH . '/templates/layouts/main.php';
    }
}