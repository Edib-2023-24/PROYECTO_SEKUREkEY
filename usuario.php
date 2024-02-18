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
    <meta
      property="og:image"
      content="URL de la imagen que quieres mostrar en las redes sociales"
    />
    <meta property="og:url" content="URL de tu página" />
    <meta property="og:type" content="website" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Título de tu página" />
    <meta name="twitter:description" content="Descripción de tu página" />
    <meta
      name="twitter:image"
      content="URL de la imagen que quieres mostrar en Twitter"
    />

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
    
  </head>
  <body>
    <div id="container">
      <?php  include 'header_usuario.php'?>
      <main class="main_index">
      <section class="box_principal_index">
                <h1>Genere una contraseña aleatoria y segura al instante con la herramienta online de SEKUREKEY</h1>
                <section class="box_resultado_index">
                <p id="salidaTexto"></p>
                    <section class="resultado_index" id="resultado_usuario"></section>
                    <button class="botones_inicio" onclick="passwordAleatorioUsuario()"><span>GENERAR</span></button>
                    
                <form id="formularioResultado" action="funciones.php" method="post">
                    <input type="hidden" id="resultadoInput" name="resultadoPassword" value="">
                    <button class="botones_inicio " type="submit"
                        onclick="envioPassword()"><span>GUARDAR</span></button>
                </form>

                </section>
                <section class="box_opciones_index">
                    <section class="texto_personalizar_index">
                        <h3>PERSONALICE SUS CONTRASEÑAS</h3>
                    </section>
                    <section class="box_longitud_index">
                        <section class="longitud_index">
                            <h3>Longitud de la contraseña</h3>
                            <input type="range" name="rango" id="rango_password_usuario" min="1" max="50" value="1">
                            <div id="valor_actual_usuario"></div>
                        </section>
                        <section class="checkBox_index">
                            <div class="content">
                                <label class="checkBox">
                                    <input id="mayusculas" type="checkbox">
                                    <div class="transition"></div>
                                </label>
                            </div>
                            <div class="content">
                                <label class="checkBox">
                                    <input id="minusculas" type="checkbox">
                                    <div class="transition"></div>
                                </label>
                            </div>
                            <div class="content">
                                <label class="checkBox">
                                    <input id="digitos" type="checkbox">
                                    <div class="transition"></div>
                                </label>
                            </div>
                            <div class="content">
                                <label class="checkBox">
                                    <input id="caracteres" type="checkbox">
                                    <div class="transition"></div>
                                </label>
                            </div>

                        </section>
                        <section class="opciones_index">
                            <h3>Mayusculas</h3>
                            <h3>Minusculas</h3>
                            <h3>Digitos</h3>
                            <h3>Caracteres</h3>
                        </section>
                    </section>


                </section>
            </section>



 
 
  



      </main>
      <?php include 'footer.php'?>
    </div>
<script src="usuario.js"></script>
  </body>
</html>