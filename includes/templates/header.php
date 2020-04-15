<?php
    // Definir un nombre para cachear
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);

    // Definir archivo para cachear (puede ser .php también)
    //este es el directorio donde se vana guaradr las paginas cacheadas
  $archivoCache = 'cache/'.$pagina.'.php';
  // Cuanto tiempo deberá estar este archivo almacenado, para que se vuelva a cahear con informacio probablemente actualizada dependiendo si hubo cambios obvio
  $tiempo = 36000;
  // Checar que el archivo exista, el tiempo sea el adecuado y muestralo
  if (file_exists($archivoCache) && time() - $tiempo < filemtime($archivoCache)) {
    include($archivoCache);
      exit;
  }
  // Si el archivo no existe, o el tiempo de cacheo ya se venció genera uno nuevo
  ob_start();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
  <link rel="stylesheet" type="text/css" href="css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald|PT+Sans&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css" />
  <?php
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);

    if($pagina == 'invitados' || $pagina == 'index'){
      echo '<link rel="stylesheet" type="text/css" href="css/colorbox.css">';
    }else if($pagina == 'conferencia'){
      echo 'https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/css/lightbox.min.css';
    }
   ?>
  <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body class="<?php echo $pagina; ?>">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <!-- Add your site or application content here -->
  <header class="site-header">
    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
          <a href=""><i class="fab fa-pinterest-p"></i></a>
          <a href=""><i class="fab fa-youtube"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
        </nav>
        <div class="informacion-evento">
          <div class="clearfix">
            <p class="fecha"><i class="far fa-calendar-alt"></i>10-12-dic</p>
            <p class="ciudad"><i class="fas fa-map-marker-alt"></i> Colombia</p>
          </div>
            <h1 class="nombre-sitio">Gdlwebcamp</h1>
            <p class="slogan">la mejor coferencia de <span>Diseño web</span></p>
        </div>

      </div>
    </div>
  </header>
  <div class="barra">
    <div class="contenedor clearfix">
      <div class="logo">
        <a href="index.php">
         <img src="img/logo.svg">
        </a>
      </div>
      <div class="menu-movil">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <nav class="navegacion-principal clearfix">
        <a href="conferencia.php">Conferencia</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="registro.php">Reservaciones</a>
      </nav>
    </div><!--contenedor-->
  </div><!--barra-->