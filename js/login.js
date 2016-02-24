function loginUsuario() {
	//var v_usuario = document.getElementById('v_usuario').value; Eliminado a Peticion del Cliente
	var v_usuario = document.getElementById('v_usuario').value;
	var v_clave = document.getElementById('v_clave').value;
	
	//Start Validations
	if (v_usuario==null || v_usuario=="") 
	{
		alert("Debe especificar un usuario");
		document.getElementById('v_usuario').style.background = 'red';
		document.getElementById('v_usuario').style.color = 'white';
	  	return false;
	}
	if (v_clave==null || v_clave=="" || v_clave.length < 4) 
	{
		alert("La Clave debe tener al menos 4 caracteres");
		document.getElementById('v_clave').style.background = 'red';
		document.getElementById('v_clave').style.color = 'white';
	  	return false;
	}
	
	var params = 'v_usuario=' + v_usuario + '&v_clave=' + v_clave;
	enviarAjax(params, 'loginUsuario');
}

//Si todo está en orden se envían los parametros 
//por ajax al controlador
function enviarAjax(params, tarea) {
	var xmlHttpReq = false;
	var self = this;
	// Mozilla/Safari
	if (window.XMLHttpRequest) {
		self.xmlHttpReq = new XMLHttpRequest();
	}
	// IE
	else if (window.ActiveXObject) {
		self.xmlHttpReq = new ActiveXObject("Microsoft.XMLHTTP");
	}
	document.getElementById(tarea).innerHTML = '<div align="center"><br><br>' + 
	'<img src="images/loadingBar.gif">' + 
	'<p>Cargando...</p></div>';
	self.xmlHttpReq.open('POST', server + 'controladorLogin.php?tarea=' + tarea, true);
	self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	self.xmlHttpReq.onreadystatechange = function() {
		if (self.xmlHttpReq.readyState == 4) {
			if (tarea == 'loginUsuario')
				window.location = self.xmlHttpReq.responseText;
			else 
				document.getElementById(tarea).innerHTML = self.xmlHttpReq.responseText;
		}
	}
	self.xmlHttpReq.send(params);
}