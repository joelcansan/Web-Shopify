<?php
declare(strict_types=1);

namespace Core;

use PDO;
use PDOException;

class Database
{
    private static ?PDO $instance = null;
    private static bool $failed = false;

    public static function getInstance(): ?PDO
    {
        if (self::$failed) return null;
        if (self::$instance !== null) return self::$instance;

        $host = getenv('DB_HOST')     ?: ($_ENV['DB_HOST']     ?? '');
        $port = getenv('DB_PORT')     ?: ($_ENV['DB_PORT']     ?? '3306');
        $name = getenv('DB_NAME')     ?: ($_ENV['DB_NAME']     ?? '');
        $user = getenv('DB_USER')     ?: ($_ENV['DB_USER']     ?? '');
        $pass = getenv('DB_PASSWORD') ?: ($_ENV['DB_PASSWORD'] ?? '');

        if (empty($host) || empty($name) || empty($user)) {
            self::$failed = true;
            return null;
        }

        try {
            self::$instance = new PDO(
                "mysql:host={$host};port={$port};dbname={$name};charset=utf8mb4",
                $user,
                $pass,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                    PDO::ATTR_TIMEOUT            => 5,
                ]
            );
        } catch (PDOException $e) {
            self::$failed = true;
            error_log('DB connection failed: ' . $e->getMessage());
            return null;
        }

        return self::$instance;
    }

    private function __construct() {}
    private function __clone() {}
}