<?php
include_once 'funciones/funciones.php';
if(isset($_POST['registro']) && $_POST['registro'] == 'nuevo'){
	$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
	$nombre = filter_var( $_POST['nombre'], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

	$opciones = array(
		'cost' => 12
	);

	$password_hashed = password_hash($password, PASSWORD_BCRYPT, $opciones);

	try {
		include_once 'funciones/funciones.php';
		$stmt = $conn->prepare(" INSERT INTO admins (usuario, nombre, password) VALUES (?, ?, ?) ");
		$stmt->bind_param("sss", $usuario, $nombre, $password_hashed);
		$stmt->execute();
		$id_registro = $stmt->insert_id;
		if($stmt->affected_rows > 0){
			$respuesta = array(
				'respuesta' => 'exito',
				'id_admin' => $id_registro
			);
		}else{
			$respuesta = array(
				'respuesta' => 'error'
			);
		}
		$stmt->close();
		$conn->close();

	} catch (Exception $e) {
		echo "Error" . $e->getMessage();
	}
 	echo json_encode($respuesta);
}

if(isset($_POST['registro']) && $_POST['registro'] == 'actualizar'){
	$usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
	$nombre = filter_var( $_POST['nombre'], FILTER_SANITIZE_STRING);
	$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	$id_registro = filter_var($_POST['id_registro'], FILTER_VALIDATE_INT);

	try {

		//si esta vacio que actualize los  datos pero no el pasword vacio dara true y si no esta vacio dara false
	if(empty($_POST['password'])){

		$stmt = $conn->prepare(" UPDATE admins SET usuario = ?, nombre = ?, editado = NOW() WHERE id_admin = ? ");
		$stmt->bind_param("ssi", $usuario, $nombre, $id_registro);
	}else{
		
		$opciones = array(
			'cost' => 12
		);
		$hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
		$stmt = $conn->prepare(" UPDATE admins SET usuario = ?, nombre = ?, password = ?, editado = NOW() WHERE id_admin = ? ");
		$stmt->bind_param("sssi", $usuario, $nombre, $hash_password, $id_registro);
	}
		$stmt->execute();
		if($stmt->affected_rows){
			$respuesta = array(
				'respuesta' => 'exito',
				'id_actualizado' => $stmt->insert_id
			);
		}else{
			$respuesta = array(
				'respuesta' => 'error'
			);
		}

		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		$respuesta = array(
			'respuesta' => $e->getMessage()
		);
	}
	die(json_encode($respuesta));
}

if(isset($_POST['registro']) && $_POST['registro'] == 'eliminar'){
	$id_borrar = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
	try {
		$stmt = $conn->prepare(" DELETE FROM admins WHERE id_admin = ? ");
		$stmt->bind_param("i", $id_borrar);
		$stmt->execute();
		if($stmt->affected_rows){
			$respuesta = array(
				'respuesta' => 'exito',
				'id_eliminado' => $id_borrar
			);
		}else{
			$respuesta = array(
				'respuesta' => 'error'
			);
		}
	} catch (Exception $e) {
		$respuesta = array(
			'respuesta' => 'error' . $e->getMessage()
		);
	}
	echo json_encode($respuesta);
}

