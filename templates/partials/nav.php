<header class="site-header">
  <nav class="nav container" role="navigation" aria-label="Menú principal">

    <a href="/" class="nav__logo" aria-label="Inicio">
      <span class="nav__logo-text">Tuto<strong>fy</strong></span>
    </a>

    <!-- Links desktop -->
    <ul class="nav__links" role="list">
      <?php
      $nav_items = [
        ['/',                  'Inicio',     'Qué es Shopify'],
        ['/liquid',            'Liquid',     'Lenguaje de plantillas'],
        ['/development-theme', 'Dev Theme',  'Temas de desarrollo'],
        ['/interfaz',          'Interfaz',   'Panel de administración'],
        ['/cli',               'CLI',        'Comandos esenciales'],
        ['/planes',            'Planes',     'Precios y características'],
        ['/tutorial',          'Tutorial',   'Primeros pasos'],
      ];
      foreach ($nav_items as [$path, $label, $sub]):
        $active = ($current_path === $path) ? 'nav__link--active' : '';
      ?>
        <li>
          <a href="<?php echo $path; ?>" class="nav__link <?php echo $active; ?>">
            <?php echo htmlspecialchars($label); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>

    <!-- Botón hamburguesa -->
    <button class="nav__toggle" id="navToggle"
            aria-label="Abrir menú" aria-expanded="false">
      <span class="nav__toggle-bar"></span>
      <span class="nav__toggle-bar"></span>
      <span class="nav__toggle-bar"></span>
    </button>

  </nav>
</header>

<!-- Overlay -->
<div class="drawer-overlay" id="drawerOverlay"></div>

<!-- Drawer lateral -->
<aside class="drawer" id="drawer" aria-label="Menú de navegación" aria-hidden="true">

  <div class="drawer__header">
    <a href="/" class="nav__logo">
      <span class="nav__logo-text">Tuto<strong>fy</strong></span>
    </a>
    <button class="drawer__close" id="drawerClose" aria-label="Cerrar menú">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
        <path d="M5 5l10 10M15 5L5 15" stroke="currentColor" stroke-width="2"
              stroke-linecap="round"/>
      </svg>
    </button>
  </div>

  <nav class="drawer__nav">
    <p class="drawer__section-label">Navegación</p>
    <ul class="drawer__links" role="list">
      <?php foreach ($nav_items as [$path, $label, $sub]):
        $active = ($current_path === $path) ? 'drawer__link--active' : '';
      ?>
        <li>
          <a href="<?php echo $path; ?>" class="drawer__link <?php echo $active; ?>">
            <span class="drawer__link-text">
              <span class="drawer__link-title"><?php echo htmlspecialchars($label); ?></span>
              <span class="drawer__link-sub"><?php echo htmlspecialchars($sub); ?></span>
            </span>
            <svg class="drawer__link-arrow" width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path d="M6 3l5 5-5 5" stroke="currentColor" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>

  <div class="drawer__footer">
    <a href="https://www.shopify.com" target="_blank" rel="noopener"
       class="drawer__external">
      Ir a Shopify.com
      <svg width="14" height="14" viewBox="0 0 14 14" fill="none">
        <path d="M3 11L11 3M11 3H6M11 3v5" stroke="currentColor"
              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </a>
    <p class="drawer__footer-note">Recurso educativo no oficial</p>
  </div>

</aside>

<script>
(function() {
  const toggle  = document.getElementById('navToggle');
  const drawer  = document.getElementById('drawer');
  const overlay = document.getElementById('drawerOverlay');
  const close   = document.getElementById('drawerClose');

  if (!toggle || !drawer) return;

  function openDrawer() {
    drawer.classList.add('drawer--open');
    overlay.classList.add('drawer-overlay--visible');
    toggle.classList.add('nav__toggle--open');
    toggle.setAttribute('aria-expanded', 'true');
    drawer.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  }

  function closeDrawer() {
    drawer.classList.remove('drawer--open');
    overlay.classList.remove('drawer-overlay--visible');
    toggle.classList.remove('nav__toggle--open');
    toggle.setAttribute('aria-expanded', 'false');
    drawer.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  toggle.addEventListener('click', function(e) {
    e.stopPropagation();
    drawer.classList.contains('drawer--open') ? closeDrawer() : openDrawer();
  });

  close.addEventListener('click', closeDrawer);
  overlay.addEventListener('click', closeDrawer);

  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeDrawer();
  });
})();
</script>