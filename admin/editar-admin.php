<?php 
include_once 'funciones/sesiones.php';
include_once 'funciones/funciones.php';
include_once 'templates/header.php';
$id = $_GET['id'];
if(!filter_var($id, FILTER_VALIDATE_INT)){
  die('Error');
} 
include_once 'templates/barra.php'; 
include_once 'templates/navegacion.php';
 ?>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Editar Administrados
        <small>llena el formulario para editar administrador</small>
      </h1>
    </section>

    <div class="row">
      <div class="col-md-8 ">
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Editar Administrador</h3>
            </div>
            <div class="box-body">
              <?php 
                $sql = " SELECT * FROM admins WHERE id_admin = $id ";

                $resultado = $conn->query($sql);
                $admin = $resultado->fetch_assoc();
                
              ?>
              <form role="form" name="guardar_registro" id="guardar_registro" method="post" action="modelo-admin.php">
                <div class="box-body">
                    <div class="form-group">
                      <label for="usuario">Usuario:</label>
                      <input value="<?php echo $admin['usuario']; ?>" type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario">
                    </div>

                    <div class="form-group">
                      <label for="nombre">Nombre:</label>
                      <input value="<?php echo $admin['nombre']; ?>"  type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre completo">
                    </div>

                    <div class="form-group">
                      <label for="password">Password: </label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password para iniciar seccion">
                    </div>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                  <button type="submit"  class="btn btn-primary">Guardar</button>
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


