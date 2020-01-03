<?php
	session_start();
	if(!isset($_SESSION['privilege'])){
		echo "<script>
			alert('Session no encontrada, por favor inicie session antes de entrar en esta pagina.');
			window.location.href='../../login.php';
		</script>";  
	}
	if ($_SESSION['privilege']!="admin"&&$_REQUEST['email']!=$_SESSION['user']){
			echo "<script>
			alert('El usuario no tiene permisos para hacer esto... ¿estas intentando hackear?');
			window.location.href='../../index.php';
		</script>";  
	}
	include '../other/DbConfig.php';
	
            $username  = $_REQUEST['username'];
			$email     = $_REQUEST['email'];
            $name      = $_REQUEST['name'];
            $lastnames = $_REQUEST['surname'];
            $birthdate = $_REQUEST['birthDate'];
            $telephone = $_REQUEST['phoneNumber'];
            $gender    = $_REQUEST['sex'];
            $country   = $_REQUEST['country'];
            $city      = $_REQUEST['city'];
            $address   = $_REQUEST['address'];					
			if(isset($email)){
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					die("Invalid email format");
				}

                $mysqli = mysqli_connect($dbserver,$dbuser,$dbpass,$db);
                if(!$mysqli){
                    die("Fallo al conectar con Mysql: ".mysqli_connect_error());
                }
                
                $sql = "UPDATE user SET username=\"".$username."\", email=\"".$email."\", name=\"".$name."\", lastnames=\"".$lastnames."\", birthdate=\"".$birthdate."\", telephone=\"".$telephone."\", gender=\"".$gender."\", country=\"".$country."\", address=\"".$address."\", city=\"".$city."\"WHERE email=\"".$email."\";";
				/*$sql = "UPDATE user SET username='".$username;*/
				if(mysqli_query($mysqli,$sql)){
					echo"<script> alert('Cambios guardados satisfactoriamente.');window.location.href='./../../dashboard.php';</script>";
					if ($_SESSION['user']==$_REQUEST['email']){
						$_SESSION['user']=$email;
					}
				}else{
					echo("Fallo message: ".mysqli_connect_error());
					echo"Error.";
				}		
    }
?>
