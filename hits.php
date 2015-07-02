<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Cursos Y Capacitaciones - Hits</title>
	<meta http-equiv="content-type" content="charset=utf-8"/>
	<meta http-equiv="content-language" content="en"/>


	<script type="text/javascript" src="sortable.js"></script>
    	<link rel="stylesheet" type="text/css" href="example.css"/>
         <link href="style.css" rel="stylesheet" type="text/css">
    
<style type="text/css">
<!--
.style1 {
	font-family: Arial;
	font-size: 20px;
}
.style2 {
	font-family: Arial;
	font-size: 20px;
	font-weight: bold;

}
-->
</style>
</head>
 

<?php 


function suma(){ 
    include ('constantes.php');
    include ('common.php');

$sql = "SELECT SUM(ROUND(counter-0.5)) from hits";
$result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
$resSuma=mysql_result($result,0,0);
$total = round($resSuma, 0);
echo $total; 
}


function SuperHitCounter(){ 
    include ('constantes.php');
    include ('common.php');

	
  //  include ('common.php');
$sql = "SELECT * FROM hits ORDER BY counter DESC";
$result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
$dbh = mysql_connect(SQLHOST, SQLUSERNAME, SQLPASSWORD);
mysql_select_db(SQLDATABASE);

                while ($info = mysql_fetch_array($result))
                {
///////////////////////////////////////////////////////////////
$sqlhits = "SELECT * FROM cursos WHERE id = ". $info['aidi'];
$resulthits = mysql_query($sqlhits) or die("Query failed : " . mysql_error() . mysql_errno());
$titulohits = mysql_fetch_array($resulthits);
//////////////////////////////////////////////////////////////				
    include ('tablasuperhits.php'); 
  }    
  
}

echo "
  <table width='100%'  align='center' border='0' cellspacing='0' cellpadding='0'>
  <tr>
    <td align='center' valign='middle'><p class='style2'>"; suma(); echo " Hits acumulados! </p></td>
  </tr>
</table>  ";  

echo "<table width='100%'  class='sortable' id='anyid' border='0' align='center' cellpadding='1' cellspacing='1'>
  <tr>
    <th width='8%' >Hits</th>
    <th width='77%'  >Titulo</th>
    <th width='15%' >Fecha</th>
  </tr>
";

SuperHitCounter();

echo "</table>";
?>