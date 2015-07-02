<link href="../style.css" rel="stylesheet" type="text/css" />
 
<table width="1000px"  align="center" border="0" cellspacing="1" cellpadding="0">
     <tr>
     <td colspan="2" valign="top" bgcolor="#FFFFFF"  ><p class="style2">Eliminar Fechas</p><table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="11" bgcolor="#006699"></td>
                        </tr>
                      </table> 
                      





<?php

$myid = $_POST['idcurso'];
//echo $myid;
//en este archiovo se listan las fechas... para el administrador
$sql = "SELECT * FROM fechas WHERE idcurso = '$myid' ORDER BY idFecha DESC"; // echo $sql;
$result = mysql_query($sql) or die("Query failed : SQL" . $sql ." ERROR: ". mysql_error() . mysql_errno());
while ($info = mysql_fetch_array($result))
{
//$idfechi = $info['idfecha']; 
echo "
<form action='administrator.php' method='post'>
<input name='numeroaborrar' type='hidden' id='numeroaborrar' value='".$info['idfecha']."' /> 
<input type='hidden' name='samoyedo2' value='si' />
<input name='idcurso' type='hidden' id='idcurso' value='".$_POST['idcurso']."' />
<table width='1000px' border='0	' align='center' style='border-bottom:solid; border-bottom-color:#CCC; border-bottom-width:1px' >
  <tr>
    <td width='146' class='azulito'>".$info['fechainicio']."</td>
    <td width='205' class='azulito'>".$info['duracion']."</td>
    <td width='519' class='azulito'>".$info['horario']."</td>
    <td width='112' align='right'>	<input name='action' type='hidden' value='borrarFecha' />  
	<input type='submit' value='Borrar' class='selectors' id='botonborrar' name='botonborrar' onCLick=\"return confirm('Desea Borrar el fecha?')\"/> </td>
	
	 
	 
  </tr>
</table>

</form>";
  }

?>