<main>
  <section class="page-hero">
    <div class="container">
      <div class="page-hero__inner reveal">
        <span class="section__tag">Precios</span>
        <h1>Planes de Shopify</h1>
        <p>Compara los planes disponibles y elige el que mejor encaja con tu proyecto.</p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="pricing-grid reveal-group">
        <?php foreach ($planes as $plan): ?>
          <div class="pricing-card <?php echo $plan->destacado ? 'pricing-card--featured' : ''; ?>">
            <?php if ($plan->destacado): ?>
              <div class="pricing-card__badge">Más popular</div>
            <?php endif; ?>
            <div class="pricing-card__header">
              <h3><?php echo htmlspecialchars($plan->nombre); ?></h3>
              <div class="pricing-card__price">
                <span class="pricing-card__currency">$</span>
                <span class="pricing-card__amount"><?php echo number_format((float)$plan->precio, 0); ?></span>
                <span class="pricing-card__period">/mes</span>
              </div>
              <p><?php echo htmlspecialchars($plan->descripcion); ?></p>
            </div>
            <ul class="pricing-card__features" role="list">
              <?php foreach ($plan->features as $feature): ?>
                <li class="pricing-card__feature <?php echo $feature->incluido ? 'pricing-card__feature--ok' : 'pricing-card__feature--no'; ?>">
                  <span><?php echo $feature->incluido ? '✓' : '✗'; ?></span>
                  <?php echo htmlspecialchars($feature->texto); ?>
                </li>
              <?php endforeach; ?>
            </ul>
            <a href="https://www.shopify.com/pricing" target="_blank" rel="noopener"
               class="btn <?php echo $plan->destacado ? 'btn--primary' : 'btn--outline'; ?> btn--full">
              Ver en Shopify ↗
            </a>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section section--dark">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Consejo</span>
        <h2>¿Qué plan elegir?</h2>
      </div>
      <div class="grid grid--2 reveal-group">
        <article class="card">
          <h3>🐣 Empezando</h3>
          <p>Comienza con <strong>Basic</strong>. Si solo quieres probar, usa <strong>Starter</strong>. Los primeros 3 días son gratis.</p>
        </article>
        <article class="card">
          <h3>📈 Creciendo</h3>
          <p>Cuando tus ventas superen los 3.000€/mes, el plan <strong>Shopify</strong> compensa por la reducción de comisiones.</p>
        </article>
        <article class="card">
          <h3>🏭 Volumen alto</h3>
          <p><strong>Advanced</strong> y <strong>Plus</strong> son para negocios con procesos complejos o ventas B2B.</p>
        </article>
        <article class="card">
          <h3>👨‍💻 Desarrolladores</h3>
          <p>Usa una <strong>Partner Development Store</strong> gratuita e ilimitada para desarrollar temas y apps sin coste.</p>
        </article>
      </div>
    </div>
  </section>
</main>