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
  <?php 
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);

    if($pagina == 'invitados' || $pagina == 'index'){
      echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.6.4/jquery.colorbox-min.js" integrity="sha256-QbxNT+iBOdbuiav8squsceFDDYXb/8C+fI9r029M7X4=" crossorigin="anonymous"></script>';
    }else if($pagina == 'conferencia'){
      echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.1/js/lightbox.min.js" integrity="sha256-CtKylYan+AJuoH8jrMht1+1PMhMqrKnB8K5g012WN5I=" crossorigin="anonymous"></script>';
    }
  ?>
  <script src="js/cotizador.js"></script>
  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set','transport','beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>
  <script type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/unique-methods/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script><script type="text/javascript">window.dojoRequire(["mojo/signup-forms/Loader"], function(L) { L.start({"baseUrl":"mc.us4.list-manage.com","uuid":"5e894e1beda773f674419bde9","lid":"8029b9412d","uniqueMethods":true}) })</script>
  <?php
  // Guarda todo el contenido a un archivo
  $fp = fopen($archivoCache, 'w');
  fwrite($fp, ob_get_contents());
  fclose($fp);
  // Enviar al navegador
  ob_end_flush();
?>
</body>

</html>
