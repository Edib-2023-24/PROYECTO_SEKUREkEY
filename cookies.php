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
                    <img src="./img/desktop/imagen_candado.webp" alt="">
                </section>

                <section class="texto">
                  
            <h1>USO DE COOKIES</h1>
            <section class="texto_comprimido">
            <p>Este sitio web puede utilizar cookies técnicas (pequeños archivos de información que el servidor envía al ordenador de quien accede a la página) para llevar a cabo determinadas funciones que son consideradas imprescindibles para el correcto funcionamiento y visualización del sitio. Las cookies utilizadas tienen, en todo caso, carácter temporal, con la única finalidad de hacer más eficaz la navegación, y desaparecen al terminar la sesión del usuario. En ningún caso, estas cookies proporcionan por sí mismas datos de carácter personal y no se utilizarán para la recogida de los mismos.</p>
            </section>
           
                </section>

            </section>
<section class="texto_bloque_uno">

<p>Mediante el uso de cookies también es posible que el servidor donde se encuentra la web reconozca el navegador utilizado por el usuario con la finalidad de que la navegación sea más sencilla, permitiendo, por ejemplo, el acceso de los usuarios que se hayan registrado previamente a las áreas, servicios, promociones o concursos reservados exclusivamente a ellos sin tener que registrarse en cada visita. También se pueden utilizar para medir la audiencia, parámetros de tráfico, controlar el progreso y número de entradas, etc, siendo en estos casos cookies prescindibles técnicamente pero beneficiosas para el usuario. Este sitio web no instalará cookies prescindibles sin el consentimiento previo del usuario.</p>
</section>
<section class="texto_bloque_uno">
<h1>POLÍTICA DE ENLACES</h1>
<p>Desde el sitio web, es posible que se redirija a contenidos de terceros sitios web. Dado que el RESPONSABLE no puede controlar siempre los contenidos introducidos por los terceros en sus respectivos sitios web, no asume ningún tipo de responsabilidad respecto a dichos contenidos. En todo caso, procederá a la retirada inmediata de cualquier contenido que pudiera contravenir la legislación nacional o internacional, la moral o el orden público, procediendo a la retirada inmediata de la redirección a dicho sitio web, poniendo en conocimiento de las autoridades competentes el contenido en cuestión.</p>
</section>



        </main>
        <?php include 'footer.php'?>
    </div>

</body>

</html>