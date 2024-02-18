<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- SEO = Básico -->
    <!-- Cada página del sitio tiene que ser diferente el título y la descripción -->
    <title></title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Etiquetas Open Graph y Twitter Card, para crear el SEO de Redes Sociales -->
    <meta property="og:title" content="Título de tu página" />
    <meta property="og:description" content="Descripción de tu página" />
    <meta property="og:image" content="URL de la imagen que quieres mostrar en las redes sociales" />
    <meta property="og:url" content="URL de tu página" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Título de tu página" />
    <meta name="twitter:description" content="Descripción de tu página" />
    <meta name="twitter:image" content="URL de la imagen que quieres mostrar en Twitter" />

    <!-- App Web, inidicar al navegador que elementos mostrar en un JSON -->
    <link rel="manifest" href="site.webmanifest" />
    <!-- icono de acceso para IOS -->
    <link rel="apple-touch-icon" href="icon.png" />
    <!-- Recordar que favicon.ico tiene que estar en el directorio inicial -->

    <!-- links de estilos -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Se cambia el tema de algunos navegadores -->
    <meta name="theme-color" content="#fafafa" />
    <!-- Código de las plataformas de Análisis -->
    <script></script>
    <!-- Scripts a cargar antes de la renderización -->
    <script src="preloader.js"></script>
</head>

<body>
    <div id="container">
        <?php  include 'header.php'?>
        <main class="main_index">
            <section class="box_contenedor_foto">
              
                <section class="foto">
                    <img src="./img/desktop/imagen_candado.avif" alt="">
                </section>

                <section class="texto">
                  
            <h2>Mantén tus datos privados en secreto</h2>
            <section class="texto_comprimido">
            <p>Las contraseñas débiles o robadas siguen siendo uno de los principales factores de las filtraciones de datos. Este hecho se confirma año tras año con diversos informes. Sin embargo, tú puedes ser una excepción. Para reducir el riesgo de que roben tus datos, usa contraseñas fiables y protégelas. A veces es lo único que necesitas. Nuestro generador de contraseñas seguras
             te ayudará a ti y a tu empresa a dar el primer paso para tener cuentas en línea más seguras protegidas por contraseñas más sólidas.</p>
            </section>
           
                </section>

            </section>
<section class="texto_bloque_uno">
<h2>Refuerza la seguridad con un generador de contraseñas</h2>
<p>Un generador de contraseñas es una herramienta web que crea contraseñas únicas y aleatorias basadas en recomendaciones de seguridad. Los mejores generadores de contraseñas son aquellos que te permiten personalizar la configuración de acuerdo con tus requisitos. Nuestra herramienta cuenta con numerosas opciones para obtener el mejor resultado.</p>
</section>
<section class="texto_bloque_uno">
<h2>¿Son seguros los generadores de contraseñas?</h2>
<p>Una contraseña creada por un generador de contraseñas será mucho más segura que cualquiera que se te pueda ocurrir. La seguridad de un generador de contraseñas depende de dos factores: la seguridad del sitio web generador de contraseñas y el software que emplea.
    Nuestro sitio generador de contraseñas cuenta con un cifrado seguro, que garantiza que ningún delincuente pueda acceder a las contraseñas generadas. En cuanto al software, nuestros algoritmos se aseguran de que cada contraseña generada sea lo bastante complicada, segura y única para proteger tus cuentas.</p>
</section>


        </main>
        <?php include 'footer.php'?>
    </div>

</body>

</html>