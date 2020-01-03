<?php
session_start();
//Conexión a server
    include '../other/DbConfig.php';
	
    $mysqli = mysqli_connect($dbserver,$dbuser,$dbpass,$db);

    if(!$mysqli){
        echo "<script>
        alert ('Error al conectar con la base de datos. Pulsa aceptar para volver a inicio.');
        window.location.href='../../registro.php';
        </script>";
        die("Fallo al conectar con Mysql: ".mysqli_connect_error());
    } 

    $sql= "INSERT INTO favoritos VALUES ('".$_SESSION['user']."', '".$_GET['num']."')";

    if(!mysqli_query($mysqli,$sql)){
	echo 'Error';

    } else {
echo 'OK';
}
    mysqli_close($mysqli);

?>
