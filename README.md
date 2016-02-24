# php_crud

Esta es una simplificación de un proyecto privado mas completo que realicé hace algún tiempo para control de entrenadores y usuarios
de una plataforma de fitness. Esta simplificación es solo para mostrar el trabajo con PHP en un proyecto CRUD.

Para ejecutarlo crear la base de datos con el archivo .sql

--Datos de acceso al sistema

Usuario: admin
Password: 12345

--Cambiar el archivo variables.php con el url del servidor donde se pruebe.

-- Cambiar los datos locales de acceso a mysql en admin/dbFunctions.php en la linea
$db = new PDO('mysql:host=localhost;dbname=prueba;charset=utf8', 'root', '123');
