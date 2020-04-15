<?php
if(!isset($_POST['submit'])){
	exit('hubo un error');
}

use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;


 if(isset($_POST['submit'])): 
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$email = $_POST['email'];
		$regalo = $_POST['regalo'];
		$total = $_POST['total_pedido'];
		$fecha = date('y-m-d H:i:s');
		//pedidos
		$boletos = $_POST['boletos'];
		$numero_boletos = $boletos;

		$pedidoExtra = $_POST['pedido_extra'];
		$camisas = $_POST['pedido_extra']['camisas']["cantidad"];
		$precioCamisa = $_POST['pedido_extra']['camisas']['precio'];

		$etiquetas = $_POST['pedido_extra']['etiquetas']['cantidad'];
		$precioEtiquetas = $_POST['pedido_extra']['etiquetas']['precio'];

		include_once "includes/funciones/funciones.php";
		$pedido = productos_json($boletos, $camisas, $etiquetas);
		//eventos
		$eventos = $_POST['registro'];
		$registro = eventos_json($eventos);
		try {
        require_once('includes/funciones/bd_conexion.php');
        $stmt = $conn->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalo, total_pagado ) VALUES (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssis", $nombre, $apellido, $email, $fecha, $pedido, $registro, $regalo, $total);
        $stmt->execute();
        $ID_registro = $stmt->insert_id;
        $stmt->close();
        $conn->close();
        // header('Location: validar_registro.php?exitoso=1');
      } catch (Exception $e) {
        echo $e->getMessage();
      }
endif; 

require 'includes/paypal.php';


$compra = new Payer();
$compra->setPaymentMethod('paypal');



$articulo = new Item();
$articulo->setName($producto)
		->setCurrency('USD')
		->setQuantity(1)
		->setPrice($precio);



$i = 0;
$arreglo_pedido = array();
foreach($numero_boletos as $key => $value){
	if( (int) $value['cantidad'] > 0){

		${"articulo$i"} = new Item();
		$arreglo_pedido[] = ${"articulo$i"};
		${"articulo$i"}->setName('pase: ' . $key)
					  ->setCurrency('USD')
					  ->setQuantity( (int) $value['cantidad'] )
				      ->setPrice( (int) $value['precio'] );

		$i++;
	}
}

foreach($pedidoExtra as $key => $value){
	if( (int) $value['cantidad'] > 0){
		if($key == 'camisas'){
			$precio = (float) $value['precio'] * .93;
		}else{
			$precio = (int) $value['precio'];
		}

		${"articulo$i"} = new Item();
		$arreglo_pedido[] = ${"articulo$i"};
		${"articulo$i"}->setName("extras: " . $key)
						->setCurrency('USD')
						->setQuantity( (int) $value['cantidad'] )
						->setPrice($precio);
		$i++;
	}
}


$listaArticulos = new ItemList();
$listaArticulos->setItems($arreglo_pedido);

$cantidad = new Amount();
$cantidad->setCurrency('USD')
		 ->setTotal($total);


$transaccion = new Transaction();
$transaccion->setAmount($cantidad)
			->setItemList($listaArticulos)
			->setDescription('Pago GDLWEBCAMP')
			->setInvoiceNumber($ID_registro);



$redirrecionar = new RedirectUrls();
$redirrecionar->setReturnUrl(URL_SITIO . "pago_finalizado.php?id_pago={$ID_registro}")
			  ->setCancelUrl(URL_SITIO . "pago_finalizado.php?eid_pago={$ID_registro}");


$pago = new Payment();
$pago->setIntent("sale")
	->setPayer($compra)
	->setRedirectUrls($redirrecionar)
	->setTransactions(array($transaccion));

try {
	$pago->create($apiContext);
} catch (PayPal\Exception\PayPalConnectionException $pce) {
	echo "<pre>";
		print_r(json_encode($pce->getData()));
		exit;
	echo "</pre>";
}

$aprovado = $pago->getApprovalLink();

header("Location: {$aprovado} ");

