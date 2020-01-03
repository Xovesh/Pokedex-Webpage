<?php
	session_start(); 

	$email = $_REQUEST["email"];
	$pass = $_REQUEST["password"];
	
	include '../other/DbConfig.php';
                
	$mysqli = mysqli_connect($dbserver,$dbuser,$dbpass,$db);
	if(!$mysqli){
		die("Fallo al conectar con Mysql: ".mysqli_connect_error());
	}
	
	$sql = "SELECT * FROM user WHERE email=\"".$email."\" and password=\"".$pass."\";";
	
	$resultado = mysqli_query($mysqli,$sql,MYSQLI_USE_RESULT);
	if(!$resultado){
		die("Error: ".mysqli_error($mysqli));
	}
	
	$row = mysqli_fetch_array($resultado);
	if($row['email']==$email){
		$_SESSION['user'] = $row['email'];
		if($row['rank']==3){
			$_SESSION['privilege'] = "admin";
		}else{
			$_SESSION['privilege'] = "user";
		}
		echo "<script>
		alert('Inicio de sesion realizado correctamente. Pulsa aceptar para acceder a la pantalla principal.');
		window.location.href='../../dashboard.php';
		</script>";  
	}else{
		echo  "<script> alert('Credenciales incorrectos.');window.location.href='./../../login.php';</script>";  
	}

?>