<?php
declare(strict_types=1);

namespace Models;

use Core\Database;

class Tip
{
    public static function bySeccion(string $seccion): array
    {
        $pdo = Database::getInstance();
        if ($pdo === null) return [];

        $stmt = $pdo->prepare(
            'SELECT * FROM tips WHERE seccion = ? ORDER BY orden ASC'
        );
        $stmt->execute([$seccion]);
        return $stmt->fetchAll();
    }
}