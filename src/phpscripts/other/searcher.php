<?php
    include("./phpscripts/pokedex/gettypecolor.php");
    $num = $_GET['search'];
    $found = FALSE;
    $pokemons = simplexml_load_file("./data/xml/pokemon.xml");
    foreach ($pokemons->generacion as $generation){
        foreach($generation->pokemon as $pokup){
            if ($pokup['id'] == $num || (strpos(strtoupper($pokup->name), strtoupper($num)) !== false)){
                $pok = $pokup;
		        $found = TRUE;
                break;
            }
        }
	if($found){
		break;
	}
    }	
	
	if(isset($pok)){
		header('location: ./viewpokemon.php?num='.$pok['id']);
	}else{
		echo('<div style="font-size:1.5em; text-align:center;">No hemos encontrado nada que coincida con tu búsqueda . . .<br></div>');
        echo '<div style="font-size:2em; text-align:center;">Pero aquí está el pokemon del día!<br></div>';
        include 'getDailyPoke.php';	
}
?>
