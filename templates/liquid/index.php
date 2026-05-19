<main>
  <section class="page-hero">
    <div class="container">
      <div class="page-hero__inner reveal">
        <span class="section__tag">Lenguaje de plantillas</span>
        <h1>Liquid</h1>
        <p>El lenguaje de plantillas open source creado por Shopify para construir los frontends de las tiendas.</p>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section__header reveal">
        <h2>¿Qué es Liquid?</h2>
        <p>Liquid es un lenguaje de plantillas seguro, flexible y rápido. Shopify lo usa para renderizar el HTML de los temas.</p>
      </div>
      <div class="grid grid--3 reveal-group">
        <?php foreach ($cards as $card): ?>
          <article class="card">
            <div class="card__icon"><?php echo htmlspecialchars($card->icono ?? ''); ?></div>
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
        <span class="section__tag">Sintaxis</span>
        <h2>Tipos de etiquetas</h2>
      </div>
      <div class="grid grid--2 reveal-group">
        <div class="code-card">
          <div class="code-card__header"><span class="code-card__dot code-card__dot--output"></span>Output <code>{{ }}</code></div>
          <pre class="code-block"><code>{{ product.title }}
{{ product.price | money }}
{{ 'now' | date: '%d/%m/%Y' }}
{{ customer.name | upcase }}</code></pre>
          <p class="code-card__desc">Muestran valores en el HTML. Soportan filtros encadenados con <code>|</code>.</p>
        </div>
        <div class="code-card">
          <div class="code-card__header"><span class="code-card__dot code-card__dot--tag"></span>Logic <code>{% %}</code></div>
          <pre class="code-block"><code>{% if product.available %}
  <span>En stock</span>
{% else %}
  <span>Agotado</span>
{% endif %}</code></pre>
          <p class="code-card__desc">Control de flujo. No generan output directo.</p>
        </div>
        <div class="code-card">
          <div class="code-card__header"><span class="code-card__dot code-card__dot--loop"></span>Loops <code>{% for %}</code></div>
          <pre class="code-block"><code>{% for product in collection.products %}
  <h2>{{ product.title }}</h2>
  <p>{{ product.price | money }}</p>
{% endfor %}</code></pre>
          <p class="code-card__desc"><code>forloop.index</code>, <code>forloop.first</code>, <code>forloop.last</code> disponibles.</p>
        </div>
        <div class="code-card">
          <div class="code-card__header"><span class="code-card__dot code-card__dot--filter"></span>Filtros</div>
          <pre class="code-block"><code>{{ product.price | money }}
{{ 'hola' | capitalize }}
{{ image | img_url: '800x' }}
{{ content | strip_html | truncate: 150 }}</code></pre>
          <p class="code-card__desc">Transforman valores. Se encadenan con <code>|</code>.</p>
        </div>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section__header reveal">
        <span class="section__tag">Objetos globales</span>
        <h2>Objetos principales de Liquid</h2>
      </div>
      <div class="table-wrapper reveal">
        <table class="data-table">
          <thead>
            <tr><th>Objeto</th><th>Descripción</th><th>Ejemplo</th></tr>
          </thead>
          <tbody>
            <?php
            $objects = [
              ['product',    'Producto actual',     '{{ product.title }}'],
              ['collection', 'Colección actual',    '{{ collection.title }}'],
              ['cart',       'Carrito',             '{{ cart.total_price | money }}'],
              ['customer',   'Cliente autenticado', '{{ customer.name }}'],
              ['shop',       'Datos de la tienda',  '{{ shop.name }}'],
              ['settings',   'Config. del tema',    '{{ settings.color_primary }}'],
            ];
            foreach ($objects as [$obj, $desc, $ex]): ?>
            <tr>
              <td><code class="code-inline"><?php echo $obj; ?></code></td>
              <td><?php echo htmlspecialchars($desc); ?></td>
              <td><code class="code-inline code-inline--sm"><?php echo htmlspecialchars($ex); ?></code></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</main>