<?php 
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
        Crear Invitado
        <small>llena el formulario para crear un nuevo invitado</small>
      </h1>
    </section>

    <div class="row">
      <div class="col-md-8 ">
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Crear invitado</h3>
            </div>
            <div class="box-body">
              <!-- para subir un archivo en un formulario tinees que colocarle a la etiqueta form el atributo enctype="multipart/form-data"  -->
              <form role="form" name="guardar_registro" id="guardar_registro-archivo" method="post" action="modelo-invitado.php" enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                      <label for="nombre_invitado">Nombre:</label>
                      <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" placeholder="invitado">
                    </div>

                    <div class="form-group">
                      <label for="apellido_invitado">apellido:</label>
                      <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" placeholder="invitado">
                    </div>

                     <div class="form-group">
                      <label for="biografia_invitado">Biografia:</label>
                      <textarea class="form-control" id="biografia_invitado" name="biografia_invitado" rows="8" placeholder="Biografia"></textarea>
                    </div>
                      <div class="form-group">
                        <label for="imagen_invitado">Imagen:</label>
                        <input class="form-control" name="archivo_imagen" type="file" id="imagen_invitado">

                        <p class="help-block">Añada la imagen dle invitado aquí.</p>
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <input type="hidden" name="registro" value="nuevo">
                  <button type="submit"  class="btn btn-primary" id="crear_registro">Añadir</button>
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


