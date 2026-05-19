<main>
  <section class="page-hero">
    <div class="container">
      <div class="page-hero__inner reveal">
        <span class="section__tag">Panel de administración</span>
        <h1>Interfaz de Shopify</h1>
        <p>Recorrido completo por el admin de Shopify: dónde está cada cosa y para qué sirve.</p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section__header reveal">
        <h2>Secciones del panel</h2>
        <p>Accesible en <code class="code-inline">tu-tienda.myshopify.com/admin</code></p>
      </div>
      <div class="grid grid--2 reveal-group">
        <?php foreach ($secciones as $item): ?>
          <div class="feature-block feature-block--icon">
            <span class="feature-block__icon" aria-hidden="true"><?php echo htmlspecialchars($item->icono ?? '📌'); ?></span>
            <div>
              <h3><?php echo htmlspecialchars($item->titulo); ?></h3>
              <p><?php echo htmlspecialchars($item->contenido); ?></p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section section--dark">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Theme Editor</span>
        <h2>El editor visual de temas</h2>
        <p>Accesible desde Tienda online → Temas → Personalizar.</p>
      </div>
      <div class="grid grid--3 reveal-group">
        <article class="card">
          <div class="card__icon">🧱</div>
          <h3>Secciones y bloques</h3>
          <p>Arrastra, reordena y configura secciones visuales con bloques internos configurables.</p>
        </article>
        <article class="card">
          <div class="card__icon">🎨</div>
          <h3>Configuración global</h3>
          <p>Colores, tipografías y valores del <code>settings_schema.json</code> editables de forma visual.</p>
        </article>
        <article class="card">
          <div class="card__icon">📱</div>
          <h3>Preview responsive</h3>
          <p>Cambia entre vista desktop, tablet y móvil en tiempo real sin salir del editor.</p>
        </article>
      </div>
    </div>
  </section>
</main>