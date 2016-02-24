  /*::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
 :::::::::::::::::::::::::::::::::::::::::::::SECCION DE ADMINISTRAR CLIENTES:::::::::::::::::::::::::::::
 :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::*/

  //////////////////FUNCION QUE MUESTRA LA LISTA DE CLIENTES///////////////////////////////////////////////
  function listarClientes() {
    var params;
    enviarAjax(params, 'listarClientes');
  }

  //////////////////FUNCION QUE MUESTRA LA LISTA DE VENDEDORES///////////////////////////////////////////////
  function listarVendedores() {
    var params;
    enviarAjax(params, 'listarVendedores');
  }

  //////////////////FUNCION PARA ELIMINAR CLIENTE///////////////////////////////////////////////
  function eliminarCliente(i_idcliente) {
    if(confirm("¿Está seguro que desea eliminar este cliente?")){
      var params = 'i_idcliente=' + i_idcliente;
      enviarAjax(params, 'eliminarCliente'); 
    }
  }

  //////////////////FUNCION PARA AGREGAR CLIENTE///////////////////////////////////////////////
  function addCliente() {
   var params;
   enviarAjax(params, 'addCliente');  
 }

  //////////////////FUNCION PARA AGREGAR VENDEDOR///////////////////////////////////////////////
  function addVendedor() {
   var params;
   enviarAjax(params, 'addVendedor');  
 }

  //////////////////FUNCION PARA EDITAR CLIENTE///////////////////////////////////////////////
  function editCliente(i_idcliente) {
    var params = 'i_idcliente=' + i_idcliente;
    enviarAjax(params, 'editCliente');  
 }

  //////////////////FUNCION PARA GUARDAR CLIENTE///////////////////////////////////////////////
  function saveCliente() 
  {
    var v_nombre = document.getElementById('v_nombre').value;
    var v_apellido = document.getElementById('v_apellido').value;
    var v_telefono = document.getElementById('v_telefono').value;
    var v_email = document.getElementById('v_email').value;
    var r_vendedor = document.getElementById('r_vendedor');
    var v_ciudad = document.getElementById('v_ciudad').value;
    var v_cedula = document.getElementById('v_cedula').value;
    var v_direccion = document.getElementById('v_direccion').value;

    var vendedores = new Array();
    for (var i = 0; i < r_vendedor.selectedOptions.length; i++) {
      vendedores[i] = r_vendedor.selectedOptions[i].value;
    }

    if (v_nombre==null || v_nombre=="" || v_nombre.length < 2) 
    {
      alert("El campo Nombre del formulario debe tener al menos 3 caracteres");
      document.getElementById('v_nombre').style.background = 'red';
      document.getElementById('v_nombre').style.color = 'white';
      return false;
    }
    if (v_apellido==null || v_apellido=="" || v_apellido.length < 3) 
    {
      alert("El campo Apellido del formulario debe tener al menos 3 caracteres");
      document.getElementById('v_apellido').style.background = 'red';
      document.getElementById('v_apellido').style.color = 'white';
      return false;
    }
    if (v_telefono==null || v_telefono=="" || v_telefono.length < 7) 
    {
      alert("El campo Teléfono del formulario debe tener al menos 7 numeros");
      document.getElementById('v_telefono').style.background = 'red';
      document.getElementById('v_telefono').style.color = 'white';
      return false;
    }

    var atpos=v_email.indexOf("@");
    var dotpos=v_email.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=v_email.length){
      alert("La dirección de Email no tiene un formato válido");
      document.getElementById('v_email').style.background = 'red';
      document.getElementById('v_email').style.color = 'white';
      return false;
    }
    if (v_cedula==null || v_cedula=="" || v_cedula.length < 4) 
    {
      alert("El campo Cédula del formulario debe tener al menos 4 caracteres");
      document.getElementById('v_cedula').style.background = 'red';
      document.getElementById('v_cedula').style.color = 'white';
      return false;
    }
    if (v_ciudad==null || v_ciudad=="") 
    {
      alert("Debe ingresar su ciudad de habitación");
      document.getElementById('v_ciudad').style.background = 'red';
      document.getElementById('v_ciudad').style.color = 'white';
      return false;
    }
    if (v_direccion==null || v_direccion=="") 
    {
      alert("Debe ingresar su dirección");
      document.getElementById('v_direccion').style.background = 'red';
      document.getElementById('v_direccion').style.color = 'white';
      return false;
    }

    var params = 'v_nombre=' + v_nombre + '&v_apellido=' + v_apellido + '&v_telefono=' + v_telefono + '&v_email=' + 
    v_email + '&r_vendedor=' + vendedores + '&v_ciudad=' + v_ciudad + '&v_direccion=' + v_direccion + '&v_cedula=' + v_cedula;
    enviarAjax(params, 'saveCliente');

}

  //////////////////FUNCION PARA GUARDAR VENDEDOR///////////////////////////////////////////////
  function saveVendedor() 
  {
    var v_nombre = document.getElementById('v_nombre').value;
    var v_apellido = document.getElementById('v_apellido').value;
    var v_telefono = document.getElementById('v_telefono').value;
    var v_cedula = document.getElementById('v_cedula').value;

    if (v_nombre==null || v_nombre=="" || v_nombre.length < 2) 
    {
      alert("El campo Nombre del formulario debe tener al menos 3 caracteres");
      document.getElementById('v_nombre').style.background = 'red';
      document.getElementById('v_nombre').style.color = 'white';
      return false;
    }
    if (v_apellido==null || v_apellido=="" || v_apellido.length < 3) 
    {
      alert("El campo Apellido del formulario debe tener al menos 3 caracteres");
      document.getElementById('v_apellido').style.background = 'red';
      document.getElementById('v_apellido').style.color = 'white';
      return false;
    }
    if (v_telefono==null || v_telefono=="" || v_telefono.length < 7) 
    {
      alert("El campo Teléfono del formulario debe tener al menos 7 numeros");
      document.getElementById('v_telefono').style.background = 'red';
      document.getElementById('v_telefono').style.color = 'white';
      return false;
    }
    if (v_cedula==null || v_cedula=="" || v_cedula.length < 4) 
    {
      alert("El campo Cédula del formulario debe tener al menos 4 caracteres");
      document.getElementById('v_cedula').style.background = 'red';
      document.getElementById('v_cedula').style.color = 'white';
      return false;
    }

    var params = 'v_nombre=' + v_nombre + '&v_apellido=' + v_apellido + '&v_telefono=' + v_telefono + '&v_cedula=' + v_cedula;
    enviarAjax(params, 'saveVendedor');

}

  //////////////////FUNCION PARA ACTUALIZAR CLIENTE MODIFICADO///////////////////////////////////////////////
  function actualizaCliente(i_idcliente) 
  {
    var v_nombre = document.getElementById('v_nombre').value;
    var v_apellido = document.getElementById('v_apellido').value;
    var v_telefono = document.getElementById('v_telefono').value;
    var v_email = document.getElementById('v_email').value;
    var r_vendedor = document.getElementById('r_vendedor');
    var v_ciudad = document.getElementById('v_ciudad').value;
    var v_cedula = document.getElementById('v_cedula').value;
    var v_direccion = document.getElementById('v_direccion').value;

    var vendedores = new Array();
    for (var i = 0; i < r_vendedor.selectedOptions.length; i++) {
      vendedores[i] = r_vendedor.selectedOptions[i].value;
    }

    if (v_nombre==null || v_nombre=="" || v_nombre.length < 2) 
    {
      alert("El campo Nombre del formulario debe tener al menos 3 caracteres");
      document.getElementById('v_nombre').style.background = 'red';
      document.getElementById('v_nombre').style.color = 'white';
      return false;
    }
    if (v_apellido==null || v_apellido=="" || v_apellido.length < 3) 
    {
      alert("El campo Apellido del formulario debe tener al menos 3 caracteres");
      document.getElementById('v_apellido').style.background = 'red';
      document.getElementById('v_apellido').style.color = 'white';
      return false;
    }
    if (v_telefono==null || v_telefono=="" || v_telefono.length < 7) 
    {
      alert("El campo Teléfono del formulario debe tener al menos 7 numeros");
      document.getElementById('v_telefono').style.background = 'red';
      document.getElementById('v_telefono').style.color = 'white';
      return false;
    }

    var atpos=v_email.indexOf("@");
    var dotpos=v_email.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=v_email.length){
      alert("La dirección de Email no tiene un formato válido");
      document.getElementById('v_email').style.background = 'red';
      document.getElementById('v_email').style.color = 'white';
      return false;
    }
    if (v_cedula==null || v_cedula=="" || v_cedula.length < 4) 
    {
      alert("El campo Cédula del formulario debe tener al menos 4 caracteres");
      document.getElementById('v_cedula').style.background = 'red';
      document.getElementById('v_cedula').style.color = 'white';
      return false;
    }
    if (v_ciudad==null || v_ciudad=="") 
    {
      alert("Debe ingresar su ciudad de habitación");
      document.getElementById('v_ciudad').style.background = 'red';
      document.getElementById('v_ciudad').style.color = 'white';
      return false;
    }
    if (v_direccion==null || v_direccion=="") 
    {
      alert("Debe ingresar su dirección");
      document.getElementById('v_direccion').style.background = 'red';
      document.getElementById('v_direccion').style.color = 'white';
      return false;
    }

    var params = 'v_nombre=' + v_nombre + '&v_apellido=' + v_apellido + '&v_telefono=' + v_telefono + '&v_email=' + v_email + '&r_vendedor=' + vendedores + '&v_ciudad=' + v_ciudad + '&v_direccion=' + v_direccion + '&v_cedula=' + v_cedula + '&i_idcliente=' + i_idcliente;
    enviarAjax(params, 'actualizaCliente');

}

  ////////////////////////////////////////////ENVIO DE PARAMETROS//////////////////////////////////////////
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
    document.getElementById(tarea).innerHTML = '<div align="center"><br><br>' + '<img src="../images/loadingBar.gif">' + 
    '<p style="color:#FFFFFF">Cargando...</p></div>';
    self.xmlHttpReq.open('POST', server + 'admin/administradorControlador.php?tarea=' + tarea, true);
    self.xmlHttpReq.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    self.xmlHttpReq.onreadystatechange = function() {
      if (self.xmlHttpReq.readyState == 4) {
        if(tarea=="listarClientes"){
          document.getElementById(tarea).innerHTML = self.xmlHttpReq.responseText;
          notify('Lista de Clientes');	
          refrescar ();
        }
        else if(tarea=="listarVendedores"){
          document.getElementById(tarea).innerHTML = self.xmlHttpReq.responseText;
          notify('Lista de Vendedores');  
          refrescar ();
        }
        else if(tarea=="eliminarCliente"){
          document.getElementById(tarea).innerHTML = self.xmlHttpReq.responseText;
          notify('Cliente eliminado');  
        }
        else if(tarea=="addCliente"){
          document.getElementById(tarea).innerHTML = self.xmlHttpReq.responseText;
        }
        else if(tarea=="saveCliente"){
          document.getElementById(tarea).innerHTML = self.xmlHttpReq.responseText;
          notify('Cliente guardado');  
        }
        else if(tarea=="addVendedor"){
          document.getElementById(tarea).innerHTML = self.xmlHttpReq.responseText;
        }
        else if(tarea=="saveVendedor"){
          document.getElementById(tarea).innerHTML = self.xmlHttpReq.responseText;
          notify('Vendedor guardado');  
        }
        else if(tarea=="editCliente"){
          document.getElementById(tarea).innerHTML = self.xmlHttpReq.responseText;
        }
        else if(tarea=="actualizaCliente"){
          document.getElementById(tarea).innerHTML = self.xmlHttpReq.responseText;
          notify('Cliente actualizado');  
        }
      }
    }
    self.xmlHttpReq.send(params);
  }
