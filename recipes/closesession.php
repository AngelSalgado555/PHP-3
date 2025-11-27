<?php 
//Esto es para cerrar sesión
session_start(); //Iniciamos esta sesión porque es necesario para destruirla 
session_destroy(); 
header("Location: formrecipe.php");

//Esto es para borrar las cookies 
setcookie("receta", "", time()-3600);