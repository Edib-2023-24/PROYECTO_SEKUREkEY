
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
    <script src="preloader.js"></script>
  </head>
  <body>
    <div id="container">
      <?php  include 'header.php'?>
      <main class="main_index">
      
      
      <section class="box_login">
  <img src="./img/desktop/account.png" alt="">
  
  
</section>
<h1>REGISTRO REALIZADO</h1>


 <div class="login-box">
 
    <form action="funciones.php" method="post">
      <div class="user-box">
        <input type="email" name="email" id="email" required="">
        <label>Email</label>
      </div> <div class="user-box">
        <input type="password" name="password" id="password" required="">
        <label>Password</label>
      </div>
      <button class="boton_login" type="submit">LOGIN</button>
      <input type="hidden" name="accion" value="sesion">
      <button onclick="window.location.href='registro.php'" class="boton_login">REGISTRARSE</button>
    

     
      
    </form>
    
   
  </div>
  

 

      </main>
      
      <?php include 'footer.php'?>
    </div>

  </body>
</html>