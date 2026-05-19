<main>
  <section class="page-hero">
    <div class="container">
      <div class="page-hero__inner reveal">
        <span class="section__tag">Guía práctica</span>
        <h1>Primeros pasos con Shopify</h1>
        <p>Desde cero hasta tu primer tema publicado. Sigue esta guía paso a paso.</p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Requisitos</span>
        <h2>Antes de empezar</h2>
      </div>
      <div class="grid grid--3 reveal-group">
        <article class="card">
          <div class="card__icon">🤝</div>
          <h3>Cuenta de Partner</h3>
          <p>Regístrate gratis en <strong>partners.shopify.com</strong>. Te da acceso a Development Stores ilimitadas sin coste.</p>
        </article>
        <article class="card">
          <div class="card__icon">💻</div>
          <h3>Entorno de desarrollo</h3>
          <p>Node.js 18+, npm y Git. El Shopify CLI se instala con npm o Homebrew en macOS.</p>
        </article>
        <article class="card">
          <div class="card__icon">📝</div>
          <h3>Editor de código</h3>
          <p>VS Code con la extensión <strong>Shopify Liquid</strong> para syntax highlighting y autocompletado.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="section section--dark">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Paso a paso</span>
        <h2>Tu primer tema con Dawn</h2>
      </div>
      <div class="steps reveal-group">
        <?php
        $steps = [
          ['Crear una Development Store',   'En tu dashboard de Partner, ve a Stores → Add store → Development store. Es completamente gratuita.', null],
          ['Instalar Shopify CLI',          'Instala el CLI con npm:', 'npm install -g @shopify/cli @shopify/theme'],
          ['Autenticarse',                  'Conecta el CLI con tu tienda:', 'shopify auth login --store=tu-tienda.myshopify.com'],
          ['Clonar Dawn',                   'Dawn es el tema base oficial de Shopify, open source:', "shopify theme init mi-primer-tema\ncd mi-primer-tema"],
          ['Servidor de desarrollo',        'Inicia el servidor local con hot reload:', 'shopify theme dev --store=tu-tienda.myshopify.com'],
          ['Editar tu primer archivo',      'Abre <code>sections/header.liquid</code> y modifica algo. Guarda y verás el cambio al instante.', null],
          ['Explorar el Theme Editor',      'En el admin ve a Tienda online → Temas → tu tema → Personalizar para editar visualmente.', null],
          ['Publicar el tema',              'Cuando estés listo:', "shopify theme push --store=tu-tienda.myshopify.com"],
        ];
        foreach ($steps as $i => [$title, $desc, $code]): ?>
          <div class="step">
            <div class="step__num"><?php echo $i + 1; ?></div>
            <div class="step__content">
              <h3><?php echo htmlspecialchars($title); ?></h3>
              <p><?php echo $desc; ?></p>
              <?php if ($code): ?>
                <pre class="code-block code-block--inline"><code><?php echo htmlspecialchars($code); ?></code></pre>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Tips desde la BD</span>
        <h2>Consejos para desarrolladores</h2>
      </div>
      <div class="grid grid--2 reveal-group">
        <?php foreach ($tips as $tip): ?>
          <article class="card card--tip">
            <div class="card__icon"><?php echo htmlspecialchars($tip->icono); ?></div>
            <h3><?php echo htmlspecialchars($tip->titulo); ?></h3>
            <p><?php echo htmlspecialchars($tip->contenido); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
</main>