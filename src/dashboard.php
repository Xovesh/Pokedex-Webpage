<?php session_start(); 
				if(!isset($_SESSION['privilege'])){
					echo "<script>
						alert('Sesion no encontrada, por favor inicie session antes de entrar en esta pagina.');
						window.location.href='../../login.php';
					</script>";  
				}
?>

<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/css.css">
    <script src="js/javacript.js"></script>
    <title>SAR Projecto 3 Pokedex</title>
</head>
<body>
<!-- MENU inicio -->
<?php require("phpscripts/other/menu.php"); ?>
<!-- MENU fin -->
<!-- CENTRO inicio -->
<div class="container">
    <div id="page-content-wrapper">

        <!-- CONTENIDO inicio -->
        <div class="container-fluid top">
            <div class="bg-light pad">
                <div class="row">
                    <div class="col-6">
                        <h3>Dashboard:</h3>
                        <?php include('./phpscripts/users/menudashboard.php');?>
                    </div>
                    <div class="col-6">
                        <?php
				error_reporting(E_ALL); ini_set('display_errors', 1);
                                 include('./phpscripts/other/DbConfig.php');
                                $mysqli = mysqli_connect($dbserver,$dbuser,$dbpass,$db);
                                if(!$mysqli){
                                 die("Fallo al conectar con Mysql: ".mysqli_connect_error());
                                
                                 }
                            if (isset($_SESSION['user'])){
                                $sql = "SELECT * FROM user WHERE email=\"".$_SESSION['user']."\" ;";
                                $resultado = mysqli_query($mysqli,$sql,MYSQLI_USE_RESULT);
                                if(!$resultado){
                                    die("Error: ".mysqli_error($mysqli));
                                 }
                                 $row = mysqli_fetch_array($resultado);
                                $username = $row['username'];
                                $email=$row['email'];
                                $name=$row['name'];
                                $lastnames=$row['lastnames'];
                                $birthdate=$row['birthdate'];
                                $telephone=$row['telephone'];
                                $gender=$row['gender'];
                                $country=$row['country'];
                                $city=$row['city'];
                                $address=$row['address'];
                                echo("
                            
                        <h3> Información básica </h3>
                        <table>
                            <tbody>
                            <tr>
                                <th scope='row'>Nombre de usuario</th>
                                <td>$username</td>
                            </tr>
                            <tr>
                                <th scope='row'>Correo electrónico</th>
                                <td>$email</td>
                            </tr>
                            </tbody>
                        </table>
                        <hr>
                        <h3> Información personal </h3>
                        <table>
                            
                            <tbody>
                            <tr>
                                <th scope='row'>Nombre</th>
                                <td>$name</td>
                            </tr>
                            <tr>
                                <th scope='row'>Apellidos</th>
                                <td> $lastnames </td>
                            </tr>
                            <tr>
                                <th scope='row'>Fecha de nacimiento</th>
                                <td> $birthdate </td>
                            </tr>
                            <tr>
                                <th scope='row'>Número de telefono</th>
                                <td> $telephone </td>
                            </tr>
                            <tr>
                                <th scope='row'>Sexo</th>
                                <td> $gender </td>
                            </tr>
                            <tr>
                                <th scope='row'>País de residencia</th>
                                <td> $country </td>
                            </tr>
                            <tr>
                                <th scope='row'>Ciudad</th>
                                <td> $city </td>
                            </tr>
                            <tr>
                                <th scope='row'>Dirección</th>
                                <td> $address </td>
                                
                            
                            </tr>
                            </tbody>
							
                        </table>
                        ");
                        }else{
                         echo('Error en algún lado'.$_SESSION['user']);   
                        }
                        ?>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- contenido fin -->
        <!-- Footer inicio-->
        <div class="container-fluid top">
            <?php require("phpscripts/other/footer.php"); ?>
        </div>
        <!-- Footer fin-->
    </div>
</div>
<!-- CENTRO fin -->
</body>
</html>
