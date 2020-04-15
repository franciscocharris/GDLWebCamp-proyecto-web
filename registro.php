<?php include_once "includes/templates/header.php" ?>

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
    <?php 
    try {
      require_once('includes/funciones/bd_conexion.php');
      $sql = " SELECT eventos.*, categoria_evento.cat_evento, invitados.nombre_invitado, invitados.apellido_invitado ";
      $sql .= " FROM eventos ";
      $sql .= " INNER JOIN categoria_evento ";
      $sql .= " ON eventos.id_cat_evento = categoria_evento.id_categoria ";
      $sql .= " INNER JOIN invitados ";
      $sql .= " ON eventos.id_inv = invitados.invitado_id ";
      //se pueden ordenar los registros por varios parametros
      $sql .= " ORDER BY eventos.fecha_evento, eventos.id_cat_evento, eventos.hora_evento ";
      // echo $sql;
      $resultado = $conn->query($sql);
    } catch (Exception $e) {
      echo $e->getMessage();
    }
    $eventos_dias = array();
    while($eventos = $resultado->fetch_assoc()){
      $fecha = $eventos['fecha_evento'];

      //la sig linea es para configurar en el servidor que de ahora en adelante va a estar en el idioma especificado
      //EN UNIX
      setlocale(LC_ALL, 'es_ES.UTF-8');
      //EN WINDOWS
      setlocale(LC_ALL, 'spanish');
      //y la sig linea para formatear las fechas numericas a los dias de la semana
      $dia_semana = strftime("%A", strtotime($fecha));
      //para caracteres raros como � usar utf8-decode
      $dia_semana1 = utf8_decode($dia_semana);
      //los eventos
      $categoria = $eventos['cat_evento'];
      $dia = array(
        'nombre_evento' => $eventos['nombre_evento'],
        'hora' => $eventos['hora_evento'],
        'id' => $eventos['evento_id'],
        'nombre_invitado' => $eventos['nombre_invitado'],
        'apellido_invitado' => $eventos['apellido_invitado']
      );
      //arreglo formateado
      $eventos_dias[$dia_semana1]['eventos'][$categoria][] = $dia;
    }
    ?>

<?php foreach($eventos_dias as $dia => $eventos){ ?>
  <div id="<?php echo str_replace('?', 'a', $dia); ?>" class="contenido-dia clearfix">
    <h4><?php echo str_replace('?', 'a', $dia); ?></h4>
    <?php foreach($eventos['eventos'] as $tipo => $evento_dia):  ?>
       <div>
         <p><?php echo $tipo ?>:</p>
         <?php foreach($evento_dia as $evento){ ?>
           <label>
              <input type="checkbox" name="registro[]" id="<?php echo $evento['id']; ?>" value="<?php echo $evento['id']; ?>">
              <time><?php echo $evento['hora']; ?></time> <?php echo $evento['nombre_evento']; ?>
              <br>
              <span class="autor"><?php echo $evento['nombre_invitado']. " " . $evento['apellido_invitado']; ?></span>
          </label>
        <?php } ?>
     </div>
   <?php endforeach; ?>
  </div> <!--#contenido dia-->
<?php } ?>     
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


  <?php include_once "includes/templates/footer.php" ?>