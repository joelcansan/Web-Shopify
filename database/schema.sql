-- ============================================================
-- ShopifyGuía · Schema de base de datos
-- ============================================================

SET NAMES utf8mb4;
SET time_zone = '+00:00';

-- ------------------------------------------------------------
-- Tabla: planes
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS planes (
  id            INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre        VARCHAR(60)  NOT NULL,
  precio        DECIMAL(10,2) NOT NULL DEFAULT 0.00,
  descripcion   TEXT,
  destacado     TINYINT(1)   NOT NULL DEFAULT 0,
  orden         TINYINT      NOT NULL DEFAULT 0,
  created_at    TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS plan_features (
  id        INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  plan_id   INT UNSIGNED NOT NULL,
  texto     VARCHAR(200) NOT NULL,
  incluido  TINYINT(1)   NOT NULL DEFAULT 1,
  FOREIGN KEY (plan_id) REFERENCES planes(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Tabla: comandos_cli
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS comandos_cli (
  id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  comando     VARCHAR(150) NOT NULL,
  descripcion TEXT         NOT NULL,
  opciones    VARCHAR(255),
  categoria   VARCHAR(60)  NOT NULL DEFAULT 'temas',
  created_at  TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Tabla: tips
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS tips (
  id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  icono       VARCHAR(10)  NOT NULL DEFAULT '💡',
  titulo      VARCHAR(120) NOT NULL,
  contenido   TEXT         NOT NULL,
  seccion     VARCHAR(60)  NOT NULL DEFAULT 'general',
  orden       TINYINT      NOT NULL DEFAULT 0,
  created_at  TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ------------------------------------------------------------
-- Tabla: articulos (contenido dinámico para cada sección)
-- ------------------------------------------------------------
CREATE TABLE IF NOT EXISTS articulos (
  id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  seccion     VARCHAR(60)  NOT NULL,
  titulo      VARCHAR(200) NOT NULL,
  contenido   TEXT         NOT NULL,
  icono       VARCHAR(10)  DEFAULT NULL,
  orden       TINYINT      NOT NULL DEFAULT 0,
  activo      TINYINT(1)   NOT NULL DEFAULT 1,
  created_at  TIMESTAMP    DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================================
-- DATOS INICIALES
-- ============================================================

-- Planes
INSERT INTO planes (nombre, precio, descripcion, destacado, orden) VALUES
('Starter',  5.00,    'Vende por redes sociales, WhatsApp o mensajes. Sin tienda web completa.', 0, 1),
('Basic',    29.00,   'Para emprendedores que lanzan su primera tienda online.',                  0, 2),
('Shopify',  79.00,   'El plan más popular para negocios en crecimiento.',                        1, 3),
('Advanced', 299.00,  'Para negocios con alto volumen y necesidades avanzadas de informes.',      0, 4),
('Plus',     2300.00, 'Solución enterprise para marcas de alto crecimiento y volumen.',           0, 5);

-- Features por plan
INSERT INTO plan_features (plan_id, texto, incluido) VALUES
(1, 'Botón de compra embebible',        1),
(1, 'Gestión básica de pedidos',        1),
(1, 'Shopify Payments',                 1),
(1, 'Tienda online completa',           0),
(1, 'Theme Editor',                     0),

(2, 'Tienda online completa',           1),
(2, 'Hasta 2 cuentas de staff',         1),
(2, 'Comisión transacción: 2%',         1),
(2, 'Informes básicos',                 1),
(2, 'Informes avanzados',               0),

(3, 'Hasta 5 cuentas de staff',         1),
(3, 'Comisión transacción: 1%',         1),
(3, 'Informes estándar',                1),
(3, 'IOSS para ventas UE',              1),
(3, 'Informes personalizados',          0),

(4, 'Hasta 15 cuentas de staff',        1),
(4, 'Comisión transacción: 0.5%',       1),
(4, 'Informes personalizados',          1),
(4, 'Precios por mercado',              1),
(4, 'API de informes',                  1),

(5, 'Comisión transacción: 0.15%',      1),
(5, 'Flow (automatizaciones)',          1),
(5, 'B2B nativo',                       1),
(5, 'Soporte dedicado 24/7',            1),
(5, 'Múltiples tiendas (expansiones)',  1);

-- Comandos CLI
INSERT INTO comandos_cli (comando, descripcion, opciones, categoria) VALUES
('shopify theme dev',              'Servidor de desarrollo con hot reload',              '--store, --theme, --port',               'temas'),
('shopify theme push',             'Sube archivos locales al tema de Shopify',           '--store, --theme, --only, --ignore',     'temas'),
('shopify theme pull',             'Descarga el tema de Shopify a local',               '--store, --theme, --only',               'temas'),
('shopify theme list',             'Lista todos los temas de la tienda',                '--store',                                'temas'),
('shopify theme init',             'Crea un tema desde una plantilla',                  '--name, --clone-url',                    'temas'),
('shopify theme delete',           'Elimina un tema de la tienda',                      '--store, --theme, -f',                   'temas'),
('shopify theme share',            'Crea una URL de preview pública del tema',          '--store',                                'temas'),
('shopify theme check',            'Valida el tema con Theme Check (linter)',           '--category, --severity',                 'temas'),
('shopify auth login',             'Autenticarse con tu cuenta de Shopify',             '--store',                                'auth'),
('shopify auth logout',            'Cerrar sesión de la CLI',                           '—',                                     'auth'),
('shopify app dev',                'Servidor de desarrollo para apps',                  '--api-key',                              'apps'),
('shopify app generate extension', 'Genera una extensión para tu app',                  '--type, --name',                        'apps');

-- Tips para tutorial
INSERT INTO tips (icono, titulo, contenido, seccion, orden) VALUES
('🗂️', 'Usa Git desde el principio',  'Inicia un repo Git en tu tema desde el día uno. El CLI no versiona: Git sí.',           'tutorial', 1),
('🧪', 'Aprende Liquid gradualmente', 'Empieza con variables y filtros. Añade lógica cuando realmente la necesites.',           'tutorial', 2),
('📐', 'Respeta la estructura Dawn',   'Dawn está muy bien organizado. Aprende su patrón antes de crear tu propia estructura.', 'tutorial', 3),
('🔍', 'Theme Check es tu amigo',     'Corre shopify theme check regularmente. Detecta errores de Liquid y rendimiento.',       'tutorial', 4),
('📱', 'Mobile first siempre',         'Más del 70% del tráfico en Shopify es móvil. Diseña para móvil primero.',               'tutorial', 5),
('⚡', 'Cuidado con el JavaScript',    'Menos JS = mejores conversiones. Dawn usa módulos ES y muy poco JavaScript.',           'tutorial', 6),
('📋', 'Documenta tu schema',          'Los schemas bien documentados facilitan la vida al cliente en el Theme Editor.',         'tutorial', 7),
('🌍', 'Prepara i18n desde el inicio', 'Usa {{ ''key'' | t }} y locales/es.json para que el tema sea multilingüe desde el inicio.', 'tutorial', 8);

-- Artículos para home
INSERT INTO articulos (seccion, titulo, contenido, icono, orden) VALUES
('home', 'Plataforma SaaS',  'Shopify es un software como servicio. Pagas una suscripción y obtienes hosting, seguridad, actualizaciones y soporte incluidos.', '🏪', 1),
('home', 'Listo para vender','Gestión de productos, pagos, envíos, impuestos e inventario desde un único panel. Acepta pagos con Shopify Payments o pasarelas externas.', '⚡', 2),
('home', 'Escala global',    'Más de 1.75 millones de comerciantes en 175 países. Multimoneda, multilingüe y con CDN global.', '🌍', 3),

('liquid', 'Seguro por diseño', 'Liquid no puede ejecutar código arbitrario del servidor. Los comerciantes pueden editar plantillas sin riesgo.',       '🔒', 1),
('liquid', 'Flexible',          'Soporta variables, filtros, etiquetas de control de flujo, iteraciones y acceso a todos los objetos del contexto.',  '🔧', 2),
('liquid', 'Open Source',       'Liquid es open source y se usa también en Jekyll, HubSpot, Salesforce y otras plataformas.',                         '📂', 3),

('interfaz', 'Inicio',       'Dashboard con métricas clave: ventas del día, visitas, conversiones y tareas pendientes.',                 '🏠', 1),
('interfaz', 'Pedidos',      'Gestión completa: ver, procesar, reembolsar, crear manualmente, imprimir albaranes y exportar.',           '📦', 2),
('interfaz', 'Productos',    'Añadir y editar productos, variantes, imágenes, SEO, precios, inventario y colecciones.',                  '🛍️', 3),
('interfaz', 'Clientes',     'Base de datos de clientes: historial de compras, segmentos, notas, etiquetas y datos de contacto.',        '👥', 4),
('interfaz', 'Analíticas',   'Informes de ventas, comportamiento, fuentes de tráfico y productos más vendidos.',                         '📊', 5),
('interfaz', 'Marketing',    'Campañas, automatizaciones, descuentos, tarjetas de regalo e integraciones con Google Ads y Meta.',        '📣', 6),
('interfaz', 'Tienda online','Editor del tema, páginas, navegación, dominios y preferencias de la tienda.',                              '🎨', 7),
('interfaz', 'Configuración','Plan, facturación, permisos, notificaciones, idiomas, envíos y todo lo estructural.',                      '🔧', 8);