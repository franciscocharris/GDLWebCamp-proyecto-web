<?php 
	$conn = new mysqli('localhost', 'root', '', 'gdlwebcamp');
	//para evitar caracteres raros entre la base de datos y php coloca este codigo
	$acentos = $conn->query("SET NAMES 'utf8'");
	if($conn->connect_error){
		echo $error -> $conn->connect_error;
	}
?>