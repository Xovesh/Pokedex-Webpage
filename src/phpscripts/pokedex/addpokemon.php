<?php

	$genpost = $_POST['generation'];

	$pokemon = simplexml_load_file("./../../data/xml/pokemon.xml");
	foreach ($pokemon->generacion as $generation){
        	if ($generation['id'] == $genpost){
            		$gen = $generation;
	    		break;
        	}
    	}
	
	
	$new = $gen->addChild('pokemon');
	$new->addAttribute("id", $pokemon['last_id']+1);
	$pokemon['last_id'] =  $pokemon['last_id'] + 1;
	$new -> addChild('pokedex_number', $_POST['pokedex_number']);
	$new -> addChild('generation', $_POST['generation']);
    	$new -> addChild('legendary', $_POST['legendary']);
	$new -> addChild('name', $_POST['name']);
	$new -> addChild('jp_name', $_POST['name_jp']);
	$new -> addChild('picture_local', $_POST['localimage']);
	$new -> addChild('picture_web', $_POST['internetimage']);
	$new -> addChild('weight_kg', $_POST['weight']);
	$new -> addChild('height_m', $_POST['height']);
	$new -> addChild('male_percentage', $_POST['male_percentage']);
	$new -> addChild('type1', $_POST['type1']);
	$new -> addChild('type2', $_POST['type2']);
	$new -> addChild('classification', $_POST['classification']);
	$new -> addChild('capture_rate', $_POST['capture_rate']);
	$new -> addChild('base_egg_steps', $_POST['base_egg_steps']);
	$new -> addChild('abilities', $_POST['abilities']);
	$new -> addChild('experience_growth', $_POST['experience_growth']);
	$new -> addChild('base_happiness', $_POST['base_happiness']);
	$new -> addChild('hp', $_POST['hp']);
	$new -> addChild('attack', $_POST['attack']);
	$new -> addChild('defense', $_POST['defense']);
	$new -> addChild('sp_attack', $_POST['sp_attack']);
	$new -> addChild('sp_defense', $_POST['sp_defense']);
	$new -> addChild('speed', $_POST['speed']);
    	$new -> addChild('base_total', $_POST['speed'] + $_POST['sp_defense'] + $_POST['sp_attack'] + $_POST['defense'] + $_POST['attack'] + $_POST['hp']);

	$pokemon -> asXML('./../../data/xml/pokemon.xml');


	header('location: ./../../viewpokemon.php?num='.$pokemon['last_id']);

?>