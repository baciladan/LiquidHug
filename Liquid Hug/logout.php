<?php
//Initializam sesiunea
session_start();
//Resetam toate variabilele de sesiune
$_SESSION = array();
//Distrugem sesiunea
session_destroy();
//Redirectionam catre mainpage
header("location: login.php");
exit;
?>