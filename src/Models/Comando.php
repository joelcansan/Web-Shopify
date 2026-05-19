<?php
declare(strict_types=1);

namespace Models;

use Core\Database;

class Comando
{
    public static function allGrouped(): array
    {
        $pdo  = Database::getInstance();
        $stmt = $pdo->query('SELECT * FROM comandos_cli ORDER BY categoria, id');
        $rows = $stmt->fetchAll();

        $grouped = [];
        foreach ($rows as $row) {
            $grouped[$row->categoria][] = $row;
        }
        return $grouped;
    }
}