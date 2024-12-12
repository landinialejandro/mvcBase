<html lang="es">

<head>
    <!-- Metadatos esenciales del documento HTML -->
    <meta charset="UTF-8"> <!-- Codificación de caracteres UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Responsive design para todos los dispositivos -->
    <title><?php echo SITE_NAME ?></title> <!-- Título de la página -->

    <!-- Favicon para navegadores estándar -->
    <link rel="icon" type="image/x-icon" href="dist/logo/favicon.ico">

    <!-- Metadatos adicionales para SEO y descripción -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="IgnitionApp | Dashboard">
    <meta name="author" content="Landini">
    <meta name="description" content="IgnitionApp es una aplicación para el fácil desarrollo de aplicaciones">
    <meta name="keywords" content="vanilla JS, dashboard, app development">

    <!-- Enlace al archivo principal de estilos CSS -->

    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo URL_ROOT; ?>/dist/bs-icons/bootstrap-icons.min.css">

</head>

<body>
    <nav class="context-menu" id="context-menu">
        <ul id="menu-options" class="context-menu-tree">
        </ul>
    </nav>
    <!-- Preloader principal que afecta la visibilidad del app-wrapper. 
         Se muestra mientras se carga la aplicación para mejorar la experiencia de usuario. -->
    <div class="preloader" aria-label="Cargando aplicación">
        <div class="spinner"></div>
    </div>

    <!-- Contenedor principal de toda la aplicación -->
    <div class="app-wrapper">
        <!-- app-main: Contenedor principal de contenido de la aplicación.
             Este contenedor ocupa el espacio restante de la pantalla, excepto el footer. -->
        <main class="app-main">

            <!-- aside.sidebar: Barra lateral (sidebar) que contiene opciones de navegación.
                 Esta sección ocupa el alto completo de app-main, y es más angosta que el content. -->
            <aside class="sidebar expanded" aria-label="Menú lateral">

                <!-- sidebar-brand: Branding del sidebar que contiene el botón de cierre, el logo y el nombre de la aplicación. -->
                <header class="sidebar-brand">
                    <button class="sidebar-toggle" aria-label="Cerrar menú lateral"> <i class="bi bi-list"></i></button>
                    <div class="brand-content">
                        <div class="brand-logo" aria-hidden="true">
                            <svg aria-hidden="true" height="24" viewBox="0 0 24 24" version="0.1" width="24"
                                data-view-component="true" class="svg-icon" fill="currentColor">
                                <path
                                    d="M14.27 1.63c0 3.55 1.87 5.33 3.48 7.02 1.54 1.62 3.01 3.16 3.01 6.1 0 4.81-3.75 8.25-8.57 8.25-4.81 0-8.94-3.42-8.94-8.25 0-2.04.96-4.01 2.51-4.9.3-.18.67.01.8.33C7.56 12.68 8.8 12.64 9.44 12c.39-.39.47-1.12 0-2.06-2.4-4.81 1.86-8.28 4.2-8.85.34-.08.62.2.63.54ZM12.18 21.5c4.06 0 7.07-2.84 7.07-6.75 0-2.34-1.09-3.49-2.68-5.16l-.02-.02c-1.44-1.52-3.14-3.35-3.65-6.56a6.15 6.15 0 0 0-1.91 1.76c-.79 1.14-1.15 2.63-.22 4.49.6 1.2.78 2.74-.28 3.79-.66.66-1.76 1.1-2.96.59-.75-.32-1.35-.95-1.84-1.79-.57.7-.95 1.74-.95 2.89 0 3.85 3.29 6.75 7.43 6.75Z">
                                </path>
                            </svg>
                        </div>
                        <h2 class="brand-name">IgnitionApp</h2>
                    </div>
                </header>

                <!-- sidebar-content: Contenido principal del sidebar, que ocupa el alto restante entre el brand y el footer del sidebar. -->
                <nav class="sidebar-content" aria-label="Navegación principal">
                </nav>

                <!-- sidebar-footer: Sección del footer en el sidebar, contiene el avatar del usuario, su nombre y el botón de configuración. -->
                <footer class="sidebar-footer">
                    <div class="user-content">
                        <div class="user-avatar" aria-hidden="true">
                            <!-- Avatar del usuario (no se lee en lectores de pantalla) -->
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <h2 class="user-name">Alejandro</h2> <!-- Nombre del usuario -->
                    </div>
                    <button class="settings-button" aria-label="Abrir configuración"><i class="bi bi-gear"></i></button>
                    <!-- Botón para abrir configuración -->
                </footer>
            </aside>

            <!-- content: Contenedor principal de contenido -->
            <section class="content">
                <!-- content-header: Encabezado con título, campo de búsqueda y breadcrumb -->
                <header class="content-header">
                    <h2 class="content-title">Home</h2>

                    <!-- Campo de búsqueda -->
                    <form class="search-form" role="search" aria-label="Buscar">
                        <input type="text" class="search-input" placeholder="Buscar..." aria-label="Campo de búsqueda">
                        <button type="submit" class="search-button"><i class="bi bi-search"></i></button>
                        <!-- Icono de búsqueda -->
                    </form>

                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Home</li>
                        </ol>
                    </nav>
                </header>

                <div class="content-body-preloader hidden">
                    <div class="spinner"></div>
                </div>
                <!-- content-body: Área principal para mostrar contenido dinámico -->
                <article class="content-body">

                    <h1 class="title">
                        <?php echo $data['title']; ?>
                    </h1>
                    <p class="subtitle">MVC Model test</p>
                    
                </article>

            </section>
        </main>

        <!-- app-footer: Footer fijo al pie de la pantalla que contiene información adicional.
             En este footer se muestran en línea el copyright, estado y versión de la aplicación. -->
        <footer class="app-footer">
            <div class="footer-copyright"> <!-- Copyright -->
                © 2024 IgnitionApp
            </div>
            <div class="footer-status"> <!-- Estado de la aplicación o conexión -->
                Estado
            </div>
            <div class="footer-version"> <!-- Versión de la aplicación -->
                Versión 1.0.0
            </div>
        </footer>
    </div>

    <!-- JavaScript principal para la aplicación.
         Se carga al final del body para no afectar el rendimiento de carga inicial de la página. -->
    <script src="<?php echo URL_ROOT; ?>/dist/handlebars/handlebars.js"></script>
    <script type="module" src="<?php echo URL_ROOT; ?>/js/layout.js"></script>
</body>

</html>