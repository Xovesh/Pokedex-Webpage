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
    <script src="js/pokedex.js"></script>
    <title>SAR Projecto 3 Pokedex</title>
</head>
<body onload="retrievegeneration(1)">
<!-- MENU inicio -->
<?php require("phpscripts/other/menu.php"); ?>
<!-- MENU fin -->
<!-- CENTRO inicio -->
<div class="container">
    <div id="page-content-wrapper">
        <!-- CONTENIDO inicio -->
        <div class="container-fluid top">
            <!-- pokedex inicio -->
            <div class="accordion" id="accordionPokedex">
                <!-- pokedex GEN 1 inicio -->
                <div class="card">
                    <div class="card-header" id="gen1">
                        <h2 class="mb-0">
                            <button class="btn btn-link" onclick="retrievegeneration(1)" type="button" data-toggle="collapse"
                                    data-target="#collapseGen1" aria-expanded="true" aria-controls="collapseGen1">
                                Generación 1
                            </button>
                        </h2>
                    </div>
                    <div id="collapseGen1" class="collapse show" aria-labelledby="gen1"
                         data-parent="#accordionPokedex">
                         <!--
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                    <div class="d-flex justify-content-center">
                                        <img src="pictures/pokemon/001.png"
                                             class="img-fluid pokedex_picture" alt="pokedex">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        1
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                    <div class="d-flex justify-content-center">
                                        <img src="pictures/pokemon/002.png"
                                             class="img-fluid pokedex_picture" alt="pokedex">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        2
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                    <div class="d-flex justify-content-center">
                                        <img src="pictures/pokemon/003.png"
                                             class="img-fluid pokedex_picture" alt="pokedex">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        3
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                    <div class="d-flex justify-content-center">
                                        <img src="pictures/pokemon/004.png"
                                             class="img-fluid pokedex_picture" alt="pokedex">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        4
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                    <div class="d-flex justify-content-center">
                                        <img src="pictures/pokemon/005.png"
                                             class="img-fluid pokedex_picture" alt="pokedex">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        5
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                    <div class="d-flex justify-content-center">
                                        <img src="pictures/pokemon/006.png"
                                             class="img-fluid pokedex_picture" alt="pokedex">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        6
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                    <div class="d-flex justify-content-center">
                                        <img src="pictures/pokemon/007.png"
                                             class="img-fluid pokedex_picture" alt="pokedex">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        7
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                    <div class="d-flex justify-content-center">
                                        <img src="pictures/pokemon/008.png"
                                             class="img-fluid pokedex_picture" alt="pokedex">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        8
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                    <div class="d-flex justify-content-center">
                                        <img src="pictures/pokemon/009.png"
                                             class="img-fluid pokedex_picture" alt="pokedex">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        9
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                    <div class="d-flex justify-content-center">
                                        <img src="pictures/pokemon/010.png"
                                             class="img-fluid pokedex_picture" alt="pokedex">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        10
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                    <div class="d-flex justify-content-center">
                                        <img src="pictures/pokemon/011.png"
                                             class="img-fluid pokedex_picture" alt="pokedex">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        11
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                    <div class="d-flex justify-content-center">
                                        <img src="pictures/pokemon/012.png"
                                             class="img-fluid pokedex_picture" alt="pokedex">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        12
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                    <div class="d-flex justify-content-center">
                                        <img src="pictures/pokemon/013.png"
                                             class="img-fluid pokedex_picture" alt="pokedex">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        13
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                    <div class="d-flex justify-content-center">
                                        <img src="pictures/pokemon/014.png"
                                             class="img-fluid pokedex_picture" alt="pokedex">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        14
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6">
                                    <div class="d-flex justify-content-center">
                                        <img src="pictures/pokemon/015.png"
                                             class="img-fluid pokedex_picture" alt="pokedex">
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        15
                                    </div>
                                </div>

                            </div>
                        </div>
                        -->
                    </div>
                </div>
                <!-- pokedex GEN 1 fin -->
                <!-- pokedex GEN 2 inicio -->
                <div class="card">
                    <div class="card-header" id="gen2">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" onclick="retrievegeneration(2)" type="button" data-toggle="collapse"
                                    data-target="#collapseGen2" aria-expanded="false" aria-controls="collapseGen2">
                                Generación 2
                            </button>
                        </h2>
                    </div>

                    <div id="collapseGen2" class="collapse" aria-labelledby="gen2"
                         data-parent="#accordionPokedex">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex justify-content-center">
                                Cargando espera...
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pokedex GEN 2 fin -->
                <!-- pokedex GEN 3 inicio -->
                <div class="card">
                    <div class="card-header" id="gen3">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" onclick="retrievegeneration(3)" type="button" data-toggle="collapse"
                                    data-target="#collapseGen3" aria-expanded="false" aria-controls="collapseGen3">
                                Generación 3
                            </button>
                        </h2>
                    </div>

                    <div id="collapseGen3" class="collapse" aria-labelledby="gen3"
                         data-parent="#accordionPokedex">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex justify-content-center">
                                Cargando espera...
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pokedex GEN 3 fin -->
                <!-- pokedex GEN 4 inicio -->
                <div class="card">
                    <div class="card-header" id="gen4">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" onclick="retrievegeneration(4)" type="button" data-toggle="collapse"
                                    data-target="#collapseGen4" aria-expanded="false" aria-controls="collapseGen4">
                                Generación 4
                            </button>
                        </h2>
                    </div>

                    <div id="collapseGen4" class="collapse" aria-labelledby="gen4"
                         data-parent="#accordionPokedex">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex justify-content-center">
                                Cargando espera...
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pokedex GEN 4 fin -->
                <!-- pokedex GEN 5 inicio -->
                <div class="card">
                    <div class="card-header" id="gen5">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" onclick="retrievegeneration(5)" type="button" data-toggle="collapse"
                                    data-target="#collapseGen5" aria-expanded="false" aria-controls="collapseGen5">
                                Generación 5
                            </button>
                        </h2>
                    </div>

                    <div id="collapseGen5" class="collapse" aria-labelledby="gen5"
                         data-parent="#accordionPokedex">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex justify-content-center">
                                Cargando espera...
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pokedex GEN 5 fin -->
                <!-- pokedex GEN 6 inicio -->
                <div class="card">
                    <div class="card-header" id="gen6">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" onclick="retrievegeneration(6)" type="button" data-toggle="collapse"
                                    data-target="#collapseGen6" aria-expanded="false" aria-controls="collapseGen6">
                                Generación 6
                            </button>
                        </h2>
                    </div>

                    <div id="collapseGen6" class="collapse" aria-labelledby="gen6"
                         data-parent="#accordionPokedex">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex justify-content-center">
                                Cargando espera...
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pokedex GEN 6 fin -->
                <!-- pokedex GEN 7 inicio -->
                <div class="card">
                    <div class="card-header" id="gen7">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" onclick="retrievegeneration(7)" type="button" data-toggle="collapse"
                                    data-target="#collapseGen7" aria-expanded="false" aria-controls="collapseGen7">
                                Generación 7
                            </button>
                        </h2>
                    </div>

                    <div id="collapseGen7" class="collapse" aria-labelledby="gen7"
                         data-parent="#accordionPokedex">
                        <div class="card-body">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex justify-content-center">
                                Cargando espera...
                            </div>
                        </div>
                    </div>
                </div>
                <!-- pokedex GEN 7 fin -->
            </div>
            <!-- pokedex fin -->
        </div>
        <!-- contenido fin -->
        <!-- Footer inicio-->
        <div class="container-fluid top">
            <?php require("phpscripts/other/footer.php"); ?>
        </div>
        <!-- Footer fin-->
    </div>
    <!-- CENTRO fin -->
</div>
</body>
</html>