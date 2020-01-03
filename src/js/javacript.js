
function calcular_total(){
	var attack = document.getElementById('attack').value;
	var defense = document.getElementById('defense').value;
	var sp_defense = document.getElementById('sp_defense').value;
	var sp_attack = document.getElementById('sp_attack').value;;
	var speed = document.getElementById('speed').value;
	var hp = document.getElementById('hp').value;
	document.getElementById('base_total').value =  (Number(attack) + Number(sp_attack) + Number(defense) + Number(sp_defense) + Number(speed) + Number(hp));
}