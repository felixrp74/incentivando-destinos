<?php 
$server="localhost"; 
$username="idecaper_uservis"; 
$password="Di0%$#1nkz[4"; 
$dataBase="idecaper_visi";

$link=mysqli_connect($server, $username, $password) 
      or die("Problemas en la conexión: ".mysql_error());

$db=mysqli_select_db($link, $dataBase) 
        or die("Problemas al seleccionar la base de datos: ".mysql_error()); 
?>