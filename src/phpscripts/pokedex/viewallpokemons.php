<?php
include("./phpscripts/pokedex/gettypecolor.php");
$pokemons = simplexml_load_file("./data/xml/pokemon.xml");
foreach ($pokemons->generacion as $generation){
	foreach($generation->pokemon as $pok){
		echo('<tr>');
		echo('<th scope="row">'.$pok->pokedex_number.'</th>');
		echo('<td>'.$pok->name.'</td>');
		echo('<td>'.$pok->generation.'</td>');
		echo('<td>'.$pok->legendary.'</td>');
		echo('<td>'.get_Type_Color(strtoupper($pok->type1)).'</td>');
		echo('<td>'.get_Type_Color(strtoupper($pok->type2)).'</td>');
		echo('<td>
			<form method="post" action="editpokemon.php">
                        	<input type="hidden" value="'.$pok['id'].'" name="id">
                                <button type="submit" class="btn btn-primary">Ver más</button>
                        </form>
		     </td>');
		echo('</tr>');

	}
}

?>
