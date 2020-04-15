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
        Crear Categoria
        <small>llena el formulario para crear una categoria</small>
      </h1>
    </section>

    <div class="row">
      <div class="col-md-8 ">
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Categoria</h3>
            </div>
            <div class="box-body">

              <form role="form" name="guardar_registro" id="guardar_registro" method="post" action="modelo-categoria.php">
                <div class="box-body">
                    <div class="form-group">
                      <label for="nombre_categoria">Nombre:</label>
                      <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="categoria">
                    </div>
                    <!-- del plugin font awesome del grupo de iconos -->
                    <div class="form-group">
                      <label for="icono">Icono:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-address-book"></i>
                        </div>
                        <input type="text" name="icono" id="icono" class="form-contol pull-right" placeholder="fa-icon">
                      </div>
                    </div>
                    <!-- fin del plugin -->
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


