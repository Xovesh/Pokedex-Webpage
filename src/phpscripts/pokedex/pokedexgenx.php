<?php
	function cmp($a, $b){
		return strcmp($a->pokedex_number, $b->pokedex_number);
	}

	$gen = $_GET['gen'];
	$pokemons = simplexml_load_file("./../../data/xml/pokemon.xml");
	foreach ($pokemons->generacion as $generation){
		if ($generation['id'] == $gen){
			$pokemongenx = $generation;
			break;
		}
		
	}
	$p = $pokemongenx->xpath('pokemon');
	usort($p, "cmp");
	echo('<div class="card-body"><div class="row">');
	foreach($p as $pok){
		echo('<div class="col-xl-2 col-lg-3 col-md-4 col-sm-5 col-6"><div class="d-flex justify-content-center">');
		echo('<br>'.$pok->name.'</div><br><div class="d-flex justify-content-center">');
		echo('<img src="'.$pok->picture_local.'"class="img-fluid pokedex_picture" onerror="this.onerror=null; this.src=\''.$pok->picture_web.'\'"; alt="'.$pok->name.'">');
		echo('</div><div class="d-flex justify-content-center">');
		echo('<form method="get" action="./../../viewpokemon.php">
                        	<input type="hidden" value="'.$pok['id'].'" name="num">
                                <button type="submit" class="btn btn-primary">Ver más</button>
                        </form>');
		echo('</div></div>');
	}

	echo('</div></div>');
	
?>
