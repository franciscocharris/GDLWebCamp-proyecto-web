<?php 

$id = $_GET['id'];
if(!filter_var($id, FILTER_VALIDATE_INT)){
  die("error");
}else{

include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
include_once 'templates/barra.php'; 
include_once 'templates/navegacion.php'; 


 ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">


  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->


  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      editar Evento
      <small>llena el formulario para editar el evento</small>
    </h1>
  </section>

<div class="row">
  <div class="col-md-8 ">
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">editar Evento</h3>
        </div>
        <div class="box-body">

          <?php 
          $sql = " SELECT * FROM eventos WHERE evento_id = $id ";
          $resultado = $conn->query($sql);
          $evento = $resultado->fetch_assoc();
          ?>
          <form role="form" name="guardar_registro" id="guardar_registro" method="post" action="modelo-evento.php">
            <div class="box-body">
                <div class="form-group">
                  <label for="usuario">Titulo evento:</label>
                  <input type="text" class="form-control" id="titulo_evento" name="titulo_evento" placeholder="titulo del evento" value="<?php echo $evento['nombre_evento']; ?>">
                </div>

                <div class="form-group">
                  <label for="nombre">Categoria:</label>
                  <select name="categoria_evento" class="form-control seleccionar">
                    <option value="0">- seleccione -</option>
                    <?php
                    $categoria_actual = $evento['id_cat_evento'];
                      try {
                        $sql = " SELECT * FROM categoria_evento ";
                        $resultado = $conn->query($sql);
                        while($cat_evento = $resultado->fetch_assoc()){
                            if($cat_evento['id_categoria'] == $categoria_actual){ ?>
                              <option value="<?php echo $cat_evento['id_categoria']; ?>" selected>
                                <?php echo $cat_evento['cat_evento']; ?>
                              </option>
                      <?php }else{ ?>
                         <option value="<?php echo $cat_evento['id_categoria']; ?>">
                          <?php echo $cat_evento['cat_evento']; ?>  
                         </option>
                      <?php } ?>
                    <?php } 
                       } catch (Exception $e) {
                          echo $e->getMessage();
                        }
                     ?>
                  </select>
                </div>

                 <div class="form-group">
                  <label>fecha Eveneto</label>
                  <?php 
                  //hay que formatear la fecha con php para poderlo cargar en el formulario
                    $fecha = $evento['fecha_evento'];
                    $fecha_formato = date('m/d/Y', strtotime($fecha));
                  ?>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" value="<?php echo $fecha_formato; ?>"name="fecha_evento" class="form-control pull-right" id="fecha">
                  </div>
                </div>

                <div class="bootstrap-timepicker">
                  <div class="form-group">
                    <label>Hora:</label>
                    <?php 
                    //hay que formatear la hora con php para poderlo cargar en el formulario
                      $hora = $evento['hora_evento'];
                      $hora_formato = date('h:i a', strtotime($hora));
                    ?>
                    <div class="input-group">
                      <input type="text" class="form-control timepicker" value="<?php echo $hora_formato; ?>" name="hora_evento">

                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>

               <div class="form-group">
                  <label for="nombre">Invitado ó ponente:</label>
                  <select name="invitado" class="form-control seleccionar">
                    <option value="0">- seleccione -</option>
                    <?php
                      try {
                        $invitado_actual = $evento['id_inv'];
                        $sql = " SELECT invitado_id, nombre_invitado, apellido_invitado FROM invitados ";
                        $resultado = $conn->query($sql);
                        while($invitados = $resultado->fetch_assoc()){ 
                            if($invitados['invitado_id'] == $invitado_actual){ //selected es para que si hay coincidencia que quede seleccionado y asi funcionaria la carga ?>
                              <option value="<?php echo $invitados['invitado_id']; ?>" selected><?php echo $invitados['nombre_invitado'] . " ". $invitados['apellido_invitado']; ?>
                              </option>
                      <?php }else{ ?>
                             <option value="<?php echo $invitados['invitado_id']; ?>"><?php echo $invitados['nombre_invitado'] . " ". $invitados['apellido_invitado']; ?>
                             </option>
                      <?php } ?>
                  <?php } 
                       } catch (Exception $e) {
                          echo $e->getMessage();
                        }
                     ?>
                  </select>
                </div>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <input type="hidden" name="registro" value="actualizar">
              <input type="hidden" value="<?php echo $id; ?>" name="id_registro">
              <button type="submit"  class="btn btn-primary">Añadir</button>
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

<?php include_once 'templates/footer.php'; } ?>


