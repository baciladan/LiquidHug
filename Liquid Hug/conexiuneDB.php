<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'liquidhug');
/* Se realizeaza conexiunea la baza de date thunderarcade */
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
//Verificam Conexiunea
if($mysqli === false){
	die("Error: Could not connect to specified database. ".$mysqli->connect_error);
}
?>
