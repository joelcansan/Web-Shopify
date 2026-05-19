<?php
echo "<h1>Variables de entorno</h1>";
echo "DB_HOST: " . getenv('DB_HOST') . "<br>";
echo "DB_PORT: " . getenv('DB_PORT') . "<br>";
echo "DB_NAME: " . getenv('DB_NAME') . "<br>";
echo "DB_USER: " . getenv('DB_USER') . "<br>";
echo "DB_PASSWORD: " . (getenv('DB_PASSWORD') ? '***SET***' : 'EMPTY') . "<br>";

echo "<h1>Test conexión</h1>";
try {
    $host = getenv('DB_HOST');
    $port = getenv('DB_PORT') ?: '3306';
    $name = getenv('DB_NAME');
    $user = getenv('DB_USER');
    $pass = getenv('DB_PASSWORD');
    
    $pdo = new PDO(
        "mysql:host={$host};port={$port};dbname={$name};charset=utf8mb4",
        $user,
        $pass
    );
    echo "Conexión OK<br>";
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM planes");
    $row = $stmt->fetch(PDO::FETCH_OBJ);
    echo "Planes en BD: " . $row->total;
} catch (Exception $e) {
    echo "ERROR: " . $e->getMessage();
}