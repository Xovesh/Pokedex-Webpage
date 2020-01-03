function retrievegeneration(gen){
    if(XMLHttpRequest){
        xhr = new XMLHttpRequest();
    }
    else{
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open('GET','./../phpscripts/pokedex/pokedexgenx.php?gen='+gen, true);
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            document.getElementById("collapseGen"+gen).innerHTML = xhr.responseText;
	    	for(i=1; i<=7;i+=1){
			if(i!=gen){
				document.getElementById("collapseGen"+i).innerHTML ="<div class=\"card-body\"><div class=\"d-flex justify-content-center\"><div class=\"spinner-border\" role=\"status\"><span class=\"sr-only\">Loading...</span></div></div><br><div class=\"d-flex justify-content-center\">Cargando espera...</div></div>";
			}
		}
	}
    }
    xhr.send('');

}

