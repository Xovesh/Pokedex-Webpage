<?php

include "./phpscripts/pokedex/gettypecolor.php";
if(isset($_SESSION['user'])){
        include './phpscripts/other/DbConfig.php';
        $mysqli = mysqli_connect($dbserver,$dbuser,$dbpass,$db);
        if(!$mysqli){
            echo "<script>
            alert ('Error al conectar con la base de datos. Pulsa aceptar para volver a inicio.');
            window.location.href='../../registro.php$fileList = glob('test/*');';
            </script>";
            die("Fallo al conectar con Mysql: ".mysqli_connect_error());
        } 
        $sql = "SELECT pokemon FROM favoritos WHERE username='". $_SESSION['user']."'";
        $result = mysqli_query($mysqli,$sql);
        $pokemons = simplexml_load_file("./data/xml/pokemon.xml");
        
        echo '<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">';
        while($row = mysqli_fetch_array($result)){
            foreach ($pokemons->generacion as $generation){
                foreach($generation->pokemon as $pokup){
                    if ($pokup['id'] == $row['pokemon']){
                        $pok = $pokup;
                        break;
                    }
                }
            }

	echo('<tr>');
		echo('<th scope="row">'.$pok->pokedex_number.'</th>');
		echo('<td>'.$pok->name.'</td>');
		echo('<td>'.$pok->generation.'</td>');
		echo('<td>'.$pok->legendary.'</td>');
		echo('<td>'.get_Type_Color(strtoupper($pok->type1)).'</td>');
		echo('<td>'.get_Type_Color(strtoupper($pok->type2)).'</td>');
		echo('<td>
			<form method="get" action="viewpokemon.php">
                        	<input type="hidden" value="'.$pok['id'].'" name="num">
                                <button type="submit" class="btn btn-primary">Ver más</button>
                        </form>
		     </td>');
		echo('</tr>');

                        
        }  
        mysqli_close($mysqli);
    }else{
        echo'Inicia sesión para ver tus pokemons favoritos aquí';
    }
?>
