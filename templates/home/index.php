<main>
  <section class="hero">
    <div class="container hero__inner">
      <div class="hero__badge reveal">Guía completa</div>
      <h1 class="hero__title reveal">Todo lo que necesitas saber sobre <span class="text-green">Shopify</span></h1>
      <p class="hero__subtitle reveal">Aprende Liquid, el CLI, los planes, la interfaz y cómo montar tu primer tema desde cero.</p>
      <div class="hero__cta reveal">
        <a href="/tutorial" class="btn btn--primary">Empezar ahora</a>
        <a href="/liquid" class="btn btn--outline">Ver Liquid</a>
      </div>
    </div>
    <div class="hero__scroll-indicator" aria-hidden="true">
      <div class="scroll-dot"></div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Fundamentos</span>
        <h2>¿Qué es Shopify?</h2>
        <p>Una plataforma de comercio electrónico SaaS que permite crear y gestionar tiendas online sin necesidad de infraestructura propia.</p>
      </div>
      <div class="grid grid--3 reveal-group">
        <?php foreach ($cards as $card): ?>
          <article class="card">
            <div class="card__icon" aria-hidden="true"><?php echo htmlspecialchars($card->icono ?? '📦'); ?></div>
            <h3><?php echo htmlspecialchars($card->titulo); ?></h3>
            <p><?php echo htmlspecialchars($card->contenido); ?></p>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section section--dark">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Arquitectura</span>
        <h2>¿Cómo está construido Shopify?</h2>
      </div>
      <div class="grid grid--2 reveal-group">
        <div class="feature-block">
          <h3><span class="feature-block__num">01</span> Frontend: Liquid + Temas</h3>
          <p>La capa visual se construye con temas basados en el lenguaje de plantillas <strong>Liquid</strong>. Puedes usar temas del marketplace o crear los tuyos.</p>
        </div>
        <div class="feature-block">
          <h3><span class="feature-block__num">02</span> Backend: APIs de Shopify</h3>
          <p>Admin API (GraphQL/REST), Storefront API, Customer API y más. Permiten integrar apps, automatizaciones y headless commerce.</p>
        </div>
        <div class="feature-block">
          <h3><span class="feature-block__num">03</span> Apps y extensiones</h3>
          <p>El App Store de Shopify tiene más de 8.000 aplicaciones. Puedes crear apps privadas o públicas con cualquier stack.</p>
        </div>
        <div class="feature-block">
          <h3><span class="feature-block__num">04</span> Shopify CLI</h3>
          <p>Herramienta de línea de comandos para hacer push/pull de temas, lanzar servidores de desarrollo y gestionar apps.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Explora</span>
        <h2>Todo el contenido</h2>
      </div>
      <div class="grid grid--3 reveal-group">
        <?php
        $nav_cards = [
          ['/liquid',            '🧪', 'Liquid',            'El lenguaje de plantillas de Shopify. Variables, filtros, tags y lógica de negocio.'],
          ['/development-theme', '🎨', 'Development Theme', 'Qué es, para qué sirve y cómo se usa un tema de desarrollo.'],
          ['/interfaz',          '🖥️', 'Interfaz',          'Recorrido completo por el panel de administración de Shopify.'],
          ['/cli',               '⌨️', 'Shopify CLI',       'Comandos esenciales para desarrollar temas y apps desde la terminal.'],
          ['/planes',            '💳', 'Planes',            'Compara los planes de Shopify y elige el que mejor se adapta.'],
          ['/tutorial',          '🚀', 'Tutorial',          'Guía paso a paso para empezar tu primer proyecto con Shopify.'],
        ];
        foreach ($nav_cards as [$url, $icon, $title, $desc]): ?>
          <a href="<?php echo $url; ?>" class="card card--link">
            <div class="card__icon" aria-hidden="true"><?php echo $icon; ?></div>
            <h3><?php echo htmlspecialchars($title); ?></h3>
            <p><?php echo htmlspecialchars($desc); ?></p>
            <span class="card__arrow" aria-hidden="true">→</span>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="section section--shapes" aria-hidden="true">
    <div class="shapes-track">
      <?php for ($i = 0; $i < 16; $i++): ?>
        <div class="shape-item shape-item--<?php echo ($i % 4) + 1; ?>"></div>
      <?php endfor; ?>
    </div>
  </section>
</main>