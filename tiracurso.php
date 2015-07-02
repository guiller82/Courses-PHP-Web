<?php

include ('constantes.php'); 
    mysql_connect (SQLHOST, SQLUSERNAME, SQLPASSWORD);
    mysql_select_db(SQLDATABASE) or die('Cannot select database');
    @mysql_query("SET NAMES 'utf8'");
	


//NEWcode CONVIERTE FECHAS
function convierte_fecha($fecha_ingles)
  {
$ano=substr($fecha_ingles, 0, 4);
$mes=substr($fecha_ingles, 5, 2);
$dia=substr($fecha_ingles, 8, 2);

if ($mes=="01") $mes="Enero";
elseif ($mes=="02") $mes="Febrero";
elseif ($mes=="03") $mes="Marzo";
elseif ($mes=="04") $mes="Abril";
elseif ($mes=="05") $mes="Mayo";
elseif ($mes=="06") $mes="Junio";
elseif ($mes=="07") $mes="Julio";
elseif ($mes=="08") $mes="Agosto";
elseif ($mes=="09") $mes="Septiembre";
elseif ($mes=="10") $mes="Octubre";
elseif ($mes=="11") $mes="Noviembre";
elseif ($mes=="12") $mes="Diciembre";
else $mes="--";
$fecha_castellano = ($dia." de ".$mes." de ".$ano);
return $fecha_castellano;
}//fin convierte_fecha


function DondeComienzo()
    {
	if (isset($_GET['page'])) 
	{
	$paginaquevamos = $_GET['page']; 
    }else{
	$paginaquevamos = 1;	
	}
	$DondeComienzo = ($paginaquevamos*10)-10;
	return $DondeComienzo; 
	}

//NEWcode ORDENA POR FECHA
function ordenaPorFechas($mes, $anno, $kategoria, $quePais) // a este se le entra con el username
  {
include ('cajitaCurso.php'); //archivo donde esta la funcion que tira la cajita
//contador
$sqlContador = "SELECT count(*) FROM cursos LEFT JOIN  fechas ON fechas.idcurso = cursos.id where cursos.categoria LIKE '%$kategoria%'  AND MONTH(fechas.fechainicio) LIKE $mes AND YEAR(fechas.fechainicio) LIKE $anno AND cursos.pais LIKE '$quePais' ORDER BY fechas.fechainicio ";

// ESTE ES CUANDO ESTA DEMASIADO LLENO $sqlContador = "SELECT count(*) FROM cursos LEFT JOIN  fechas ON fechas.idcurso = cursos.id where cursos.categoria LIKE '%$kategoria%'  AND MONTH(fechas.fechainicio) LIKE $mes AND YEAR(fechas.fechainicio) LIKE $anno AND cursos.pais LIKE '$quePais' AND  fechas.fechainicio >= NOW() ORDER BY fechas.fechainicio ASC";



$count = mysql_fetch_row(mysql_query($sqlContador)) or die("Query failed : " . mysql_error() . mysql_errno());
global $contadorGeneral;
$contadorGeneral = $count[0];
//echo $contadorGeneral;

//contador	
	$sql = "SELECT * FROM cursos LEFT JOIN  fechas ON fechas.idcurso = cursos.id where cursos.categoria LIKE '%$kategoria%'  AND MONTH(fechas.fechainicio) LIKE $mes AND YEAR(fechas.fechainicio) LIKE $anno AND cursos.pais LIKE '$quePais' ORDER BY fechas.fechainicio DESC LIMIT ".DondeComienzo().", ".MAXCAJITAS."";

// ESTE ES CUANDO ESTA DEMASIADO LLENO $sql = "SELECT * FROM cursos LEFT JOIN  fechas ON fechas.idcurso = cursos.id where cursos.categoria LIKE '%$kategoria%'  AND MONTH(fechas.fechainicio) LIKE $mes AND YEAR(fechas.fechainicio) LIKE $anno AND cursos.pais LIKE '$quePais' AND fechas.fechainicio >= NOW() ORDER BY fechas.fechainicio ASC LIMIT ".DondeComienzo().", ".MAXCAJITAS."";


//echo $sql;
$result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno()); 
while ($row = mysql_fetch_array($result))
            {
			 CajitaCursoLlena($row['idcurso'], convierte_fecha($row['fechainicio']));	
			}
}



function yacasicomienzan() // a este se le entra con el username
  {
include ('Cajitayacasicomienzan.php'); //archivo donde esta la funcion que tira la cajita
//contador	
$sql = "SELECT * FROM cursos LEFT JOIN  fechas ON fechas.idcurso = cursos.id WHERE fechas.fechainicio >= NOW() ORDER BY fechas.fechainicio ASC LIMIT 0, ".MAXCAJITAS."";
//echo $sql; 
$result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno()); 
while ($row = mysql_fetch_array($result))
            {
			// CajitaYaCasiComeinzan($row['idcurso'], date('d/m/Y', strtotime($row['fechainicio'])) );	
			CajitaYaCasiComeinzan($row['idcurso'], date('d.m.Y', strtotime($row['fechainicio'])) );	
			}
}
	
function Buscador($palabra, $quePais) // a este se le entra con el username
  {
include ('cajitaCurso.php'); //archivo donde esta la funcion que tira la cajita
//contador
$sqlContador = "SELECT count(*) ,
MATCH (
	   cursos.nombreCurso, 
	   cursos.descripcion,
	   cursos.ubicacion,
	   cursos.objetivos,
	   cursos.contenido,
	   cursos.metodologia,
	   cursos.detalles	   
	   ) AGAINST ( '$palabra' )
AS Score FROM cursos LEFT JOIN  fechas ON fechas.idcurso = cursos.id
WHERE MATCH (
	   cursos.nombreCurso, 
	   cursos.descripcion,
	   cursos.ubicacion,
	   cursos.objetivos,
	   cursos.contenido,
	   cursos.metodologia,
	   cursos.detalles
			 ) AGAINST ( '$palabra' ) AND cursos.pais LIKE '$quePais' AND fechas.fechainicio <> 'NULL'";
$count = mysql_fetch_row(mysql_query($sqlContador)) or die("Query failed : " . mysql_error() . mysql_errno());
global $contadorGeneral;
$contadorGeneral = $count[0];
//echo $contadorGeneral;
//contador	

//ALTER TABLE cursos ADD FULLTEXT(nombreCurso, descripcion, ubicacion, objetivos, contenido, metodologia, detalles); 
$sql = "SELECT * ,
MATCH (
	   cursos.nombreCurso, 
	   cursos.descripcion,
	   cursos.ubicacion,
	   cursos.objetivos,
	   cursos.contenido,
	   cursos.metodologia,
	   cursos.detalles	   
	   ) AGAINST ( '$palabra' )
AS Score FROM cursos LEFT JOIN  fechas ON fechas.idcurso = cursos.id
WHERE MATCH (
	   cursos.nombreCurso, 
	   cursos.descripcion,
	   cursos.ubicacion,
	   cursos.objetivos,
	   cursos.contenido,
	   cursos.metodologia,
	   cursos.detalles
			 ) AGAINST ( '$palabra' ) AND cursos.pais LIKE '$quePais' AND fechas.fechainicio <> 'NULL'
ORDER BY fechas.fechainicio desc LIMIT ".DondeComienzo().", ".MAXCAJITAS."";
//echo $sql;
$result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno()); 
while ($row = mysql_fetch_array($result))
            {
			 CajitaCursoLlena($row['idcurso'], convierte_fecha($row['fechainicio']));	
			}
}



//TIRA LOS DE UNA INSTITUCION
function ordenaInstitucion($institucion) // a este se le entra con el username
  {
	  
include ('cajitaCurso.php'); //archivo donde esta la funcion que tira la cajita
//contador
$sqlContador = "SELECT count(*) FROM cursos LEFT JOIN  fechas ON fechas.idcurso = cursos.id where cursos.organizacion LIKE '$institucion' ORDER BY fechas.fechainicio";
$count = mysql_fetch_row(mysql_query($sqlContador)) or die("Query failed : " . mysql_error() . mysql_errno());
global $contadorGeneral;
$contadorGeneral = $count[0];
//contador	
$sql = "SELECT * FROM cursos LEFT JOIN  fechas ON fechas.idcurso = cursos.id where fechas.usuario LIKE '$institucion' ORDER BY fechas.fechainicio DESC LIMIT ".DondeComienzo().", ".MAXCAJITAS."";
//echo $sql;
$result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno()); 
while ($row = mysql_fetch_array($result))
            {
			 CajitaCursoLlena($row['idcurso'], convierte_fecha($row['fechainicio']));	
			}
}
	
	?>
	
    