<?php
include '../other/DbConfig.php';
function generateRandom($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+-';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
$hiddenid= base64_encode(generateRandom(6));
$username= $_REQUEST['username'];
$email= $_REQUEST['email'];
$password= $_REQUEST['password'];
$passwordrepeat= $_REQUEST['passwordrepeat'];
$name= $_REQUEST['name'];
$surname= $_REQUEST['surname'];
$birthDate= $_REQUEST['birthDate'];
$phoneNumber= $_REQUEST['phoneNumber'];
$sex= $_REQUEST['sex'];
$country= $_REQUEST['country'];
$city= $_REQUEST['city'];
$address= $_REQUEST['address'];
//Comprobacion vacios
if ($email==""||$username==""||$passwordrepeat==""||$password=="") {
    echo "<script>
    alert ('Campos vacios. Pulsa aceptar para volver a inicio.');
    window.location.href='../../registro.php';
    </script>";
  die( "Empty data");
}
// Comprobacion email formato email.
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>
    alert ('Formato de email incorrecto. Pulsa aceptar para volver a inicio.');
    window.location.href='../../registro.php';
    </script>";
  die( "Invalid email format");
}
//comprobacion pass entre 6 y 100 chars
if (strlen($password) < 6 || strlen($password)>100){
    echo "<script>
    alert ('La contraseña debe teber entre 6 y 100 caracteres. Pulsa aceptar para volver a inicio.');
    window.location.href='../../registro.php';
    </script>";
   die("Password must be between 6 and 100 characters long.");
}  
// comprobacion pass
if ($password!=$passwordrepeat){
    echo "<script>
    alert ('La contraseñas no coinciden. Pulsa aceptar para volver a inicio.');
    window.location.href='../../registro.php';
    </script>";
   die("Passwords are not equal.");
} 
//Conexion a la base de datos.          
$mysqli = mysqli_connect($dbserver,$dbuser,$dbpass,$db);
if(!$mysqli){
    echo "<script>
    alert ('Error al conectar con la base de datos. Pulsa aceptar para volver a inicio.');
    window.location.href='../../registro.php';
    </script>";
    die("Fallo al conectar con Mysql: ".mysqli_connect_error());
}
//Insert a la base de datos
$sql= 'Insert INTO user (hiddenid, registerdate,rank,username,email,password,name,lastnames,birthdate,telephone,gender,country, city, address)
VALUES (\''.$hiddenid.'\',CURDATE(), 1 ,\''.$username.'\',\''.$email.'\',\''.$password.'\',\''.$name.'\',\''.$surname.'\',\''
.$birthDate.'\',\''.$phoneNumber.'\',\''.$sex.'\',\''.$country.'\',\''.$city.'\',\''.$address.'\')';
if (!mysqli_query($mysqli,$sql)){
    echo ("<script>
     alert (\"".($mysqli->error)."\");
    window.location.href='../../registro.php';
    </script>");
    //die("The Error: ".mysqli_error($mysqli));
    } else {
    echo "<script>
    alert ('Registro completado. Pulsa aceptar para volver a inicio.');
    window.location.href='../../index.php';
    </script>";}
	mysqli_close($mysqli);

    ?>
