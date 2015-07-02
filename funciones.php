<?php


function desabreviarPais($abrev)
  {
switch($abrev)
{
 case 'ARG': $paises='Argentina'; break;
 case 'BRA': $paises='Brasil'; break;
 case 'CHI': $paises='Chile'; break;
 case 'COL': $paises='Colombia'; break;
 case 'CRC': $paises='Costa Rica'; break;
 case 'CUB': $paises='Cuba'; break;
 case 'DOM': $paises='Republica Dominicana'; break;
 case 'ECU': $paises='Ecuador'; break;
 case 'ESA': $paises='El Salvador'; break;
 case 'GUA': $paises='Guatemala'; break;
 case 'HON': $paises='Honduras'; break;
 case 'MEX': $paises='México'; break;
 case 'NIC': $paises='Nicaragua'; break;
 case 'PAN': $paises='Panamá'; break;
 case 'PAR': $paises='Paraguay'; break;
 case 'PER': $paises='Perú'; break;
 case 'URU': $paises='Uruguay'; break;
 case 'VEN': $paises='Venezuela'; break;
 case 'ESP': $paises='España'; break;
  case 'BOL': $paises='Bolivia'; break;
 case '%': $paises='Pais'; break;
}
$desabreviarPais = htmlentities($paises);
return $desabreviarPais;
}

function UnoHitMas($idINSIDE){ 
    include ('constantes.php');
    include ('common.php');  
	
$sqlhitUHM = " SELECT * FROM hits WHERE aidi LIKE $idINSIDE";
$resulthitUHM = mysql_query($sqlhitUHM) or die("Query failed : " . mysql_error() . mysql_errno());
$rowhitUHM = mysql_fetch_array($resulthitUHM);


if (  $rowhitUHM['aidi'] == $idINSIDE ) 
{

$sqlhitUHM = "UPDATE hits SET counter = (counter +(1/3)) where aidi = $idINSIDE"; 
mysql_query($sqlhitUHM) or die("Query failed : " . mysql_error() . mysql_errno());	
} 
else
{
$sqlhitUHM = "INSERT INTO hits (aidi, counter)
VALUES ($idINSIDE, 1)";
mysql_query($sqlhitUHM) or die("Query failed : " . mysql_error() . mysql_errno());			  
  }
}// aqui se cierra funcion


//////////////////////////////////////////////////////////////////

function ExistenciaCursosEnPais ($pais, $nomnredelatabla){
 //   include ('constantes.php');
   // include ('common.php');  

$consulta="select * from ".$nomnredelatabla." where pais='".$pais."'"; 
//echo $consulta;
$resultado=mysql_query($consulta) or die (mysql_error()); 
	if (mysql_num_rows($resultado) == 0) 
	{ 
	return '0'; 
	}
}


function SaberExistenciadeID ($idINSIDE, $nomnredelatabla){

$consulta="select * from ".$nomnredelatabla." where id=".$idINSIDE; 
$resultado=mysql_query($consulta) or die (mysql_error()); 
	if (mysql_num_rows($resultado) == 0) 
	{ 
	return '0'; 
	}
}

function SaberExistenciadeEmail ($emailINSIDE, $nomnredelatabla){

$consulta="select * from ".$nomnredelatabla." where email=".$emailINSIDE; 
$resultado=mysql_query($consulta) or die (mysql_error()); 
	if (mysql_num_rows($resultado) == 0) 
	{ 
	return '0'; 
	}
}



// FUNCION QUE CUENTA EL GENERAL DE LOS HITS DE LOS ULTIMOS 30 DIAS
//tagHits.php
function HitCounter30(){ 
    include ('constantes.php');
	
$sql = "SELECT * FROM hits WHERE fecha BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY) AND CURRENT_DATE() ORDER BY counter DESC LIMIT 10";
//echo $sql;
$result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
$numeral = 1;
$dbh = mysql_connect(SQLHOST, SQLUSERNAME, SQLPASSWORD);
mysql_select_db(SQLDATABASE);

                while ($info = mysql_fetch_array($result))
                {
				$sqlhits = "SELECT * FROM cursos WHERE id = ". $info['aidi'];
				$resulthits = mysql_query($sqlhits) or die("Query failed : " . mysql_error() . mysql_errno());
				$titulohits = mysql_fetch_array($resulthits);
 echo "<table width='95%' border='0' align='center' style='border-bottom:solid #ccc 1px;'>
  <tr>
    <td align='left'><span class='Letratituloazul'>".$numeral." - </span> <span class='azulito'><a class='azulito' href='insidecursos.php?type=cursos&id=".$info['aidi']."&p=".$titulohits['pais']."'>".$titulohits['tipo'].": ".$titulohits['nombreCurso']."</a></span></td>
  </tr>
</table>";

$numeral ++;
  }    
}



// FUNCION QUE CUENTA EL GENERAL DE LOS HITS
//tagHits.php
function HitCounter(){ 
    include ('constantes.php');
 //   include ('common.php'); 
	
$sql = "SELECT * FROM hits ORDER BY counter DESC LIMIT 10";
$result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
$numeral = 1;
$dbh = mysql_connect(SQLHOST, SQLUSERNAME, SQLPASSWORD);
mysql_select_db(SQLDATABASE);

                while ($info = mysql_fetch_array($result))
                {
				$sqlhits = "SELECT * FROM cursos WHERE id = ". $info['aidi'];
				$resulthits = mysql_query($sqlhits) or die("Query failed : " . mysql_error() . mysql_errno());
				$titulohits = mysql_fetch_array($resulthits);
				
				echo "<table width='95%' border='0' align='center' style='border-bottom:solid #ccc 1px;'>
  <tr>
    <td align='left'><span class='Letratituloazul'>".$numeral." - </span> <span class='azulito'><a class='azulito' href='insidecursos.php?type=cursos&id=".$info['aidi']."&p=".$titulohits['pais']."'>".$titulohits['tipo'].": ".$titulohits['nombreCurso']."</a></span></td>
  </tr>
</table>";
				
				$numeral ++;
				
  }    
}

?>