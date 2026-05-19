<main>
  <section class="page-hero">
    <div class="container">
      <div class="page-hero__inner reveal">
        <span class="section__tag">Desarrollo</span>
        <h1>Development Theme</h1>
        <p>Una copia de trabajo de tu tema en la que puedes iterar sin afectar la tienda en producción.</p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section__header reveal">
        <h2>¿Qué es un Development Theme?</h2>
        <p>Cuando ejecutas <code class="code-inline">shopify theme dev</code>, Shopify crea un tema marcado como "development" vinculado a tu sesión.</p>
      </div>
      <div class="grid grid--3 reveal-group">
        <article class="card">
          <div class="card__icon">🔀</div>
          <h3>Aislado de producción</h3>
          <p>Los clientes nunca ven el tema de desarrollo. Solo tú accedes mediante una URL especial que el CLI proporciona.</p>
        </article>
        <article class="card">
          <div class="card__icon">♻️</div>
          <h3>Hot reload</h3>
          <p>El CLI detecta cambios en tus archivos locales y los sube automáticamente. El navegador se refresca solo.</p>
        </article>
        <article class="card">
          <div class="card__icon">📋</div>
          <h3>Datos reales</h3>
          <p>Trabajas con productos, colecciones y configuraciones reales de tu tienda, no con datos inventados.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="section section--dark">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Estructura</span>
        <h2>Archivos de un tema Shopify</h2>
      </div>
      <div class="reveal">
        <div class="file-tree">
          <?php
          $tree = [
            'mi-tema/' => [
              'layout/'     => ['theme.liquid', 'password.liquid'],
              'templates/'  => ['index.json', 'product.json', 'collection.json', 'cart.liquid'],
              'sections/'   => ['header.liquid', 'footer.liquid', 'hero-banner.liquid'],
              'snippets/'   => ['product-card.liquid', 'icon-cart.liquid'],
              'assets/'     => ['base.css', 'global.js'],
              'locales/'    => ['es.json', 'en.json'],
              'config/'     => ['settings_schema.json', 'settings_data.json'],
            ]
          ];
          function renderTree(array $tree, int $depth = 0): void {
            foreach ($tree as $key => $value) {
              $indent = str_repeat('  ', $depth);
              if (is_array($value)) {
                echo "<div class='tree-folder'>{$indent}<span class='tree-icon'>📁</span> <strong>" . htmlspecialchars($key) . "</strong></div>";
                renderTree($value, $depth + 1);
              } else {
                $ext  = pathinfo($value, PATHINFO_EXTENSION);
                $icon = match($ext) { 'liquid'=>'🧪','json'=>'📋','css'=>'🎨','js'=>'⚡', default=>'📄' };
                echo "<div class='tree-file'>{$indent}<span class='tree-icon'>{$icon}</span> " . htmlspecialchars($value) . "</div>";
              }
            }
          }
          renderTree($tree);
          ?>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Flujo</span>
        <h2>Ciclo de desarrollo típico</h2>
      </div>
      <div class="steps reveal-group">
        <?php
        $steps = [
          ['Clonar el tema',       'Descarga el tema base con <code>shopify theme pull</code> o créalo con <code>shopify theme init</code>.'],
          ['Lanzar dev server',    'Ejecuta <code>shopify theme dev --store=tu-tienda.myshopify.com</code> para hot reload.'],
          ['Editar localmente',    'Modifica los archivos <code>.liquid</code>, JSON y CSS. Los cambios se sincronizan al instante.'],
          ['Previsualizar',        'El CLI te da una URL con <code>?preview_theme_id=XXX</code> para ver el resultado.'],
          ['Publicar',             'Usa <code>shopify theme push</code> y publica el tema desde el admin de Shopify.'],
        ];
        foreach ($steps as $i => [$title, $desc]): ?>
          <div class="step">
            <div class="step__num"><?php echo $i + 1; ?></div>
            <div class="step__content">
              <h3><?php echo htmlspecialchars($title); ?></h3>
              <p><?php echo $desc; ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>