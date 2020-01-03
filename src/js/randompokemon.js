function rand_poke(){
    aux = Math.floor((Math.random() * 801) + 1);
    window.location.href = "./viewpokemon.php?num=" + aux;
}
