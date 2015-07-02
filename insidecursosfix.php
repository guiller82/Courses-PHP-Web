  <link href="style.css" rel="stylesheet" type="text/css">
<?php
include ('tiracurso.php');

////////////////////////////////////////////////////////////
function tirafechas($aidi) // a este se le entra con el username
  {
  $sql = "SELECT * FROM fechas WHERE idcurso = '$aidi'";
	$result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
	while ($row = mysql_fetch_array($result))
	      {
		echo "<strong>".convierte_fecha($row['fechainicio'])."</strong> - ".$row['horario']."";
		echo "<br />";
           } 
}
//////////////////////////////////////////////////////////

include ('constantes.php');

$dbh = mysql_connect(SQLHOST, SQLUSERNAME, SQLPASSWORD);
mysql_select_db(SQLDATABASE);

$id=$_GET['id'];
$categoria=$_GET['categoria'];

        $sql = "SELECT * FROM cursos WHERE id = ".$id;

        $result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());

        $info = mysql_fetch_array($result);


  //esta tabla es la de adiational details
//hitcounter
 global $titulo;
$titulo = $info['titulo'];


include ('tablacursosinside.php');

 

?>


<?php // include ('mailattach.php') ?>




