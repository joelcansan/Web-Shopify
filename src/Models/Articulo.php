<?php
declare(strict_types=1);

namespace Models;

use Core\Database;

class Articulo
{
    public static function bySeccion(string $seccion): array
    {
        $pdo = Database::getInstance();
        if ($pdo === null) return [];

        $stmt = $pdo->prepare(
            'SELECT * FROM articulos WHERE seccion = ? AND activo = 1 ORDER BY orden ASC'
        );
        $stmt->execute([$seccion]);
        return $stmt->fetchAll();
    }
}