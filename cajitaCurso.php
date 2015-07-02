<style type="text/css">
<!--
@import url("style.css");
-->
</style>
<?php

function CajitaCursoLlena($id, $fechaInicio) // a este se le entra con el username
  {
$sql = "SELECT * FROM cursos WHERE id = $id";
$result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno()); 
while ($row = mysql_fetch_array($result))
            { 
///////////////////////////////////////////////////////////////
//este lo que hace es averiguar el id en la tabla de users
$sql2 = "SELECT id FROM `users` WHERE username = '".$row['usuario']."'";
$result2 = mysql_query($sql2) or die("Query failed : " . mysql_error() . mysql_errno());
$IdDeUser = mysql_fetch_array($result2);

$sql = "SELECT * FROM listing_pics WHERE listing_id = ".$IdDeUser['id']."";
$photo_result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
$pics = mysql_fetch_array($photo_result);
$photo = ($pics['pic_location'] != '') ? $pics['pic_location'] : 'no_pic.jpg';

if ($photo == 'no_pic.jpg')
            { 
$thumb = "";
}
else
        { 
$thumb = "<div class='thumby'>  <a href='matcher.php?type=cursos&institucion=".$row['usuario']."&submit=Institucion&p=".$row['pais']."'>   <img src='photos/thumbs/".$photo."' width='70' height='70' border='0'></a></div> ";
}
///////////////////////////////////////////////////////////////
			 echo "
<div class='cajitacurso'>

<div class='cajitacursoTitulo'> <img src='images/flags/".$row['pais'].".png' width='20' height='13' style='border-bottom:2px'></img> <a class='cajitacursoTitulo' href='insidecursos.php?type=cursos&id=".$id."&p=".$row['pais']."'> ".$row['tipo'].": ".$row['nombreCurso']." </a>

<div class='cajitaLocatorTexto'><a class='cajitaLocatorTexto' href='matcher.php?type=cursos&institucion=".$row['usuario']."&submit=Institucion&p=".$row['pais']."'> ".$row['organizacion']."</a></div> 


</div>




".$thumb."

<div class='cajitaFecha'><strong>Fecha de inicio:</strong> ".$fechaInicio." </div>

<span class='azulito'>".TruncateMetaTag($row['descripcion'])." </span>

</div>"; 
			}
}

?>