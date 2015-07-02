<?php 
include ('funciones.php'); 
include ('constantes.php'); 
include ('banner.php'); 


//	include ('constantes.php'); 
    mysql_connect (SQLHOST, SQLUSERNAME, SQLPASSWORD);
    mysql_select_db(SQLDATABASE) or die('Cannot select database');
	@mysql_query("SET NAMES 'utf8'");

 ?>
 
 
<table width="1060px" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF" style="padding-left:25px; padding-right:25px">
  <tr>
    <td valign="top" width="650px" align="left" > <?php include ('selectors.php'); include ('listadoMatcher.php'); ?></td>
    <td valign="top" width="350px" align="right"  ><?php  include ('buscador.php'); include ('spacer.php'); include ('tagHits.php');
	include ('amigos.php');  ?></td>

  </tr>
</table>

<?php include ('pie.php'); ?>



