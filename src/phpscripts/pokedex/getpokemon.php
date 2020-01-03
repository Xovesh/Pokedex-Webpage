<?php
    $num = $_GET['num'];
    $pokemons = simplexml_load_file("./data/xml/pokemon.xml");
    foreach ($pokemons->generacion as $generation){
        foreach($generation->pokemon as $pokup){
            if ($pokup['id'] == $num){
                $pok = $pokup;
                break;
            }
        }
    }
    include("gettypecolor.php");
    echo('<div class="row">
                        <div class="col-5">
                            <img class="img-fluid float-left" src="'.$pok->picture_local.'"
                                 onerror="this.onerror=null; this.src=\''.$pok->picture_web.'\'"; alt="'.$pok->name.'">
                        </div>
                        <div class="col-7">
                            <h1 class="card-title text-center">'.$pok->name.'</h1>
                            <h4 class="card-title text-left">Información Básica</h4>
                            <table class="table table-bordered text">
                                <tbody>
                                <tr>
                                    <th scope="row">Número pokedex</th>
                                    <td>'.$pok->pokedex_number.'</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nombre</th>
                                    <td>'.$pok->name.'</td>
                                </tr>
                                <tr>
                                    <th scope="row">Nombre Japonés</th>
                                    <td>'.$pok->jp_name.'</td>
                                </tr>
                                <tr>
                                    <th scope="row">Generación</th>
                                    <td>'.$pok->generation.'</td>
                                </tr>
                                <tr>
                                    <th scope="row">Legendario</th>');
					if ($pok->legendary == 0){
                                    		echo('<td>No</td>');
					}else{
						echo('<td>Si</td>');
					}
                                echo('</tr>
                                </tbody>
                            </table>
                        </div>
                    </div>');
    echo('<hr>');

    echo('<div class="row">
                        <div class="col-12">
                            <h4 class="card-title text-left">Información Avanzada</h4>
                            <table class="table table-bordered text">
                                <thead>
                                <tr>
                                    <th scope="col">Masa</th>
                                    <th scope="col">Altura</th>
                                    <th scope="col">Porcentaje Machos</th>
                                    <th scope="col">Tipo 1</th>
                                    <th scope="col">Tipo 2</th>
                                    <th scope="col">Clasificación</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>'.$pok->weight_kg.' kg</td>
                                    <td>'.$pok->height_m.' m</td>
                                    <td>');

				if($pok->male_percentage== -1){
					echo('Sin sexo');
				}else{
					echo($pok->male_percentage).'%';
				}
                    $chars = array("[", "]", "'");
					echo('</td>
                                    <td>'.get_Type_Color(strtoupper($pok->type1)).'</td>
                                    <td>'.get_Type_Color(strtoupper($pok->type2)).'</td>
                                    <td>'.$pok->classification.'</td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-12">
                            <table class="table table-bordered text">
                                <thead>
                                <tr>
                                    <th scope="col">Ratio captura</th>
                                    <th scope="col">Pasos minimos para abrir el huevo</th>
                                    <th scope="col">Habilidades</th>
                                    <th scope="col">Experiencia para evolucionar</th>
                                    <th scope="col">Felicidad base</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>'.$pok->capture_rate.'</td>
                                    <td>'.$pok->base_egg_steps.' pasos</td>
                                    <td>'.str_replace($chars,"",$pok->abilities).'</td>
                                    <td>'.$pok->experience_growth.' Exp. Points</td>
                                    <td>'.$pok->base_happiness.'</td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>');
    echo('<hr>');

    echo('<div class="row">
                        <div class="col-12">
                            <h4 class="card-title text-left">Estadisticas</h4>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">HP</th>
                                    <th scope="col">Ataque</th>
                                    <th scope="col">Ataque Especial</th>
                                    <th scope="col">Defensa</th>
                                    <th scope="col">Defensa Especial</th>
                                    <th scope="col">Velocidad</th>
                                    <th scope="col">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>'.$pok->hp.'</td>
                                    <td>'.$pok->attack.'</td>
                                    <td>'.$pok->sp_attack.'</td>
                                    <td>'.$pok->defense.'</td>
                                    <td>'.$pok->sp_defense.'</td>
                                    <td>'.$pok->speed.'</td>
                                    <td>'.$pok->base_total.'</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>');

    $vulresxml = simplexml_load_file("./data/xml/type_result.xml");
    $vul = "";
    $res = "";
    $inm = "";
    $resval = "¼x";
    $vulval = "4x";
    $pok_type2 = $pok->type2;
    if(strtoupper($pok_type2) == 'NAN'){
        $pok_type2 = 'NONE';
        $resval = '½×';
        $vulval = '2x';
    }
    foreach ($vulresxml->type_combination as $comb){
        if( ($comb['elem1'] == strtoupper($pok->type1) and $comb['elem2'] == strtoupper($pok_type2) ) or
            ($comb['elem1'] == strtoupper($pok_type2) and $comb['elem2'] == strtoupper($pok->type1) )
            ){
            foreach($comb->vulnerability->type as $type){
                $vul = $vul . get_Type_Color($type['name']).' ';
            }
            foreach($comb->resistence->type as $type){
                $res = $res . get_Type_Color($type['name']).' ';
            }
            foreach($comb->inmunity->type as $type){
                $inm = $inm . get_Type_Color($type['name']).' ';
            }
            break;
        }
    }
    echo('<hr>');
    echo('<div class="row">
            <div class="col-12">
                <h4 class="card-title text-left">Resistencias y vulnerabilidades</h4>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Resistencias ('.$resval.')</th>
                        <th scope="col">Vulnerabilidades ('.$vulval.')</th>
                        <th scope="col">Inmunidades</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>'.$res.'</td>
                        <td>'.$vul.'</td>
                        <td>'.$inm.'</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>');

?>
