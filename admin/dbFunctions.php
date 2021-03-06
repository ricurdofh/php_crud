<?php
	/*
	 * Desarrollado por Ricardo Vargas
	 * Funciones para gestion de bases de las bases de datos con PDO
	*/
 
 /*
  * Conexion con la BD 
  * Usuario de mysql; root
  * Pass; 123
 */
function connectDB() {
	try {
		$db = new PDO('mysql:host=localhost;dbname=intotechs;charset=utf8', 'root', '123');	
		return $db ;
	}
	catch(PDOException $e) {
    	/*** Mensaje de error al conectar con la BD ***/
    	echo $e->getMessage() . 'Problema de Conexión a la Base de Datos... Intentelo mas tarde';
		exit;
    }
}

/* 
 * Verifica que los datos 
 * ingresados existan en la BD 
 * para permitir el acceso
 */
function loginBD($v_usuario, $v_clave) {
	$db = connectDB();
	$queryStmt = $db->prepare('SELECT * FROM e_usuarios WHERE v_usuario = :v_usuario AND v_clave = :v_clave');
	$queryStmt->bindParam(':v_usuario', $v_usuario, PDO::PARAM_STR, 100); 
	$queryStmt->bindParam(':v_clave', $v_clave, PDO::PARAM_STR, 50); 
	$queryStmt->execute();
	$db = null; //Cierra la conexion
	return ($queryStmt->fetch());
}
/* 
 * Buscar clientes en la base de datos
 */
function listarClientesBD() {
  $db = connectDB();
  $queryStmt = $db->prepare('SELECT * FROM e_clientes');
  $queryStmt->execute();
  $db = null; //Cierra la conexion
  return ($queryStmt->fetchAll());
}
/* 
 * Buscar vendedores en la base de datos
 */
function listarVendedoresBD() {
  $db = connectDB();
  $queryStmt = $db->prepare('SELECT * FROM e_vendedores');
  $queryStmt->execute();
  $db = null; //Cierra la conexion
  return ($queryStmt->fetchAll());
}
/* 
 * Eliminar clientes de la base de datos
 */
function eliminarClienteBD($i_idcliente) {
  $db = connectDB();
  $queryStmt = $db->prepare('DELETE FROM e_clientes WHERE i_idcliente = :i_idcliente LIMIT 1');
  $queryStmt->bindParam(':i_idcliente', $i_idcliente, PDO::PARAM_STR, 100); 
  $queryStmt->execute();
  $db = null; //Cierra la conexion
  return ($queryStmt->fetchAll());
}
/* 
 * Eliminar relacion cliente - vendedor de la base de datos
 */
function eliminarRelacionClienteBD($i_idcliente) {
  $db = connectDB();
  $queryStmt = $db->prepare('DELETE FROM r_cliente_vendedor WHERE i_idcliente = :i_idcliente');
  $queryStmt->bindParam(':i_idcliente', $i_idcliente, PDO::PARAM_STR, 100); 
  $queryStmt->execute();
  $db = null; //Cierra la conexion
  return ($queryStmt->fetchAll());
}
/* 
 * Cantidad de vendedores de un cliente
 */
function vendedoresClienteBD($i_idcliente) {
  $db = connectDB();
  $queryStmt = $db->prepare('SELECT * FROM r_cliente_vendedor WHERE i_idcliente = :i_idcliente');
  $queryStmt->bindParam(':i_idcliente', $i_idcliente, PDO::PARAM_STR, 100); 
  $queryStmt->execute();
  $db = null; //Cierra la conexion
  return ($queryStmt->fetchAll());
}
/* 
 * Guardar cliente nuevo
 */
function saveClienteBD($v_nombre,$v_apellido,$v_email,$v_telefono,$v_ciudad,$v_cedula,$v_direccion) {
  $db = connectDB();
  $queryStmt = $db->prepare('INSERT INTO e_clientes (v_nombre, v_apellido, v_email, v_telefono, v_ciudad, v_cedula, v_direccion) VALUES (:v_nombre, :v_apellido, :v_email, :v_telefono, :v_ciudad, :v_cedula, :v_direccion)');
  $queryStmt->bindParam(':v_nombre', $v_nombre, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_apellido', $v_apellido, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_telefono', $v_telefono, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_ciudad', $v_ciudad, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_cedula', $v_cedula, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_email', $v_email, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_direccion', $v_direccion, PDO::PARAM_STR, 100); 
  $queryStmt->execute();
  $i_idcliente = $db->lastInsertId();
  $db = null; //Cierra la conexion
  return ($i_idcliente);
}
/* 
 * Guardar vendedor nuevo
 */
function saveVendedorBD($v_nombre,$v_apellido,$v_telefono,$v_cedula) {
  $db = connectDB();
  $queryStmt = $db->prepare('INSERT INTO e_vendedores (v_nombre, v_apellido, v_telefono, v_cedula) VALUES (:v_nombre, :v_apellido, :v_telefono, :v_cedula)');
  $queryStmt->bindParam(':v_nombre', $v_nombre, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_apellido', $v_apellido, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_telefono', $v_telefono, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_cedula', $v_cedula, PDO::PARAM_STR, 100); 
  $queryStmt->execute();
  $db = null; //Cierra la conexion
  return ($queryStmt->fetchAll());
}
/* 
 * Guardar relacion cliente - vendedor
 */
function r_cliente_vendedorBD($i_idcliente, $i_idvendedor) {
  $db = connectDB();
  $queryStmt = $db->prepare('INSERT INTO r_cliente_vendedor (i_idcliente, i_idvendedor) VALUES (:i_idcliente, :i_idvendedor)');
  $queryStmt->bindParam(':i_idcliente', $i_idcliente, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':i_idvendedor', $i_idvendedor, PDO::PARAM_STR, 100); 
  $queryStmt->execute();
  $db = null; //Cierra la conexion
  return ($queryStmt->fetchAll());
}
/* 
 * Obtener datos del cliente
 */
function datosClienteBD($i_idcliente) {
  $db = connectDB();
  $queryStmt = $db->prepare('SELECT * FROM e_clientes WHERE i_idcliente = :i_idcliente');
  $queryStmt->bindParam(':i_idcliente', $i_idcliente, PDO::PARAM_INT, 200); //Automatically sanitized by PDO
  $queryStmt->execute();
  $db = null; //Cierra la conexion
  return ($queryStmt->fetch());
}
/* 
 * Obtener vendedores de un cliente
 */
function cliente_vendedorBD($i_idcliente) {
  $db = connectDB();
  $queryStmt = $db->prepare('SELECT * FROM r_cliente_vendedor WHERE i_idcliente = :i_idcliente');
  $queryStmt->bindParam(':i_idcliente', $i_idcliente, PDO::PARAM_INT, 200); //Automatically sanitized by PDO
  $queryStmt->execute();
  $db = null; //Cierra la conexion
  return ($queryStmt->fetchAll());
}
/* 
 * Actializar cliente modificado
 */
function actualizaClienteBD($i_idcliente,$v_nombre,$v_apellido,$v_email,$v_telefono,$v_ciudad,$v_cedula,$v_direccion) {
  $db = connectDB();
  $queryStmt = $db->prepare('UPDATE e_clientes SET v_nombre=:v_nombre, v_apellido=:v_apellido, v_email=:v_email, v_telefono=:v_telefono, v_ciudad=:v_ciudad, v_cedula=:v_cedula, v_direccion=:v_direccion WHERE i_idcliente = :i_idcliente');
  $queryStmt->bindParam(':i_idcliente', $i_idcliente, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_nombre', $v_nombre, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_apellido', $v_apellido, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_telefono', $v_telefono, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_ciudad', $v_ciudad, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_cedula', $v_cedula, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_email', $v_email, PDO::PARAM_STR, 100); 
  $queryStmt->bindParam(':v_direccion', $v_direccion, PDO::PARAM_STR, 100); 
  $queryStmt->execute();
  $db = null; //Cierra la conexion
  return ($queryStmt->fetchAll());
}
?>
