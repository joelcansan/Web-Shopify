<?php
$uri = $_SERVER['REQUEST_URI'];
$parsedPath = parse_url($uri, PHP_URL_PATH);

// Servir assets estáticos desde la carpeta assets/ que está fuera de public/
if (str_starts_with($parsedPath, '/assets/')) {
    $assetFile = dirname(__DIR__) . $parsedPath;
    if (file_exists($assetFile)) {
        $ext = pathinfo($assetFile, PATHINFO_EXTENSION);
        $mimeTypes = [
            'css'  => 'text/css',
            'js'   => 'application/javascript',
            'png'  => 'image/png',
            'jpg'  => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'svg'  => 'image/svg+xml',
            'ico'  => 'image/x-icon',
            'woff' => 'font/woff',
            'woff2'=> 'font/woff2',
        ];
        if (isset($mimeTypes[$ext])) {
            header('Content-Type: ' . $mimeTypes[$ext]);
        }
        readfile($assetFile);
        exit;
    }
}

// Todo lo demás va a index.php
require __DIR__ . '/index.php';