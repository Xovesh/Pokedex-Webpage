<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="#">Grupo C10 SAR</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Inicio<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pokedex.php">Pokedex</a>
            </li>
			<?php if(isset($_SESSION['user'])){
			echo'
			<li class="nav-item">
                <a class="nav-link" href="dashboard.php">Dashboard</a>
            </li>
			<li class="nav-item">
                <a class="nav-link" href="./phpscripts/users/logout.php">Cerrar sesión</a>
            </li>
			';
			}else{			
			echo'
            <li class="nav-item">
                <a class="nav-link" href="login.php">Iniciar sesión</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="registro.php">Registrarse</a>
            </li>';
			}
			?>
        </ul>
        <script src="js/randompokemon.js"></script>
        <input type="image" src="pictures/other/rand_poke_icon.png" width="60px" onclick="rand_poke()"></button>
        <form class="form-inline" method="get" action="./searcher.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
