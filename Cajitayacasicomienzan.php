<style type="text/css">
<!--
@import url("style.css");
-->
</style>
 
<?php
function CajitaYaCasiComeinzan($id, $fechaInicio) // a este se le entra con el username
  {
$sql = "SELECT * FROM cursos WHERE id = $id";
$result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno()); echo "";
while ($row = mysql_fetch_array($result))
            { 
			 echo "
<table width='95%' border='0' style='border-bottom:solid #ccc 1px;'>
  <tr>
    <td align='left'><span class='menuArriba'>".$fechaInicio."</span> - <span class='azulito'><a class='azulito' href='insidecursos.php?type=cursos&id=".$id."&p=".$row['pais']."'>".$row['tipo'].": ".$row['nombreCurso']."</a></span></td>
  </tr>
</table> 
 "; 
  }
}
?>