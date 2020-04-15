<?php 
$id = $_GET['id'];
if(!filter_var($id, FILTER_VALIDATE_INT)){
  die('error');
}
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/barra.php'; 
include_once 'templates/navegacion.php'; 
 ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Registro
        <small>llena el formulario para Editar un Registro</small>
      </h1>
    </section>

    <div class="row">
      <div class="col-md-8 ">
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Registro</h3>
            </div>
            <div class="box-body">

              <?php 
                $sql = "SELECT * FROM  registrados WHERE ID_Registrado = $id ";
                $resultado = $conn->query($sql);
                $registrado = $resultado->fetch_assoc(); 
              ?>
              
              <form class="editar-registrado"  role="form" name="guardar_registro" id="guardar_registro" method="post" action="modelo-registrado.php">
                <div class="box-body">
                    <div class="form-group">
                      <label for="nombre_registrado">Nombre:</label>
                      <input value="<?php echo $registrado['nombre_registrado']; ?>" type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" >
                    </div>
                    <div class="form-group">
                      <label for="apellido">Apellido:</label>
                      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="apellido" value="<?php echo $registrado['apellido_registrado']; ?>">
                    </div>

                    <div class="form-group">
                      <label for="email">Email:</label>
                      <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $registrado['email_registrado']; ?>">
                    </div>

              <?php 
                $pedido = $registrado['pases_articulos'];
                //nota importante hay que colocar true en json_decode para que funcione sin problemas
                $boletos = json_decode($pedido, true);
                
              ?>
  <div class="form-group">
      <div id="paquetes" class="paquetes">
        <div class="box-header with-border">
          <h3 class="box-title">Elije los boletos deseados</h3>
        </div>
        <ul class="lista-precios clearfix row">
        <li class="col-md-4">
          <div class="tabla-precio text-center">
            <h3>pase por dia (viernes)</h3>
            <p class="numero">$30</p>
            <ul>
              <li>Bocadillos gratis</li>
              <li>todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
                <div class="orden">
                  <label for="pase_dia">Boletos deseados:</label>
                  <input type="number" class="form-control" min="0" id="pase_dia" size="3" name="boletos[un_dia][cantidad]" placeholder="0" >
                  <input type="hidden" value="30" name="boletos[un_dia][precio]">
                </div>
          </div>
        </li>

        <li class="col-md-4">
          <div class="tabla-precio text-center">
            <h3>Todos los dias</h3>
            <p class="numero">$50</p>
            <ul>
              <li>Bocadillos gratis</li>
              <li>todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
          <div class="orden">
            <label for="pase_completo">Boletos deseados:</label>
            <input value="<?php echo  $boletos['pase_completo']['cantidad']; ?>" type="number" class="form-control" min="0" id="pase_completo" size="3" name="boletos[completo][cantidad]" placeholder="0" >
            <input type="hidden" value="50" name="boletos[completo][precio]">
          </div>
          </div>
        </li>

        <li class="col-md-4">
          <div class="tabla-precio text-center">
            <h3>Pase por 2 dias (viernes y sabado)</h3>
            <p class="numero">$45</p>
            <ul>
              <li>Bocadillos gratis</li>
              <li>todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
                <div class="orden">
                  <label for="pase_dosdias">Boletos deseados:</label>
                  <input value="<?php echo $boletos['pase_2dias']['cantidad']; ?>" class="form-control" type="number" min="0" id="pase_dosdias" size="3" name="boletos[2dias][cantidad]" placeholder="0">
                  <input type="hidden" value="45" name="boletos[2dias][precio]">
                </div>
          </div>
        </li>
      </ul>
      </div><!--paquetes-->  
    </div> <!--form-group-->
    <div class="form-group">
      <div class="box-header with-border">
        <h3 class="box-title">Elije los talleres</h3>
      </div>
      <div id="eventos" class="eventos clearfix">
  <div class="caja">
    <?php 
      $eventos = $registrado['talleres_registrados'];
      $id_eventos_registrados = json_decode($eventos, true);
    try {
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
  <!-- tanto div como h4 es el nombre del dia -->
  <div id="<?php echo str_replace('?', 'a', $dia); ?>" class="contenido-dia clearfix row">
    <h4 class="text-center nombre_dia"><?php echo str_replace('?', 'a', $dia); ?></h4>
    <!-- ahora se esta recorriendo el arreglo con la llave eventos del arreglo eventos_dias -->
    <?php foreach($eventos['eventos'] as $tipo => $evento_dia):  ?>
       <div class="col-md-4">
         <p><?php echo $tipo ?>:</p>
         <?php foreach($evento_dia as $evento){ ?>
           <label>
            <!-- checkboxes cargados -->
            <!-- in_array es una funcion que revisa dentro de un arreglo que un valor exista si es asi devielve true  -->
            <!-- ckecked es el valor de un checkbox que dice si fue seleccionado o no -->
              <input <?php echo (in_array($evento['id'], $id_eventos_registrados['eventos']) ? 'checked' : '' ); ?> type="checkbox" class="minimal" name="registro_evento[]" id="<?php echo $evento['id']; ?>" value="<?php echo $evento['id']; ?>">
              <time><?php echo $evento['hora']; ?></time> <?php echo $evento['nombre_evento']; ?>
              <br>
              <span class="autor">
                <?php echo $evento['nombre_invitado']. " " . $evento['apellido_invitado']; ?>
              </span>
          </label>
        <?php } ?>
     </div>
   <?php endforeach; ?>
  </div> <!--#contenido dia-->
<?php } ?>     
  </div><!--.caja-->
</div> <!--#eventos-->
 <div class="resumen" class="resumen ">
   <div class="box-header with-border">
        <h3 class="box-title">Pagos y Extras</h3>
      </div>
   <div class="caja clearfix row">
      <div class="extras col-md-6">
        <div class="orden">
          <label for="camisa_evento">Camisa del evento $10 <small>(promocion 7% dto.)</small></label>
          <input value="<?php echo $boletos['camisas']; ?>" type="number" class="form-control" min="0" id="camisa_evento" size="3" name="pedido_extra[camisas][cantidad]" placeholder="0" >
          <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
        </div><!--orden-->
         <div class="orden">
          <label for="etiquetas">Paquete de 10 etiquetas $2 <small>(HTML5, css3, JavaScript, chrome)</small></label>
          <input value="<?php echo $boletos['etiquetas']; ?>" type="number" class="form-control" min="0" id="etiquetas" size="3" name="pedido_extra[etiquetas][cantidad]" placeholder="0" >
          <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
        </div><!--orden-->
         <div class="orden">
          <label for="camisa_evento">Selecciona un Regalo</label><br>
          <select id="regalo" name="regalo" class="form-control seleccionar" required="">
            <option value=""><--Seleccione un regalo--></option>
              <!-- otra forma de que se llenen los option en el select -->
              <option value="2" <?php echo ($registrado['regalo'] == 2 ? 'selected' : '' ); ?> >Etiquetas</option>
              <option value="1" <?php echo ($registrado['regalo'] == 1 ? 'selected' : '' ); ?> >Pulsera</option>
              <option value="3" <?php echo ($registrado['regalo'] == 3 ? 'selected' : '' ); ?> >Plumas</option>
          </select>
        </div><!--orden-->
        <br>
        <input type="button" id="calcular" class=" btn btn-success" value="Calcular">
      </div><!--Extras-->
      <div class="total col-md-6">
        <p>Resumen:</p>
        <div id="lista_productos"> </div>
        <p> Total ya pagado: <?php echo (float) $registrado['total_pagado']; ?></p>
        <p>Total:</p>
        <div id="suma_total"> </div>

      </div><!--Total-->
   </div><!--caja-->
 </div><!--Resumen-->
    </div>
</div>
    <!-- /.box-body -->

    <div class="box-footer">
      <input type="hidden" name="total_pedido" id="total_pedido" >
      <input type="hidden" name="total_descuento" id="total_descuento" value="total_descuento">

      <input type="hidden" name="registro" value="actualizar">
      <input type="hidden" name="id_registro" value="<?php echo $registrado['ID_Registrado']; ?>">
      <input type="hidden" name="fecha_registro" value="<?php echo $registrado['fecha_registro']; ?>">
      <button type="submit"  class="btn btn-primary" id="btnRegistro">Guardar</button>
    </div>
  </form>
  
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
    </section>
      </div>    
    </div>
    <!-- Main content -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'templates/footer.php'; ?>


