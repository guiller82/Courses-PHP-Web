<?php

$dentro=$_GET['seccion'];

switch($dentro)
{
case 'contacto': 
include ('contactoMail.php');
break;

case 'nosotros': 
include ('info/nosotros.php');
break;


case 'crearCuenta': 
include ('info/crearCuenta.php');
break;

}

?>