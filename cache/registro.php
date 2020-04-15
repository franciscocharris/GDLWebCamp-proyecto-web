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
    <link rel="stylesheet" href="css/main.css">

  <meta name="theme-color" content="#fafafa">
</head>

<body class="registro">
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
  <section class="seccion contenedor">
    <h2>Registro de Usuarios</h2>
    <form id="registro" class="registro" action="pagar.php" method="post">
      <div id="datos_usuario" class="registro caja clearfix">
        <div class="campo"> 
          <label for="nombre">Nombre:</label>
          <input type="text" name="nombre" id="nombre" placeholder="Tu Nombre">
        </div>
        <div class="campo"> 
          <label for="apellido">apellido:</label>
          <input type="text" name="apellido" id="apellido" placeholder="Tu apellido">
        </div>
        <div class="campo"> 
          <label for="email">Email:</label>
          <input type="email" name="email" id="email" placeholder="Tu Email">
        </div>
        <div id="error"></div>
      </div><!--fin de #datos_usuario-->
      <div id="paquetes" class="paquetes">
        <h3>Elije el numero de Boletos</h3>

        <ul class="lista-precios clearfix">
        <li>
          <div class="tabla-precio">
            <h3>pase por dia (viernes)</h3>
            <p class="numero">$30</p>
            <ul>
              <li>Bocadillos gratis</li>
              <li>todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
                <div class="orden">
                  <label for="pase_dia">Boletos deseados:</label>
                  <input type="number" min="0" id="pase_dia" size="3" name="boletos[un_dia][cantidad]" placeholder="0" name="">
                  <input type="hidden" value="30" name="boletos[un_dia][precio]">
                </div>
          </div>
        </li>

        <li>
          <div class="tabla-precio">
            <h3>Todos los dias</h3>
            <p class="numero">$50</p>
            <ul>
              <li>Bocadillos gratis</li>
              <li>todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
          <div class="orden">
            <label for="pase_completo">Boletos deseados:</label>
            <input type="number" min="0" id="pase_completo" size="3" name="boletos[completo][cantidad]" placeholder="0" >
            <input type="hidden" value="50" name="boletos[completo][precio]">
          </div>
          </div>
        </li>

        <li>
          <div class="tabla-precio">
            <h3>Pase por 2 dias (viernes y sabado)</h3>
            <p class="numero">$45</p>
            <ul>
              <li>Bocadillos gratis</li>
              <li>todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
                <div class="orden">
                  <label for="pase_dosdias">Boletos deseados:</label>
                  <input type="number" min="0" id="pase_dosdias" size="3" name="boletos[2dias][cantidad]" placeholder="0">
                  <input type="hidden" value="45" name="boletos[2dias][precio]">
                </div>
          </div>
        </li>
      </ul>
      </div><!--paquetes-->
<div id="eventos" class="eventos clearfix">
  <h3>Elige tus talleres</h3>
  <div class="caja">
    
  <div id="viernes" class="contenido-dia clearfix">
    <h4>viernes</h4>
           <div>
         <p>seminario:</p>
                    <label>
              <input type="checkbox" name="registro[]" id="10" value="10">
              <time>10:00:00</time> Diseño UI y UX para móviles              <br>
              <span class="autor">abuela asuncion</span>
          </label>
             </div>
          <div>
         <p>conferencias:</p>
                    <label>
              <input type="checkbox" name="registro[]" id="7" value="7">
              <time>10:00:00</time> Como ser freelancer              <br>
              <span class="autor">abuela asuncion</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="8" value="8">
              <time>17:00:00</time> Tecnologías del Futuro              <br>
              <span class="autor">francisco charris ortiz</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="9" value="9">
              <time>19:00:00</time> Seguridad en la Web              <br>
              <span class="autor">shari herrera</span>
          </label>
             </div>
          <div>
         <p>talleres:</p>
                    <label>
              <input type="checkbox" name="registro[]" id="2" value="2">
              <time>10:00:00</time> Responsive Web Design              <br>
              <span class="autor">francisco charris ortiz</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="4" value="4">
              <time>14:00:00</time> HTML5 y CSS3              <br>
              <span class="autor">Mirian  camargo</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="5" value="5">
              <time>17:00:00</time> Drupal              <br>
              <span class="autor">Santi cc</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="6" value="6">
              <time>19:00:00</time> WordPress              <br>
              <span class="autor">fran cc</span>
          </label>
             </div>
     </div> <!--#contenido dia-->
  <div id="sabado" class="contenido-dia clearfix">
    <h4>sabado</h4>
           <div>
         <p>seminario:</p>
                    <label>
              <input type="checkbox" name="registro[]" id="21" value="21">
              <time>17:00:00</time> Diseño UI y UX para móviles              <br>
              <span class="autor">fran cc</span>
          </label>
             </div>
          <div>
         <p>conferencias:</p>
                    <label>
              <input type="checkbox" name="registro[]" id="18" value="18">
              <time>17:00:00</time> Los mejores lugares para encontrar trabajo              <br>
              <span class="autor">francisco charris ortiz</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="19" value="19">
              <time>19:00:00</time> Pasos para crear un negocio rentable               <br>
              <span class="autor">shari herrera</span>
          </label>
             </div>
          <div>
         <p>talleres:</p>
                    <label>
              <input type="checkbox" name="registro[]" id="12" value="12">
              <time>12:00:00</time> PHP y MySQL              <br>
              <span class="autor">shari herrera</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="13" value="13">
              <time>14:00:00</time> JavaScript Avanzado              <br>
              <span class="autor">Mirian  camargo</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="14" value="14">
              <time>17:00:00</time> SEO en Google              <br>
              <span class="autor">Santi cc</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="15" value="15">
              <time>19:00:00</time> De Photoshop a HTML5 y CSS3              <br>
              <span class="autor">fran cc</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="16" value="16">
              <time>21:00:00</time> PHP Intermedio y Avanzado              <br>
              <span class="autor">abuela asuncion</span>
          </label>
             </div>
     </div> <!--#contenido dia-->
  <div id="domingo" class="contenido-dia clearfix">
    <h4>domingo</h4>
           <div>
         <p>seminario:</p>
                    <label>
              <input type="checkbox" name="registro[]" id="30" value="30">
              <time>10:00:00</time> Creando una App en Android en una mañana              <br>
              <span class="autor">Santi cc</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="31" value="31">
              <time>17:00:00</time> Creando una App en iOS en una tarde              <br>
              <span class="autor">francisco charris ortiz</span>
          </label>
             </div>
          <div>
         <p>conferencias:</p>
                    <label>
              <input type="checkbox" name="registro[]" id="28" value="28">
              <time>17:00:00</time> ¿Con que lenguaje debo empezar?              <br>
              <span class="autor">shari herrera</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="29" value="29">
              <time>19:00:00</time> Frameworks y librerias Open Source              <br>
              <span class="autor">Mirian  camargo</span>
          </label>
             </div>
          <div>
         <p>talleres:</p>
                    <label>
              <input type="checkbox" name="registro[]" id="22" value="22">
              <time>10:00:00</time> Laravel              <br>
              <span class="autor">francisco charris ortiz</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="23" value="23">
              <time>12:00:00</time> Crea tu propia API              <br>
              <span class="autor">shari herrera</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="24" value="24">
              <time>14:00:00</time> JavaScript y jQuery              <br>
              <span class="autor">Mirian  camargo</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="25" value="25">
              <time>17:00:00</time> Creando Plantillas para WordPress              <br>
              <span class="autor">Santi cc</span>
          </label>
                   <label>
              <input type="checkbox" name="registro[]" id="26" value="26">
              <time>19:00:00</time> Tiendas Virtuales en Magento              <br>
              <span class="autor">fran cc</span>
          </label>
             </div>
     </div> <!--#contenido dia-->
  <div id="miarcoles" class="contenido-dia clearfix">
    <h4>miarcoles</h4>
           <div>
         <p>talleres:</p>
                    <label>
              <input type="checkbox" name="registro[]" id="32" value="32">
              <time>17:00:00</time> prueba              <br>
              <span class="autor">Mirian  camargo</span>
          </label>
             </div>
     </div> <!--#contenido dia-->
     
  </div><!--.caja-->
</div> <!--#eventos-->
 <div class="resumen" class="resumen ">
   <h3>Pago y Extras</h3>
   <div class="caja clearfix">
      <div class="extras">
        <div class="orden">
          <label for="camisa_evento">Camisa del evento $10 <small>(promocion 7% dto.)</small></label>
          <input type="number" min="0" id="camisa_evento" size="3" name="pedido_extra[camisas][cantidad]" placeholder="0" >
          <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
        </div><!--orden-->
         <div class="orden">
          <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, css3, JavaScript, chrome)</small></label>
          <input type="number" min="0" id="etiquetas" size="3" name="pedido_extra[etiquetas][cantidad]" placeholder="0" >
          <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
        </div><!--orden-->
         <div class="orden">
          <label for="camisa_evento">Selecciona un Regalo</label><br>
          <select id="regalo" name="regalo" required="">
            <option value=""><--Seleccione un regalo--></option>
              <option value="2">Etiquetas</option>
              <option value="1">Pulsera</option>
              <option value="3">Plumas</option>
          </select>
        </div><!--orden-->
        <input type="button" id="calcular" class="button" value="Calcular">
      </div><!--Extras-->
      <div class="total">
        <p>Resumen:</p>
        <div id="lista_productos">
          
        </div>
        <p>Total:</p>
        <div id="suma_total">
          
        </div>
        <input type="hidden" name="total_pedido" id="total_pedido" >
        <input type="submit" name="submit" id="btnRegistro" class="button">
      </div><!--Total-->
   </div><!--caja-->
 </div><!--Resumen-->

    </form>
  </section>


  <footer class="site-header">
    <div class="contenedor clearfix">
      <div class="footer-informacion">
        <h3>sobre <span>GDLWEBCAN</span></h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut .</p>
      </div>
      <div class="ultimos-tweets">
        <h3>Ultimos <span>tweets</span></h3>
        <ul>
          <a class="twitter-timeline" data-height="300" href="https://twitter.com/Francc43051613?ref_src=twsrc%5Etfw">Tweets by Francc43051613</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
      <div class="menu">
        <h3>Redes <span>Sociales</span></h3>
        <nav class="redes-sociales">
          <a href=""><i class="fab fa-facebook-f"></i></a>
          <a href=""><i class="fab fa-twitter"></i></a>
          <a href=""><i class="fab fa-pinterest-p"></i></a>
          <a href=""><i class="fab fa-youtube"></i></a>
          <a href=""><i class="fab fa-instagram"></i></a>
        </nav>
      </div>
    </div>

    <p class="copyright">Todos los derechos reservados GDLWEBCAN 2019.</p>
    <!-- Begin Mailchimp Signup Form -->
    <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet" type="text/css">
    <style type="text/css">
      #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
      /* Add your own Mailchimp form style overrides in your site stylesheet or in this style block.
         We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
    </style>
    <div style="display:none;">
    <div id="mc_embed_signup">
    <form action="https://gmail.us4.list-manage.com/subscribe/post?u=5e894e1beda773f674419bde9&amp;id=8029b9412d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div id="mc_embed_signup_scroll">
      <h2>Subscríbete al newsletter y no te pierdas nada</h2>
    <div class="indicates-required"><span class="asterisk">*</span> campos obligatorios</div>
    <div class="mc-field-group">
      <label for="mce-EMAIL">Email (correo) <span class="asterisk">*</span>
    </label>
      <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
    </div>
      <div id="mce-responses" class="clear">
        <div class="response" id="mce-error-response" style="display:none"></div>
        <div class="response" id="mce-success-response" style="display:none"></div>
      </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_5e894e1beda773f674419bde9_8029b9412d" tabindex="-1" value=""></div>
        <div class="clear"><input type="submit" value="Subscribirse" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
        </div>
    </form>
    </div>
    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
    <!--End mc_embed_signup-->
  </div>
  </footer>
  <script src="js/vendor/modernizr-3.7.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"></script>
  <script src="js/plugins.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lettering.js/0.7.0/jquery.lettering.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-animateNumber/0.0.14/jquery.animateNumber.min.js" integrity="sha256-GCAeRKCXFEtLTZ+gG1SCIrtGkYq1zZjMXkj+XUFNJqo=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js"></script>
    <script src="js/cotizador.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
  <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us4.list-manage.com","uuid":"5e894e1beda773f674419bde9","lid":"8029b9412d","uniqueMethods":true}) })</script>
  