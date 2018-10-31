<?php
require_once "conexion.php";
if ($php_response["msg"]=="OK"){
	$u_exiten = mysqli_query($conexion, "SELECT * FROM usuarios");
	if (mysqli_num_rows($u_exiten) > 0 ){
		$php_response['obser']= "los usaurios ya existen ";
	
	}else{

		$email = "alex@gmail.com";
		$nombre="alex";
		$password =md5("123456");
		$fecha_nacimiento = "1988/06/20";
		$crear = $conexion->prepare("INSERT INTO usuarios (email, nombre, password, fecha_nacimiento) VALUES (?,?,?,?)"); 
		$crear->bind_param("ssss", $email, $nombre, $password, $fecha_nacimiento);
		$crear->execute();

		$email = "pedro@gmail.com";
		$nombre="Pedro";
		$password =md5("123456");
		$fecha_nacimiento = "1985/05/04";
		$crear->bind_param("ssss", $email, $nombre, $password, $fecha_nacimiento);
		$crear->execute();

		$email = "joseacevedo@hotmail.com";
		$nombre="Jose Acevedo";
		$password =md5("123456");
		$fecha_nacimiento = "1991/05/08";
		$crear->bind_param("ssss", $email, $nombre, $password, $fecha_nacimiento);
		$crear->execute();
	}	
	$cumple = date('Y/m/d',strtotime("1987/04/02"));
	



}
