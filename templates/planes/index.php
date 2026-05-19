<main>
  <section class="page-hero">
    <div class="container">
      <div class="page-hero__inner reveal">
        <span class="section__tag">Precios</span>
        <h1>Planes de Shopify</h1>
        <p>Precios reales actualizados. Elige el plan que mejor encaja con tu proyecto.</p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">

      <!-- TOGGLE MENSUAL / ANUAL -->
      <div class="billing-toggle reveal">
        <input type="checkbox" id="billing-switch" class="billing-toggle__checkbox" />
        <label for="billing-switch" class="billing-toggle__track">
          <span class="billing-toggle__option billing-toggle__option--monthly">Pago mensual</span>
          <span class="billing-toggle__option billing-toggle__option--yearly">Pago anual (-25%)</span>
          <span class="billing-toggle__thumb"></span>
        </label>
      </div>

      <!-- GRID DE PLANES -->
      <div class="pricing-grid reveal-group">
        <?php
        // Precios mensuales y anuales reales
        $precios = [
          'Basic'    => ['mensual' => 32,   'anual' => 22,   'promo' => '1 € al mes los primeros 3 meses'],
          'Grow'     => ['mensual' => 92,   'anual' => 62,   'promo' => '1 € al mes los primeros 3 meses'],
          'Advanced' => ['mensual' => 384,  'anual' => 289,  'promo' => '1 € al mes los primeros 3 meses'],
          'Plus'     => ['mensual' => 2100, 'anual' => 2100, 'promo' => 'Disponible en períodos de 1 a 3 años'],
        ];
        foreach ($planes as $plan):
          $p = $precios[$plan->nombre] ?? ['mensual' => $plan->precio, 'anual' => $plan->precio, 'promo' => ''];
        ?>
        <div class="pricing-card <?php echo $plan->destacado ? 'pricing-card--featured' : ''; ?>">

          <!-- Promo banner -->
          <?php if ($p['promo']): ?>
            <div class="pricing-card__promo <?php echo $plan->nombre === 'Plus' ? 'pricing-card__promo--blue' : ''; ?>">
              <?php echo htmlspecialchars($p['promo']); ?>
            </div>
          <?php endif; ?>

          <div class="pricing-card__header">
            <div class="pricing-card__name-row">
              <h3><?php echo htmlspecialchars($plan->nombre); ?></h3>
              <?php if ($plan->destacado): ?>
                <span class="pricing-card__badge">Más popular</span>
              <?php endif; ?>
            </div>
            <p class="pricing-card__desc"><?php echo htmlspecialchars($plan->descripcion); ?></p>

            <div class="pricing-card__price-wrap">
              <p class="pricing-card__desde">A partir de</p>

              <!-- Precio mensual -->
              <div class="pricing-card__price price--monthly">
                <span class="pricing-card__amount"><?php echo $p['mensual']; ?></span>
                <div class="pricing-card__currency-wrap">
                  <span class="pricing-card__currency">€</span>
                  <span class="pricing-card__period">EUR/mes</span>
                </div>
              </div>

              <!-- Precio anual -->
              <div class="pricing-card__price price--yearly" style="display:none">
                <span class="pricing-card__amount"><?php echo $p['anual']; ?></span>
                <div class="pricing-card__currency-wrap">
                  <span class="pricing-card__currency">€</span>
                  <span class="pricing-card__period">EUR/mes<br><small>factura anual</small></span>
                </div>
              </div>
            </div>
          </div>

          <ul class="pricing-card__features" role="list">
            <?php foreach ($plan->features as $feature): ?>
              <li class="pricing-card__feature <?php echo $feature->incluido ? 'pricing-card__feature--ok' : 'pricing-card__feature--no'; ?>">
                <span class="pricing-card__check" aria-hidden="true">
                  <?php echo $feature->incluido ? '✓' : '✗'; ?>
                </span>
                <?php echo htmlspecialchars($feature->texto); ?>
              </li>
            <?php endforeach; ?>
          </ul>

          <a href="https://www.shopify.com/es/precios" target="_blank" rel="noopener"
             class="btn <?php echo $plan->destacado ? 'btn--primary' : 'btn--outline'; ?> btn--full">
            Empezar con <?php echo htmlspecialchars($plan->nombre); ?>
          </a>
        </div>
        <?php endforeach; ?>
      </div>

      <p class="pricing-note reveal">* Los precios mostrados son orientativos en EUR. Consulta shopify.com/es/precios para precios exactos según tu región.</p>

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
          <p>Comienza con <strong>Basic</strong>. Aprovecha la promo de <strong>1€/mes los primeros 3 meses</strong>.</p>
        </article>
        <article class="card">
          <h3>📈 Creciendo</h3>
          <p>Cuando tu equipo crezca, <strong>Grow</strong> te da hasta 5 empleados y mejores tarifas de envío.</p>
        </article>
        <article class="card">
          <h3>🏭 Volumen alto</h3>
          <p><strong>Advanced</strong> y <strong>Plus</strong> son para operaciones globales, B2B y equipos grandes.</p>
        </article>
        <article class="card">
          <h3>👨‍💻 Desarrolladores</h3>
          <p>Usa una <strong>Partner Development Store</strong> gratuita e ilimitada para desarrollar sin coste.</p>
        </article>
      </div>
    </div>
  </section>
</main>

<!-- Toggle JS (mínimo imprescindible, solo para el switch de precios) -->
<script>
  const toggle = document.getElementById('billing-switch');
  toggle.addEventListener('change', function() {
    const monthly = document.querySelectorAll('.price--monthly');
    const yearly  = document.querySelectorAll('.price--yearly');
    if (this.checked) {
      monthly.forEach(el => el.style.display = 'none');
      yearly.forEach(el => el.style.display = 'flex');
    } else {
      monthly.forEach(el => el.style.display = 'flex');
      yearly.forEach(el => el.style.display = 'none');
    }
  });
</script>