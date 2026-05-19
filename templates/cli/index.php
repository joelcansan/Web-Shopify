<main>
  <section class="page-hero">
    <div class="container">
      <div class="page-hero__inner reveal">
        <span class="section__tag">Herramienta de desarrollo</span>
        <h1>Shopify CLI</h1>
        <p>La interfaz de línea de comandos oficial para desarrolladores de temas y apps de Shopify.</p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section__header reveal"><h2>Instalación</h2></div>
      <div class="grid grid--3 reveal-group">
        <div class="code-card">
          <div class="code-card__header">macOS (Homebrew)</div>
          <pre class="code-block"><code>brew tap shopify/shopify
brew install shopify-cli</code></pre>
        </div>
        <div class="code-card">
          <div class="code-card__header">npm (global)</div>
          <pre class="code-block"><code>npm install -g @shopify/cli @shopify/theme</code></pre>
        </div>
        <div class="code-card">
          <div class="code-card__header">Verificar</div>
          <pre class="code-block"><code>shopify version
shopify help</code></pre>
        </div>
      </div>
    </div>
  </section>

  <section class="section section--dark">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Referencia</span>
        <h2>Comandos desde la base de datos</h2>
      </div>
      <?php foreach ($comandos as $categoria => $cmds): ?>
        <div class="reveal" style="margin-bottom: 40px;">
          <h3 style="color: var(--green); font-size:.75rem; font-weight:800; letter-spacing:.1em; text-transform:uppercase; margin-bottom:16px;">
            <?php echo htmlspecialchars(ucfirst($categoria)); ?>
          </h3>
          <div class="table-wrapper">
            <table class="data-table">
              <thead>
                <tr><th>Comando</th><th>Descripción</th><th>Opciones</th></tr>
              </thead>
              <tbody>
                <?php foreach ($cmds as $cmd): ?>
                <tr>
                  <td><code class="code-inline"><?php echo htmlspecialchars($cmd->comando); ?></code></td>
                  <td><?php echo htmlspecialchars($cmd->descripcion); ?></td>
                  <td><code class="code-inline code-inline--sm"><?php echo htmlspecialchars($cmd->opciones ?? '—'); ?></code></td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Flujo típico</span>
        <h2>Sesión de desarrollo completa</h2>
      </div>
      <div class="code-card reveal">
        <div class="code-card__header">Terminal</div>
        <pre class="code-block"><code># 1. Autenticarse
shopify auth login --store=mi-tienda.myshopify.com

# 2. Crear tema desde Dawn
shopify theme init mi-tema
cd mi-tema

# 3. Lanzar servidor de desarrollo
shopify theme dev --store=mi-tienda.myshopify.com

# 4. Subir cambios
shopify theme push --store=mi-tienda.myshopify.com

# 5. Validar el tema
shopify theme check</code></pre>
      </div>
    </div>
  </section>
</main>