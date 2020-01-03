<?php
	session_start(); 
	$oldpass = $_REQUEST["oldpassword"];
	$newpass1 = $_REQUEST["newpassword"];
	$newpass2 = $_REQUEST["newrepeatpassword"];
	
	if (isset($_REQUEST['user']) && $_SESSION['privilege']=="admin"){
		$email=$_REQUEST['user'];
	}else{
		$email=$_SESSION['user'];
	}	
    
	include '../other/DbConfig.php';
    	if(strlen($newpass1) >= 6){
    		$mysqli = mysqli_connect($dbserver,$dbuser,$dbpass,$db);
		if(!$mysqli){
			die("Fallo al conectar con Mysql: ".mysqli_connect_error());
		}
	
		$sql = "SELECT * FROM user WHERE email=\"".$email."\" AND password=\"".$oldpass."\";";
	
		$resultado = mysqli_query($mysqli,$sql);
		if(mysqli_num_rows($resultado)==0){
			echo "<script>
				alert('Contraseña incorrecta.');
				window.location.href='./../../editprofile.php';
			</script>"; 
		}else{
			if($newpass1==$newpass2){
				$sql = "UPDATE user SET password='".$newpass1."' WHERE email='$email'";
				$resultado = mysqli_query($mysqli,$sql);
				echo "<script>
					alert('Datos modificados correctamente.');
				window.location.href='../../dashboard.php';
				</script>";  

			}else{
				echo "<script>
				alert('El nuevo password no se corresponde con el repetido');
			window.location.href='../../editprofile.php';
			</script>"; 
			}
		}
    	}else{
        	echo "<script>
			alert('La longitud de la nueva contraseña debe ser mayor a 6');
		window.location.href='../../editprofile.php';
		</script>"; 
    }
?>
