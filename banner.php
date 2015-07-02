<?php
/*
10/5/2010
rss.pphp
rssID.pphp
banner.php
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"> 
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<script type="text/javascript">
   var infolink_pid = 80058;
   var infolink_wsid = 1;
</script>
<script type="text/javascript" src="http://resources.infolinks.com/js/infolinks_main.js"></script>



<?php
 //se manejan las variables globales para marcar en el pais en que estamos
	global $quePais;	
    if (isset($_GET['p'])) 
	{
	$quePais = $_GET['p']; 
    }else{
	$quePais = '%';	
	}
	//echo $quePais;
?>


<?php 

     function TruncateMetaTag($string, $max = 1000, $rep = '...')
{
    if (strlen($string) <= ($max + strlen($rep)))
    {
        return $string;
    }
    $leave = $max - strlen ($rep);
    return substr_replace($string, $rep, $leave);
} 

include ('mensajitos.php');  

include ('constantes.php'); 
$dbh = mysql_connect(SQLHOST, SQLUSERNAME, SQLPASSWORD);
mysql_select_db(SQLDATABASE);

$id = '0';
$id=$_GET['id'];
$type=$_GET['type'];

//este swith es el que maneja los titulares del banner de jobs y el normal

switch($type)
{
case '': 
if ($id == NULL) {echo "<title>Cursos y Capacitaciones</title> 
<meta name='description' content='Portal especializado en la promoción de cursos y capacitaciones para Latinoamerica. Publique GRATIS los cursos libres, conferencias, talleres, seminarios y otro tipo de capacitaciones de su empresa.' />";}

break;


case 'cursos':

$dbh_Cursos = mysql_connect(SQLHOST,SQLUSERNAME,SQLPASSWORD);
mysql_select_db(SQLDATABASE);
@mysql_query("SET NAMES 'utf8'");
if ($id == NULL) {echo "<title>Cursos y Capacitaciones</title> 
<meta name='description' content='Portal especializado en la promoción de cursos y capacitaciones para Latinoamerica. Publique GRATIS los cursos libres, conferencias, talleres, seminarios y otro tipo de capacitaciones de su empresa.' />";}
elseif ($id || NULL && $type=='cursos') { 
   $sql = "SELECT * FROM cursos WHERE id = ".$id;        
   $result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());        
    $info = mysql_fetch_array($result);
echo "<title>Cursos y Capacitaciones - ".($info['nombreCurso'])." - ".strtoupper($info['organizacion'])."</title> 
<meta name='description' content='".TruncateMetaTag($info['descripcion'])."' />";}
mysql_close($dbh_Cursos);

break;

}

?>


<meta name="keywords" content="cursos, capacitaciones, ulatina, tecnologia, costa rica, cocina, php, academico, universidades, estudios, entrenamiento, cisco, incae" />
<meta name="robots" content="all" />
<meta name="revisit-after" content="1 days" />
<meta name="Expires" content="Never" />
<meta name="author" content="_GBarrantes_ / Original design: pixelcostudio.com /">
 <!-- Mimic Internet Explorer 7 -->
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link rel="SHORTCUT ICON" href="images/ico.ico" />
<meta name="google-site-verification" content="kv-9ix34Z0wb6nC-OBTv-_WYpdbufO6dgaapG-aPdeo" />
<META name="y_key" content="a8ce940f0ce40344">

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-11088607-1");
pageTracker._trackPageview();
} catch(err) {}</script>

<!-- Start Peeler tag End Peeler tag  
<script src="AC_OETags.js" language="javascript"></script>    
<script src="pageear.js" type="text/javascript"></script> -->


<link href="diggstyle_css.css" rel="stylesheet" type="text/css">
<link href="style.css" rel="stylesheet" type="text/css">
<link href="diggstyle_css.css" rel="stylesheet" type="text/css" />
</head>
 <body>

<!--
<script type="text/javascript">    
writeObjects(); //peeler
</script> -->

<?php include ('supraBanner.php');?>

<table class="tablabanner1" width="100%" border="0"  height="140px"  cellspacing="0" cellpadding="0">
  <tr>
    <td align="right" bgcolor="#006699">
<?php include ('bannerinside.php');?>
        </td>
          </tr>
</table>

<table width="1060px" border="0" cellspacing="0" bgcolor="#FFFFFF" cellpadding="0"  align="center" height="10px">
  <tr>
    <th scope="row"></th>
  </tr>
</table>
<?php //include ('menu.php') ?>
