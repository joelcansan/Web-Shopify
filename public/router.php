<?php
$uri = $_SERVER['REQUEST_URI'];
$parsedPath = parse_url($uri, PHP_URL_PATH);

// Debug temporal
if ($parsedPath === '/debug.php') {
    require __DIR__ . '/debug.php';
    exit;
}

// Servir archivos estáticos desde public/
$publicFile = __DIR__ . $parsedPath;
if (file_exists($publicFile) && is_file($publicFile)) {
    $ext = pathinfo($publicFile, PATHINFO_EXTENSION);
    $mimeTypes = [
        'css' => 'text/css', 'js' => 'application/javascript',
        'png' => 'image/png', 'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg',
        'gif' => 'image/gif', 'svg' => 'image/svg+xml', 'ico' => 'image/x-icon',
        'woff' => 'font/woff', 'woff2' => 'font/woff2', 'webp' => 'image/webp',
    ];
    if (isset($mimeTypes[$ext])) {
        header('Content-Type: ' . $mimeTypes[$ext]);
        readfile($publicFile);
        exit;
    }
}

// Servir assets desde assets/
if (str_starts_with($parsedPath, '/assets/')) {
    $assetFile = dirname(__DIR__) . $parsedPath;
    if (file_exists($assetFile)) {
        $ext = pathinfo($assetFile, PATHINFO_EXTENSION);
        $mimeTypes = [
            'css' => 'text/css', 'js' => 'application/javascript',
            'png' => 'image/png', 'jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg',
            'gif' => 'image/gif', 'svg' => 'image/svg+xml', 'ico' => 'image/x-icon',
            'woff' => 'font/woff', 'woff2' => 'font/woff2', 'webp' => 'image/webp',
        ];
        if (isset($mimeTypes[$ext])) {
            header('Content-Type: ' . $mimeTypes[$ext]);
            readfile($assetFile);
            exit;
        }
    }
}

// Todo lo demás va a index.php
require __DIR__ . '/index.php';