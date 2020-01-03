<?php session_start(); 
				if(!isset($_SESSION['privilege'])){
					echo "<script>
						alert('Session no encontrada, por favor inicie session antes de entrar en esta pagina.');
						window.location.href='../../login.php';
					</script>";  
				}
				if ($_SESSION['privilege']!="admin"){
						echo "<script>
						alert('El usuario no tiene permisos para entrar en esta pagina.');
						window.location.href='../../index.php';
					</script>";  
				}



?>


<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="utf-8">
    <!-- bootstrap -->
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
    <!--Data tables-->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <!-- Nuestros -->
    <link rel="stylesheet" href="css/css.css">
    <script src="js/javacript.js"></script>
    <title>SAR Projecto 3 Pokedex</title>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#pokemonlist').DataTable();
        });
    </script>
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
                <h3>Ver todos los pokemons</h3>
                <div class="table-responsive">
                    <table id="pokemonlist" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Número pokedex</th>
                            <th scope="col">Nombre del Pokémon</th>
                            <th scope="col">Generación</th>
                            <th scope="col">Legendario</th>
                            <th scope="col">Tipo 1</th>
                            <th scope="col">Tipo 2</th>
                            <th scope="col">Ver más</th>
                        </tr>
                        </thead>
                        <tbody>
				<?php require("phpscripts/pokedex/viewallpokemons.php"); ?>
                        </tbody>
                    </table>
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