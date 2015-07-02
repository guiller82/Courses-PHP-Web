<?php 

include ('funciones.php'); 
include ('banner.php'); 
    include ('constantes.php');
    include ('common.php'); 

//Validar que el articulo a ver existe en la base de datos...
//y si existe se le pone un hit!
if ( SaberExistenciadeID($_GET['id'], 'cursos') <> '0' ) 
{ 
UnoHitMas($_GET['id']); 
}
else
{ 
$msg = 5; 
echo "
<script>
window.location = '".MYURL."/?msg=$msg';
</script>";
}

?>


<table width="1060px" border="0" cellspacing="0" cellpadding="0" align="center" bgcolor="#FFFFFF"  style="padding-left:25px; padding-right:25px">
  <tr>
    <td valign="top" align="center" height="650px"><?php include ('selectors.php'); include ('insidecursosfix.php'); ?></td>
    <td valign="top" align="right" ><?php include ('buscador.php'); include ('spacer.php'); include ('tagHits.php');  include ('amigos.php');  ?></td>
  </tr>
</table>

<?php include ('pie.php'); ?>



