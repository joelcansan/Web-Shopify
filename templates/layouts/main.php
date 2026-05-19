<?php
$current_path = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$current_path = rtrim($current_path, '/') ?: '/';
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Guía completa sobre Shopify: Liquid, CLI, planes, temas y más." />
  <title><?php echo isset($page_title) ? htmlspecialchars($page_title) . ' · ShopifyGuía' : 'ShopifyGuía'; ?></title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="/assets/css/style.css" />
</head>
<body>

  <div class="bg-animated" aria-hidden="true">
    <div class="bg-shape bg-shape--1"></div>
    <div class="bg-shape bg-shape--2"></div>
    <div class="bg-shape bg-shape--3"></div>
    <div class="bg-shape bg-shape--4"></div>
  </div>

  <?php include BASE_PATH . '/templates/partials/nav.php'; ?>

  <?php require $content; ?>

  <?php include BASE_PATH . '/templates/partials/footer.php'; ?>

</body>
</html>