<?php
	if(isset($_SESSION['user'])){echo('<ul>
                            <li><a href="editprofile.php">Editar perfil</a></li>
                            <li><a href="viewfavpokemons.php">Ver mis pokemons favoritos</a></li>
                        </ul>
						');
						if($_SESSION['privilege'] == "admin"){echo('
                        <h3>Opciones avanzadas</h3>
                        <ul>
                            <li><a href="addpokemon.php">Añadir pokémon</a></li>
                            <li><a href="viewallusers.php">Base de datos: usuarios</a></li>
                            <li><a href="viewallpokemons.php">Base de datos: Pokemon</a></li>
	</ul>');}}
?>
