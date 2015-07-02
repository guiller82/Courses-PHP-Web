<?php 


include ('tiracurso.php');

$submit=$_GET[submit]; 

switch($submit)
{

case 'Buscar':
Buscador($_GET['buscador'], $quePais); //esta funcion esta en tiracurso.php
break;

case 'Institucion':
// echo desabreviarPais('CRC');
ordenaInstitucion($_GET['institucion']); //esta funcion esta en tiracurso.php
break;

}



include ('paginator.php');

?>