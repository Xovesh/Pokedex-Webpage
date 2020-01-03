function addFavorite(num){
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200){
        console.log("xmlhttp.responseText");
      }
    }
    xmlhttp.open("GET","../phpscripts/pokemonteam/addfavpokemon.php?num="+num,true);
    xmlhttp.send(null);
    return;
}

function removeFavorite(num){
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200){
        console.log("xmlhttp.responseText");
      }
    }
    xmlhttp.open("GET","../phpscripts/pokemonteam/removefavpokemon.php?num="+num,true);
    xmlhttp.send(null);
    return;
}



