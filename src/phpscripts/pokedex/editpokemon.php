<?php
	
	
    $num = $_POST['id'];

    $xml = simplexml_load_file("./../../data/xml/pokemon.xml");
	if ($xml === false) {
		die ('Error, no se ha podido cargar el xml.');
    }
    foreach ($xml->generacion as $generation){
	foreach($generation->pokemon as $pokup){
            if ($pokup['id'] == $num){
                $pok = $pokup;
                break;
            }
	}
    }
	
if ( $_POST['generation'] == $pok->generation){ 
    if(isset($pok)){
    	$pok->pokedex_number = $_POST['pokedex_number'];
        $pok->generation = $_POST['generation'];
        $pok->legendary = $_POST['legendary'];
        $pok->name = $_POST['name'];
        $pok->picture_local = $_POST['localimage'];
        $pok->jp_name = $_POST['name_jp'];
        $pok->picture_web = $_POST['internetimage'];
        $pok->weight_kg = $_POST['weight'];
        $pok->height_m = $_POST['height'];
        $pok->male_percentage = $_POST['male_percentage'];
        $pok->type1 = $_POST['type1'];
        $pok->type2 = $_POST['type2'];
        $pok->classification = $_POST['classification'];
        $pok->capture_rate = $_POST['capture_rate'];
        $pok->base_egg_steps = $_POST['base_egg_steps'];
        $pok->abilities = $_POST['abilities'];
        $pok->experience_growth = $_POST['experience_growth'];
        $pok->base_happiness = $_POST['base_happiness'];
        $pok->hp = $_POST['hp'];
        $pok->attack = $_POST['attack'];
        $pok->experience_growth = $_POST['experience_growth'];
        $pok->defense = $_POST['defense'];
        $pok->sp_attack = $_POST['sp_attack'];
        $pok->sp_defense = $_POST['sp_defense'];
        $pok->speed = $_POST['speed'];
        $pok->base_total = $_POST['speed'] + $_POST['sp_defense'] + $_POST['sp_attack'] + $_POST['defense'] + $_POST['attack'] + $_POST['hp'];
        $xml -> asXML('./../../data/xml/pokemon.xml');
	header('location: ./../../viewpokemon.php?num='.$num);
	}else{
		echo "<script>
			alert (Error al modificar el pokemon');
			window.location.href='./../../viewallpokemons.php';
		</script>";
	}
}else{
	unset($pok[0]);
	foreach ($xml->generacion as $generation){
            if ($generation['id'] == $_POST['generation']){
                $gen = $generation;
                break;
            }
	
    	}
	
	if(isset($gen)){
	
	$new = $gen->addChild('pokemon');
	$new->addAttribute("id", $num);
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
	$xml -> asXML('./../../data/xml/pokemon.xml');
	header('location: ./../../viewpokemon.php?num='.$num);
	}else{
		echo "<script>
			alert (Error al modificar el pokemon');
			window.location.href='./../../viewallpokemons.php';
		</script>";

	}
}
?>