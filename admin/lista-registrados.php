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
        Lista de personas registradas
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <!-- /.box -->

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Maneja los visitantes registrados de los eventos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="registros" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>Nombre</th>
              <th>Email</th>
              <th>Fecha Registro</th>
              <th>Articulos</th>
              <th>Talleres</th>
              <th>Regalo</th>
              <th>Compra</th>
              <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
              <?php
                try {
                  $sql = " SELECT registrados.*, regalos.nombre_regalo FROM registrados ";
                  $sql .= " INNER JOIN regalos ";
                  $sql .= " ON registrados.regalo = regalos.ID_regalo ";
                  $resultado = $conn->query($sql);
                } catch (Exception $e) {
                  $error = $e->getMessage();
                  echo $error;
                }
                while($registrado = $resultado->fetch_assoc() ){ ?>
                  <tr>
                    <td><?php echo $registrado['nombre_registrado'] ." ". $registrado['apellido_registrado'] . '<br>';
                    $pagado = $registrado['pagado'];
                    if($pagado){
                      echo "<span class='badge bg-green'>Pagado</span>";
                    }else{
                      echo "<span class='badge bg-red'> No Pagado</span>";
                    }
                    ?>
                      
                    </td>
                    <td><?php echo $registrado['email_registrado']; ?></td>
                    <td><?php echo $registrado['fecha_registro']; ?></td>
                    <td>
                      <?php 
                      //json_decode convierte los json a arrays, true lo convierte en arreglo y si pones false lo convierte a objeto
                      $articulos = json_decode($registrado['pases_articulos'], true);
                      $arreglo_articulos = array(
                        'un_dia' => 'Pase 1 dia',
                        'pase_2dias' => 'Pase 2 dias',
                        'pase_completo' => 'pase completo',
                        'camisas' => 'Camisas',
                        'etiquetas' => 'Etiquetas'
                      );
                      //basicamente aqui se haccedieron a los valores del arreglo
                      foreach($articulos as $llave => $articulo){
                        //tuve que hacer que revisara si hay un array y si es positivo que luego revise si existe la llave sino ps que imprima normal
                        if(is_array($articulo)){
                          if(array_key_exists( 'cantidad', $articulo)){
                             echo $arreglo_articulos[$llave] ." : ". $articulo['cantidad'] . '<br>';
                          }
                        }else{
                           echo $arreglo_articulos[$llave] ." : ". $articulo . '<br>';
                        }
                       
                      } 

                      ?>
                        
                    </td>
                    <td>
                      <?php $eventos_resultado =  $registrado['talleres_registrados']; 
                      $talleres = json_decode($eventos_resultado, true);

                      $talleres = implode("', '", $talleres['eventos']);
                      //IN es para hacer una consulta en el que se requiera un campo pero que este puede tener multiples valores
                      $sql_talleres = " SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE clave IN ('$talleres') OR evento_id IN ('$talleres') ";

                      $resultado_talleres = $conn->query($sql_talleres);
                      while($eventos = $resultado_talleres->fetch_assoc()){
                        echo "Evento: ". $eventos['nombre_evento'] . "<br>" . "Fecha: ".$eventos['fecha_evento']."<br>". "Hora: ".date("h:i  a", strtotime( $eventos['hora_evento'])). '<br>';
                      }

                      ?>    
                    </td>
                    <td><?php echo $registrado['nombre_regalo']; ?></td>
                    <td>$ <?php echo $registrado['total_pagado']; ?></td>
                    <td>
                        <a href="editar-registro.php?id=<?php echo $registrado['ID_Registrado']; ?>" class="btn bg-orange btn-flat margin" >
                          <i class="fa fa-pencil"></i>
                        </a>
                        <a href="#" data-id="<?php echo $registrado['ID_Registrado']; ?>" data-tipo="registrado" class="btn bg-maroon btn-flat margin borrar_registro">
                          <i class="fa fa-trash"></i>
                        </a>
                      </td>
                  </tr>
             <?php   }?>
            </tbody>
            <tfoot>
             <tr>
              <th>Nombre</th>
              <th>Email</th>
              <th>Fecha Registro</th>
              <th>Articulos</th>
              <th>Talleres</th>
              <th>Regalo</th>
              <th>Compra</th>
              <th>Acciones</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include_once 'templates/footer.php'; ?>


