<link href="style.css" rel="stylesheet" type="text/css"> 
  
  <?php 
  
  $empresa=$_GET['empresa'];
  
  
echo "
  
  
<table width='640px' align='left' border='0' style='text-align:justify'>
  <tr>
    <td colspan='2' align='left' valign='top'>  
	
    <span class='TtuloCursoInside'> <img src='images/flags/".$info['pais'].".png' width='20' height='13' style='border-bottom:2px'></img>&nbsp;".$info['tipo'].": ".$info['nombreCurso']."</span>
	
	
	<div class='cajitaLocatorTexto'><a class='cajitaLocatorTexto' href='matcher.php?type=cursos&institucion=".$info['usuario']."&submit=Institucion&p=".$info['pais']."'> ".$info['organizacion']."</a></div>";
	
	
	
echo "<div class='cajitaInside'>";
if ($info['pais'] == '') { } else { echo "     
<span class='letrasubtitulo'><br>Pa&iacute;s:</span><span class='azulito'>".desabreviarPais($_GET['p'])."</span><br>"; }

if ($info['duracion'] == '') { } else { echo "     
<span class='letrasubtitulo'><br>Duraci&oacute;n:</span><span class='azulito'>".($info['duracion'])."</span><br>"; }

if ($info['modalidad'] == '') { } else { echo "     
<span class='letrasubtitulo'><br>Modalidad:</span><span class='azulito'>".($info['modalidad'])."</span><br>"; }

if ($info['ubicacion'] == '') { } else { echo "   
<span class='letrasubtitulo'><br>Ubicaci&oacute;n: </span><span class='azulito'>".($info['ubicacion'])."</span><br />"; }


if ($info['incluye'] == '') { } else { echo "     
<span class='letrasubtitulo'><br>Incluye:</span><span class='azulito'>".($info['incluye'])."</span><br>"; }

 if ($info['requisitos'] == '') { } else { echo "   	
<br><span class='letrasubtitulo'>Requisitos:</span> <span class='azulito'>".($info['requisitos'])."</span><br />"; }

if ($info['mayorinformacion'] == '') { } else { echo "   
<span class='letrasubtitulo'><br>Contacto: </span><span class='azulito'>".($info['mayorinformacion'])."</span><br />"; }



echo"<br /><span class='letrasubtitulo'>C&oacute;digo: </span><span class='azulito'>".($info['id'])."</span><br>";

echo "</div>";	








if ($info['descripcion'] == '') { } else { echo "      
<span class='letrasubtitulo'><br>Descripci&oacute;n:</span><span class='azulito'>".($info['descripcion'])."</span><br />"; }

 if ($info['objetivos'] == '') { } else { echo "<br /><span class='letrasubtitulo'><br>
Objetivos:</span><span class='azulito'>".($info['objetivos'])."</span><br />"; }

  
if ($info['audiencia'] == '') { } else { echo "         
<span class='letrasubtitulo'><br>Audiencia:</span><span class='azulito'>".($info['audiencia'])."</span><br> "; }


    
 

   
   
   if ($info['metodologia'] == '') { } else { echo "  <br />     
<span class='letrasubtitulo'>Metodolog&iacute;a:</span><span class='azulito'> ".($info['metodologia'])."</span><br />"; }

 if ($info['detalles'] == '') { } else { echo "   
<span class='letrasubtitulo'><br>Notas:</span><span class='azulito'>".($info['detalles'])."</span><br />"; }


if ($info['impartidopor'] == '') { } else { echo "  
<span class='letrasubtitulo'><br>Impartido por:</span><span class='azulito'>".($info['impartidopor'])."</span><br>"; }



 if ($info['formasdepago'] == '') { } else { echo "   
    <span class='letrasubtitulo'><br>Formas de pago:</span> <span class='azulito'>".($info['formasdepago'])."</span><br />"; }
    
	
	
	 if ($info['linkconfirmacion'] == '') { } else { echo "   
    <span class='letrasubtitulo'><br>Para Confirmar: </span><span class='azulito'>".($info['linkconfirmacion'])."</span><br />"; }	   
	
	 if ($info['contenido'] == '') { } else { echo "   <br />
<span class='letrasubtitulo'>Contenido:</span> <span class='azulito'>".($info['contenido'])."</span><br />
"; }
   
    	
 echo "
 <span class='letrasubtitulo'><br>Fechas y Horario:</span><br />
<span class='azulito'>";tirafechas($info['id']); echo "</span>
<br />";
 

// AQUI SALE INVERSION DEL CURSO
//if ($info['inversion'] == '') { } else { echo "   
//<span class='letrasubtitulo'><br>Inversi&oacute;n:</span><span class='letracontenido'>".($info['inversion'])."</span>"; }



echo "

  <tr>
    <td colspan='2' align='left' valign='top' >";
	
	include ('mailattachCursos.php') ; 
	
    echo "</td>
  </tr>
</table>
";


 ?>
