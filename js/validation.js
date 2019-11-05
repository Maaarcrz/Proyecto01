function validacionFormulario(){

	var user=document.getElementById('user').value;
	var password=document.getElementById('pass').value;
	//Si el campo user y password está vacío...
	if (user == '' || password == '') {
		//Mostrará este mensaje
		alert('Rellene todos los campos');
		return false;
	}else{
		//Si no continua (independientemente de que el usuario sea o no correcto)
		return true;
	}
}