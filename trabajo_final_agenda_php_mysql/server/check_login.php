<?php

	require "conexion.php";

	if (!$conexion->error){
		$user=$_POST['username'] ; /*"gabioh2012@gmail.com";*/
		$pass=md5($_POST['password']) ;/*  md5("sex2004");*/
		$result = mysqli_query($conexion,  "SELECT * FROM usuarios WHERE  email  = '".$user."' and password= '".$pass."'") ;
		$row_result = mysqli_fetch_array($result);

		if ($row_result){
			session_start();
			$_SESSION["agendaID"] = $row_result['id'];
			$_SESSION["agendaUser"] = $row_result['email'];
			$php_response['msg']="OK";
		}else{
			$php_response["msg"]= "El usuario o contaseña ingresados son incorrectos";
		}
	}else{
		$php_response["msg"]= "Erro al tatar de conectarse a la base de datos ";
	}
	
	echo json_encode($php_response);
	$conexion->close();
?>
