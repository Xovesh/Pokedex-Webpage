<?php session_start(); 
				if(isset($_SESSION['privilege'])){
					echo "<script>
						alert('Ya estas logeado.');
						window.location.href='../../dashboard.php';
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
            <div class="login bg-light pad">
                <div class="row">
                    <div class="col-6">
                        <h3>Iniciar sesión</h3>
                        <form action="phpscripts/users/login.php" method="post">
                            <div class="form-group">
                                <label for="email">Correo electrónico</label>
                                <input type="email" class="form-control" name="email" id="email"
                                       aria-describedby="emailHelp"
                                       placeholder="Introducir correo electronico">
                                <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu correo
                                    electrónico con terceras personas
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                        </form>
                    </div>
                    <div class="col-6">
                        <h3>Sabias que si te registras puedes:</h3>
                        <ul>
                            <li>Crear una lista con tus pokemons favoritos.</li>
                            <li>Sentimiento interno de satisfaccion (beta).</li>
                            <li>Ayudarnos a recopilar informacion sobre ti.</li>
                            <li>Comparar pokemons (proximamente)</li>
                            <li>Disfrutar batallas pokemons online con tus amigos (proximamente)</li>
                            <li>Crear equipos pokemons (proximamente)</li>
                        </ul>
                        <hr style="margin-top: 4%;">
                        <a href="registro.php" class="btn btn-primary">Registrarse
                            ahora</a>
                    </div>
					<div id="mensaje"></div>
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