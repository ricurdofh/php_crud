<?php
	/*
	 * Desarrollado por Ricardo Vargas
	 * Controlador para el login
	*/

session_start();
include_once('variables.php'); //Include Environment variables
include_once('admin/dbFunctions.php'); //Include Db functions
$tarea = $_GET['tarea'];

/////////TAREA LOGIN DEL AGENTE////////////////////////////////
if ($tarea == 'loginUsuario'){
	//Obtenemos las variables de Login del Agente
	$v_usuario = $_POST['v_usuario'];
	$v_clave = md5($_POST['v_clave']);
	if($dataUsuario = loginBD($v_usuario, $v_clave)) {
		$_SESSION['sessi_tipo'] = 1;
		echo $SERVER . 'admin/index.php';
	}
	else
		echo $SERVER . 'login.php?us=error';
}
////////////////////////////////////////////////////////////////////////////////
?>