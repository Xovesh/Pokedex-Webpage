<?php   
    //include '../gettypecolor.php';
    include 'DbConfig.php';
    echo '<hr>';
    if(isset($_SESSION['user'])){
        echo '<div style="text-align:center; font-size:2em;">Pokemon del día</div>';
    }
    srand( (int)date('jmY'));
    $pokemons = simplexml_load_file("./data/xml/pokemon.xml");
    $aux = rand(); 
    $num = ( abs($aux) % $pokemons['last_id'] ) +1;
    foreach ($pokemons->generacion as $generation){
        foreach($generation->pokemon as $pokup){          
            if ($pokup['id'] == $num){
                $pok = $pokup;
                break;
            }
        }
    }
    echo('<div class="row">
            <div class="col-5">
            <a href="./../../viewpokemon.php?num='.$pok['id'].'">
            <img class="img-fluid float-left" src="'.$pok->picture_local.'"
                 onerror="this.onerror=null; this.src=\''.$pok->picture_web.'\'"; alt="'.$pok->name.'">
            </a>    
        </div>
        <div class="col-7">
            <h1 class="card-title text-center">'.$pok->name);

    if(isset($_SESSION['user'])){
        //Get a list of file paths using the glob function.
        $mysqli = mysqli_connect($dbserver,$dbuser,$dbpass,$db);
        if(!$mysqli){
            echo "<script>
            alert ('Error al conectar con la base de datos. Pulsa aceptar para volver a inicio.');
            window.location.href='../../registro.php';
            </script>";
            die("Fallo al conectar con Mysql: ".mysqli_connect_error());
        } 
        $sql = "SELECT pokemon FROM favoritos WHERE username='". $_SESSION['user']."'";
        $result = mysqli_query($mysqli,$sql);
        $flag1 = TRUE;
        while($row = mysqli_fetch_array($result)){
            if($row['pokemon'] == $pok['id']){
                $flag1 = FALSE;
                echo '&nbsp;<img width="5%" src="../../pictures/other/pokeball.png">';
            }
        }
        if($flag1){
             echo '&nbsp;<img width="5%" src="../../pictures/other/alt-pokeball.png">';
        }
    }

    echo ('</h1>
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
            <th scope="row">Tipos</th>');
	echo('<td>'.get_Type_Color(strtoupper($pok->type1)));
    if($pok->type2 != 'nan'){
        echo('&nbsp;&nbsp;'.get_Type_Color(strtoupper($pok->type2)).'</td>');
    }else{
        echo '</td>';    
    }
    echo('</tr>
            </tbody>
        </table>
    </div></div>');
echo("<hr>");
?>
