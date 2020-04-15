<?php include_once "includes/templates/header.php"; 
use PayPal\Rest\ApiContext;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Payment;
require 'includes/paypal.php';
?>

<section>
  <h2> Resumen Registro </h2>
   <?php 
      $paymentId = $_GET['paymentId'];
      $id_pago = (int) $_GET['id_pago'];

      //lo que viene ahora es para hacer la peticion a paypal y ver si pago o no
      //peticion al servidor de paypal
      $pago = Payment::get($paymentId, $apiContext);
      $execution = new PaymentExecution();
      $execution->setPayerId( $_GET['PayerID'] );
      //resultado tiene la informacion de la transaccion
      $resultado = $pago->execute($execution, $apiContext);

      $respuesta = $resultado->transactions[0]->related_resources[0]->sale->state;

     // var_dump($respuesta);
     
      if($respuesta === "completed"){

        echo "<div class=' resultado correcto'>";
          echo "el pago se realizo bien <br>";
          echo "El id es {$paymentId}";
        echo "</div>";
        
        

        require_once 'includes/funciones/bd_conexion.php';
        $stmt = $conn->prepare(" UPDATE registrados SET pagado = ? WHERE ID_Registrado = ? ");
        $pagado = 1;
        $stmt->bind_param('ii', $pagado, $id_pago);
        $stmt->execute();
        $stmt->close();
        $conn->close();
      }else{
        echo "<div  class=' resultado error'>";
          echo "el pago se realizo bien <br>";
          echo "El id es {$paymentId}";
        echo "</div>";
      }

      ?>
  
</section>
<?php include_once "includes/templates/footer.php"; ?>