<?php 

include 'DbConfig.php';
$mysqli = mysqli_connect($dbserver,$dbuser,$dbpass,$db);

//session_start();
echo '<script src="../../js/addfavpoke.js"></script>';
echo' <script>
function test(){
    var input = document.getElementById("fav-icon");
    if(input.classList.contains("not-fav")){';
    if(isset($_SESSION['user'])){
        echo'
    document.getElementById("fav-icon").classList.add("fav");
    document.getElementById("fav-icon").classList.remove("not-fav");
    input.src = "../../pictures/other/pokeball.png";
    var feedback = document.getElementById("msg-show");
    feedback.innerHTML = "Capturado! El pokemon se ha guardado en tu PC!";
    var fadeTarget = document.getElementById("msg-show");
    fadeTarget.style.opacity = 1;
    var fadeEffect = setInterval(function () {
        if (!fadeTarget.style.opacity) {
            fadeTarget.style.opacity = 1;
        }
        if (fadeTarget.style.opacity > 0) {
            fadeTarget.style.opacity -= 0.1;
        } else {
            clearInterval(fadeEffect);
        }
    }, 200);
    addFavorite('.$_GET['num'].');';
    }else{
        echo'window.alert("Necesitas iniciar sesión para guardar pokemons como favoritos")';
    }
    

    echo'}else{
        document.getElementById("fav-icon").classList.remove("fav");
        document.getElementById("fav-icon").classList.add("not-fav");
        input.src = "../../pictures/other/alt-pokeball.png";
        var feedback = document.getElementById("msg-show");
        feedback.innerHTML = "Has liberado a este pokemon. ¡Adiós!";
        var fadeTarget = document.getElementById("msg-show");
        fadeTarget.style.opacity = 1;
        var fadeEffect = setInterval(function () {
            if (!fadeTarget.style.opacity) {
                fadeTarget.style.opacity = 1;
            }
            if (fadeTarget.style.opacity > 0) {
                fadeTarget.style.opacity -= 0.1;
            } else {
                clearInterval(fadeEffect);
            }
        }, 200);
	removeFavorite('.$_GET['num'].');
    }
}
</script>';

if(isset($_SESSION['user'])){
    if(!$mysqli){
        echo "<script>
        alert ('Error al conectar con la base de datos. Pulsa aceptar para volver a inicio.');
        window.location.href='../../registro.php';
        </script>";
        die("Fallo al conectar con Mysql: ".mysqli_connect_error());
    } 
    $sql = " SELECT pokemon FROM favoritos WHERE username= '". $_SESSION['user']."' AND pokemon= '".$_GET['num']."'";
    $result = mysqli_query($mysqli,$sql);   
    if (mysqli_num_rows($result) > 0){
        echo'<input id="fav-icon" class="fav" style="cursor:grab" type="image" width="40px" onclick="test()" src="../../pictures/other/pokeball.png"/>';
    }else { 
        echo'<input id="fav-icon" class="not-fav" style="cursor:grab" type="image" width="40px" onclick="test()" src="../../pictures/other/alt-pokeball.png"/>';
    }    
}else{
    echo'<input id="fav-icon" class="not-fav" style="cursor:grab" type="image" width="40px" onclick="test()" src="../../pictures/other/alt-pokeball.png"/>';
}

echo '<script>
var input = document.getElementById("fav-icon");
input.onmouseover = function(){
    input.src = "../../pictures/other/pokeball.png";
    if(input.classList.contains("fav")){
        input.src = "../../pictures/other/alt-pokeball.png";
    }
};
input.onmouseout = function(){
    if(input.classList.contains("not-fav")){
        input.src = "../../pictures/other/alt-pokeball.png";
    }else{
        input.src = "../../pictures/other/pokeball.png";
    }
};
</script>';
mysqli_close($mysqli);
?>
