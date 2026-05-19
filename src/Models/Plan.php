<?php
declare(strict_types=1);

namespace Models;

use Core\Database;

class Plan
{
    public static function all(): array
    {
        $pdo = Database::getInstance();
        $stmt = $pdo->query('SELECT * FROM planes ORDER BY orden ASC');
        $planes = $stmt->fetchAll();

        foreach ($planes as $plan) {
            $stmt2 = $pdo->prepare('SELECT texto, incluido FROM plan_features WHERE plan_id = ? ORDER BY incluido DESC');
            $stmt2->execute([$plan->id]);
            $plan->features = $stmt2->fetchAll();
        }

        return $planes;
    }
}