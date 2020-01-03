<?php session_start(); ?>

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
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Información</a>
                        </li>
                        <li >
                            <div id="msg-show" style="position:absolute; right:0; margin-right:60px; color:green;"></div>
                            <div style="position:absolute; right:0; margin-right:10px;">
                                <?php include("phpscripts/other/getFavIcon.php"); ?>
                            </div>                        
                        </li>                        
                        <!--
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pictures</a>
                        </li>
                        -->
                    </ul>
                </div>
                <div class="card-body">
                    <?php include('phpscripts/pokedex/getpokemon.php'); ?>
                </div>
            </div>
        </div>
        <!-- contenido fin -->
        <!-- Footer inicio-->
        <div class="container-fluid top">
            <?php include("phpscripts/other/footer.php"); ?>
        </div>
        <!-- Footer fin-->
    </div>
    <!-- CENTRO fin -->
</div>
</body>
</html>
