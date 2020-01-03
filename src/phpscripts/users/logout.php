<?php 
session_start();
unset($_SESSION['user']);
unset($_SESSION['privilege']);
session_destroy(); 
echo "<script>
		alert('Sesion finalizada correctamente. Pulsa aceptar para acceder a la pantalla principal.');
		window.location.href='../../index.php';
		</script>";  
?>