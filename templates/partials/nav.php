<header class="site-header">
  <nav class="nav container" role="navigation" aria-label="Menú principal">
    <a href="/" class="nav__logo" aria-label="Inicio ShopifyGuía">
      <span class="nav__logo-icon" aria-hidden="true">
        <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
          <rect width="28" height="28" rx="6" fill="#95BF47"/>
          <path d="M9 8h6.5a3.5 3.5 0 0 1 0 7H9V8zm0 7h7a4 4 0 0 1 0 8H9v-8z" fill="#fff" opacity=".9"/>
        </svg>
      </span>
      <span class="nav__logo-text">Shopify<strong>Guía</strong></span>
    </a>

    <input type="checkbox" id="nav-toggle" class="nav__toggle-checkbox" aria-hidden="true" />
    <label for="nav-toggle" class="nav__toggle" aria-label="Abrir menú">
      <span></span><span></span><span></span>
    </label>

    <ul class="nav__links" role="list">
      <?php
      $nav_items = [
        ['/',                   'Inicio'],
        ['/liquid',             'Liquid'],
        ['/development-theme',  'Dev Theme'],
        ['/interfaz',           'Interfaz'],
        ['/cli',                'CLI'],
        ['/planes',             'Planes'],
        ['/tutorial',           'Tutorial'],
      ];
      foreach ($nav_items as [$path, $label]):
        $active = ($current_path === $path) ? 'nav__link--active' : '';
      ?>
        <li>
          <a href="<?php echo $path; ?>" class="nav__link <?php echo $active; ?>">
            <?php echo htmlspecialchars($label); ?>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </nav>
</header>