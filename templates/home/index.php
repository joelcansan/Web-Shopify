<main>

  <!-- HERO -->
  <section class="hero">
    <div class="container hero__inner">
      <div class="hero__eyebrow reveal">
        <div class="hero__badge">Guía completa actualizada</div>
      </div>
      <h1 class="hero__title reveal">
        <span class="hero__title-line">La guía definitiva</span>
        <span class="hero__title-line">sobre <span class="text-green">Shopify</span></span>
      </h1>
      <p class="hero__subtitle reveal">
        Aprende Liquid, el CLI, los planes, la interfaz y cómo montar tu primer tema desde cero. Todo en un solo lugar.
      </p>
      <div class="hero__cta reveal">
        <a href="/tutorial" class="btn btn--primary">Empezar ahora</a>
        <a href="/liquid" class="btn btn--outline">Ver Liquid →</a>
      </div>
      <div class="hero__stats reveal">
        <div class="hero__stat">
          <span class="hero__stat-number">1.75M+</span>
          <span class="hero__stat-label">Comerciantes activos</span>
        </div>
        <div class="hero__stat">
          <span class="hero__stat-number">175</span>
          <span class="hero__stat-label">Países disponibles</span>
        </div>
        <div class="hero__stat">
          <span class="hero__stat-number">8.000+</span>
          <span class="hero__stat-label">Apps en el marketplace</span>
        </div>
      </div>
    </div>
    <div class="hero__scroll-indicator" aria-hidden="true">
      <span>scroll</span>
      <div class="scroll-dot"></div>
    </div>
  </section>

  <!-- QUÉ ES SHOPIFY — cards desde BD -->
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

  <!-- ARQUITECTURA -->
  <section class="section section--dark">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Arquitectura</span>
        <h2>¿Cómo está construido Shopify?</h2>
        <p>Shopify combina una capa frontend basada en Liquid con un potente backend de APIs para construir experiencias de comercio completas.</p>
      </div>
      <div class="grid grid--2 reveal-group">
        <div class="feature-block">
          <h3><span class="feature-block__num">01</span> Frontend: Liquid + Temas</h3>
          <p>La capa visual se construye con temas basados en el lenguaje de plantillas <strong>Liquid</strong>. Puedes usar temas del marketplace o crear los tuyos desde cero.</p>
        </div>
        <div class="feature-block">
          <h3><span class="feature-block__num">02</span> Backend: APIs de Shopify</h3>
          <p>Admin API (GraphQL/REST), Storefront API y Customer API. Permiten integrar apps, automatizaciones y arquitecturas headless.</p>
        </div>
        <div class="feature-block">
          <h3><span class="feature-block__num">03</span> Apps y extensiones</h3>
          <p>El App Store de Shopify tiene más de 8.000 aplicaciones. Puedes crear apps privadas o públicas con cualquier stack tecnológico.</p>
        </div>
        <div class="feature-block">
          <h3><span class="feature-block__num">04</span> Shopify CLI</h3>
          <p>Herramienta de línea de comandos para hacer push/pull de temas, lanzar servidores de desarrollo y gestionar apps desde la terminal.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- POR QUÉ SHOPIFY -->
  <section class="section">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Ventajas</span>
        <h2>¿Por qué elegir Shopify?</h2>
        <p>Shopify no es solo una tienda online. Es un ecosistema completo para vender en cualquier canal.</p>
      </div>
      <div class="grid grid--3 reveal-group">
        <article class="card">
          <div class="card__icon">🔒</div>
          <h3>Seguridad incluida</h3>
          <p>SSL, cumplimiento PCI DSS nivel 1, protección contra fraude y copias de seguridad automáticas. Sin configuración.</p>
        </article>
        <article class="card">
          <div class="card__icon">📱</div>
          <h3>Venta multicanal</h3>
          <p>Vende en tu tienda web, Instagram, TikTok, Facebook, Amazon, WhatsApp y en persona con Shopify POS desde un solo panel.</p>
        </article>
        <article class="card">
          <div class="card__icon">🤖</div>
          <h3>IA integrada</h3>
          <p>Shopify Magic genera descripciones de productos, responde emails de soporte y sugiere acciones basadas en tus datos de venta.</p>
        </article>
        <article class="card">
          <div class="card__icon">📦</div>
          <h3>Gestión de inventario</h3>
          <p>Control de stock en múltiples ubicaciones, variantes ilimitadas, gestión de proveedores y alertas de stock bajo.</p>
        </article>
        <article class="card">
          <div class="card__icon">🌍</div>
          <h3>Venta internacional</h3>
          <p>Shopify Markets permite vender en varios países con precios locales, monedas, idiomas y dominios propios por mercado.</p>
        </article>
        <article class="card">
          <div class="card__icon">📊</div>
          <h3>Analíticas avanzadas</h3>
          <p>Informes de ventas, comportamiento de clientes, embudos de conversión, cohortes y exportación a Google Analytics o Meta Pixel.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ECOSISTEMA -->
  <section class="section section--dark">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Ecosistema</span>
        <h2>El ecosistema Shopify</h2>
        <p>Shopify va mucho más allá de una tienda. Aquí están todas las piezas del puzzle.</p>
      </div>
      <div class="grid grid--2 reveal-group">
        <div class="feature-block feature-block--icon">
          <span class="feature-block__icon">🧪</span>
          <div>
            <h3>Liquid</h3>
            <p>El lenguaje de plantillas que da vida al frontend de todos los temas de Shopify. Seguro, flexible y fácil de aprender.</p>
          </div>
        </div>
        <div class="feature-block feature-block--icon">
          <span class="feature-block__icon">⌨️</span>
          <div>
            <h3>Shopify CLI</h3>
            <p>Desarrolla temas y apps desde la terminal. Con hot reload, sync automático y validación de código integrada.</p>
          </div>
        </div>
        <div class="feature-block feature-block--icon">
          <span class="feature-block__icon">🎨</span>
          <div>
            <h3>Online Store 2.0</h3>
            <p>La arquitectura moderna de temas con sections everywhere, bloques, metafields y JSON templates para máxima flexibilidad.</p>
          </div>
        </div>
        <div class="feature-block feature-block--icon">
          <span class="feature-block__icon">🔗</span>
          <div>
            <h3>Storefront API</h3>
            <p>Construye experiencias headless con React, Next.js o cualquier framework. Shopify como backend, tú controlas el frontend.</p>
          </div>
        </div>
        <div class="feature-block feature-block--icon">
          <span class="feature-block__icon">🤝</span>
          <div>
            <h3>Partner Program</h3>
            <p>Crea una cuenta de Partner gratuita para acceder a Development Stores ilimitadas, revenue share y recursos de formación.</p>
          </div>
        </div>
        <div class="feature-block feature-block--icon">
          <span class="feature-block__icon">⚡</span>
          <div>
            <h3>Shopify Functions</h3>
            <p>Personaliza la lógica de negocio del backend: descuentos, envíos, pagos y validaciones con código que corre en el edge.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- NAVEGACIÓN A SECCIONES -->
  <section class="section">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Explora</span>
        <h2>Todo el contenido</h2>
        <p>Cada sección está pensada para llevarte de cero a experto en ese tema concreto.</p>
      </div>
      <div class="grid grid--3 reveal-group">
        <?php
        $nav_cards = [
          ['/liquid',            '🧪', 'Liquid',            'El lenguaje de plantillas de Shopify. Variables, filtros, tags, objetos globales y ejemplos reales.'],
          ['/development-theme', '🎨', 'Development Theme', 'Qué es, para qué sirve y cómo se usa un tema de desarrollo en Shopify paso a paso.'],
          ['/interfaz',          '🖥️', 'Interfaz',          'Recorrido completo por cada sección del panel de administración de Shopify.'],
          ['/cli',               '⌨️', 'Shopify CLI',       'Todos los comandos esenciales para desarrollar temas y apps desde la terminal.'],
          ['/planes',            '💳', 'Planes',            'Compara los planes de Shopify con precios reales y elige el que mejor encaja.'],
          ['/tutorial',          '🚀', 'Tutorial',          'Guía paso a paso para empezar tu primer proyecto con Shopify desde cero.'],
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

  <!-- DATOS CLAVE -->
  <section class="section section--dark">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">En números</span>
        <h2>Shopify en cifras</h2>
      </div>
      <div class="grid grid--3 reveal-group">
        <div class="stat-block">
          <span class="stat-block__number">$235B+</span>
          <span class="stat-block__label">en ventas procesadas en 2023</span>
        </div>
        <div class="stat-block">
          <span class="stat-block__number">10%</span>
          <span class="stat-block__label">del e-commerce en EE.UU.</span>
        </div>
        <div class="stat-block">
          <span class="stat-block__number">700M+</span>
          <span class="stat-block__label">compradores únicos al año</span>
        </div>
        <div class="stat-block">
          <span class="stat-block__number">99.99%</span>
          <span class="stat-block__label">uptime garantizado</span>
        </div>
        <div class="stat-block">
          <span class="stat-block__number">100+</span>
          <span class="stat-block__label">pasarelas de pago compatibles</span>
        </div>
        <div class="stat-block">
          <span class="stat-block__number">20+</span>
          <span class="stat-block__label">años en el mercado (desde 2006)</span>
        </div>
      </div>
    </div>
  </section>

  <!-- STRIP ANIMADO -->
  <section class="section section--shapes" aria-hidden="true">
    <div class="shapes-track">
      <?php for ($i = 0; $i < 16; $i++): ?>
        <div class="shape-item shape-item--<?php echo ($i % 4) + 1; ?>"></div>
      <?php endfor; ?>
    </div>
  </section>

</main>