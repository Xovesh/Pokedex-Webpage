<?php
        include './phpscripts/pokedex/gettypecolor.php';
        include 'DbConfig.php';
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
        $pokemons = simplexml_load_file("./data/xml/pokemon.xml");
        
        echo '<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">';
        $flag = TRUE;
        while($row = mysqli_fetch_array($result)){
            foreach ($pokemons->generacion as $generation){
                foreach($generation->pokemon as $pokup){
                    if ($pokup['id'] == $row['pokemon']){
                        $pok = $pokup;
                        break;
                    }
                }
            }
            if($flag == TRUE){
                echo '<div class="carousel-item active">';
                $flag = FALSE;
            }else{
                echo '<div class="carousel-item">';
            }
//            echo '<img class="d-block w-100" width="10px" src="'.$pok->picture_local.'"
//             onerror="this.onerror=null; this.src=\''.$pok->picture_web.'\'"; alt="'.$pok->name.'">';

            echo '<div class="card mb-3" style="max-width:auto;">
                      <div class="row no-gutters">
                        <div class="col-md-4">
                          <a href="./../../viewpokemon.php?num='.$row['pokemon'].'">
                            <img style="margin-left:25%" class="d-block w-100"  onerror="this.onerror=null; this.src=\''.$pok->picture_web.'\'"; src="'.$pok->picture_local.'" alt="'.$pok->name.'">
                          </a>                        
                        </div>
                        <div class="col-md-8" style="position:absolute; margin-left:30%; text-align:center;">
                          <div class="card-body">
                            <h5 class="card-title">'.$pok->name.'&nbsp;<img width="5%" src="../../pictures/other/pokeball.png"></h5>
                          </div>
                            <div>'.get_Type_Color(strtoupper($pok->type1));
                            if(strtoupper($pok->type2) != 'NAN'){
                                echo'&nbsp;&nbsp;&nbsp;'.get_Type_Color(strtoupper($pok->type2));
                            }
                            
                        echo '</div>';
                        echo ' <table class="table center table-bordered text" style="width:auto; margin: 0 auto; margin-top:25px;">
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
                                </tbody>
                             </table>';
                

                        echo'</div>
                      </div>
                </div>';
    //<p class="card-text">'.get_Type_Color(strtoupper($pok->type1)).'&nbsp'.get_Type_Color(strtoupper($pok->type2)).'</p>

            echo '</div>';
            
        }  

if (mysqli_num_rows($result) != 0){
         echo' </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span style="height: 50px;width: 50px;outline: black;background-color: rgba(0, 0, 0, 0.3);background-size: 100%, 100%;border-radius: 50%; border: 1px solid black;" class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span style="height: 50px;width: 50px;outline: black;background-color: rgba(0, 0, 0, 0.3);background-size: 100%, 100%;border-radius: 50%; border: 1px solid black;" class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>';
}else{
	echo '<h3 style="text-align: center;">¡Vaya! Parece que no tienes ningun pokemon en tu lista de favoritos </h3>';
	
}
 mysqli_close($mysqli);
    }//End de estar loggeado
echo '<div>';
    include 'getDailyPoke.php';
echo '</div>';

?>
