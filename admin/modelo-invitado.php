<?php
include_once 'funciones/funciones.php';
if(isset($_POST['registro']) && $_POST['registro'] == 'nuevo'){
	$nombre = filter_var($_POST['nombre_invitado'], FILTER_SANITIZE_STRING);
	$apellido = filter_var($_POST['apellido_invitado'], FILTER_SANITIZE_STRING);
	$biografia = filter_var($_POST['biografia_invitado'], FILTER_SANITIZE_STRING);	
	// $respuesta = array(
	// 	'post' => $_POST,
	// 	'file' => $_FILES
	// );
	// echo json_encode($respuesta);
	$directorio = "../img/invitados/";
	//is_dir es una funcion que revisa si un archivo o carpeta existe y mkdir es para crear la carpeta
	if(!is_dir($directorio)){
		mkdir($directorio, 0755, true);
	}
	//move_uploaded_file es una funcion que coje los archivos subidos temporalmente y los guarad en un directorio (carpeta) del servidor
	if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])){
		$imagen_url = $_FILES['archivo_imagen']['name'];
		$imagen_resultado = 'se subió correctamente';
	}else{
		$respuesta = array(
			'respuesta' => error_get_last()
		);
	}
	try {
		$stmt = $conn->prepare(" INSERT INTO invitados (nombre_invitado, apellido_invitado, descripcion, url_imagen) VALUES (?, ?, ?, ?) ");
		$stmt->bind_param("ssss", $nombre, $apellido, $biografia, $imagen_url);
		$stmt->execute();
		if($stmt->affected_rows){
			$respuesta = array(
				'respuesta' => 'exito',
				'id_insertado' => $stmt->insert_id,
				'resultado_imagen' => $imagen_resultado
			);
		}else{
			$respuesta  = array(
				'respuesta' => 'error'
			);
		}
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		$respuesta  = array(
			'respuesta' => 'error' . $e->getMessage()
		);
	}
	echo json_encode($respuesta);
}
if(isset($_POST['registro']) && $_POST['registro'] == 'actualizar'){
	$nombre = filter_var($_POST['nombre_invitado'], FILTER_SANITIZE_STRING);
	$apellido = filter_var($_POST['apellido_invitado'], FILTER_SANITIZE_STRING);
	$biografia = filter_var($_POST['biografia_invitado'], FILTER_SANITIZE_STRING);
	$id_registro = $_POST['id_registro'];

	$directorio = "../img/invitados/";

	if(!is_dir($directorio)){
		mkdir($directorio, 0755, true);
	}

	if(move_uploaded_file($_FILES['archivo_imagen']['tmp_name'], $directorio . $_FILES['archivo_imagen']['name'])){
		$imagen_url = $_FILES['archivo_imagen']['name'];
		$imagen_resultado = 'se subió correctamente';
	}else{
		$respuesta = array(
			'respuesta' => error_get_last()
		);
	}

	try {
		if($_FILES['archivo_imagen']['size'] > 0){
			//con imagen
			$stmt = $conn->prepare(" UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, url_imagen = ?, editado = NOW()  WHERE invitado_id = ? ");
			$stmt->bind_param("ssssi", $nombre, $apellido, $biografia, $imagen_url, $id_registro);
		}else{
			//sin imagen
			$stmt = $conn->prepare(" UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, editado = NOW()  WHERE invitado_id = ? ");
			$stmt->bind_param("sssi", $nombre, $apellido, $biografia, $id_registro);
		}
		$stmt->execute();
		$registros = $stmt->affected_rows;

		if($registros > 0){
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
				'respuesta' => 'error' . $e->getMessage()
			);
	}
	echo json_encode($respuesta);
}
if(isset($_POST['registro']) && $_POST['registro'] == 'eliminar'){

	$id_borrar = $_POST['id'];

	try {
		$stmt = $conn->prepare(" DELETE FROM invitados WHERE invitado_id = ? ");
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
		$stmt->close();
		$conn->close();
	} catch (Exception $e) {
		$respuesta = array(
			'respuesta' => 'error' . $e->getMessage()
		);
	}
	echo json_encode($respuesta);
}