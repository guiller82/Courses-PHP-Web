<?php
            $sql = "SELECT count(*) FROM cursos WHERE usuario = '$namexxx'";
            $count = mysql_fetch_row(mysql_query($sql)) or die("Query failed : " . mysql_error() . mysql_errno());
			global $contador;
			$contador = $count[0];


function DondeComienzo()
    {
	if (isset($_GET['page'])) 
	{
	$paginaquevamos = $_GET['page']; 
    }else{
	$paginaquevamos = 1;	
	}	
	$DondeComienzo = ($paginaquevamos*10)-10;
	return $DondeComienzo; 
	}
?>
            
            <?php include('buscabusca.php'); ?>
             
<table cellspacing='1px' cellpadding='0' width="1000px" align="center"  class="light_white">

<tr>
<td width="44"  align="center"  class="docer"><font class='style20' >Id</font></td>
<td width="44"  align="center" class="docer"><font class='style20' >Editar</font></td>
<td width="44"  align="center" class="docer"><font class='style20' >Horario</font></td> 
<td width="44"  align="center" class="docer"><font class='style20' >Eliminar</font></td>
<td width="45"  align="center" class="docer"><font class='style20' >Nombre</A></font></td>                
<td width="772" align="center" class="docer"><font class='style20' >Descripcion</font></td>
<td width="32"  align="center" class="docer"><font class='style20'>Categoria</font></td>
<td width="32"  align="center" class="docer"><font class='style20' >Email</font></td>
</tr>


                <?php
		//		    session_start();
				
				$query = " ORDER BY id";
                 
					
					
              $_GET['order_by'] == 'nombre'     and $query = " ORDER BY nombreCurso";
              $_GET['order_by'] == 'descripcionDelPuesto' and $query = " ORDER BY descripcionDelPuesto";
              $_GET['order_by'] == 'objetivos'   and $query = " ORDER BY objetivos";
              $_GET['order_by'] == 'duracion'    and $query = " ORDER BY duracion";
              $_GET['order_by'] == 'inversion'  and $query = " ORDER BY inversion";
              $_GET['order_by'] == 'fecha'  and $query = " ORDER BY fecha";
					

//palabra del buscador
$xkeyword=$_POST['buscartext']; 
$comillas="'";
$porcentaje=''; 
$keyporcentaje=$comillas.$porcentaje.$xkeyword.$porcentaje.$comillas; 


 if ($_GET['sort'] == 'DESC' && $_GET['order_by'] != '')
            {
                $asc_des = 'ASC';
		        $sort = 'ASC';
            }
            else
            {
                $asc_des = 'DESC';
             $sort = 'DESC';
       }
//	   echo DondeComienzo();
//si le doy click desde los libritos
if ($_POST['buscartext'] == '') {
	$sql = "SELECT * FROM cursos ".$usuarius." ".$query ." ". $asc_des. " LIMIT ".DondeComienzo().", 10";
	}	
else 
{
	$sql = "SELECT * FROM cursos WHERE id = $keyporcentaje ".$usuarius2." ".$query ." ". $asc_des. " LIMIT ".DondeComienzo().", 10";
	}  
//patch RADARTI FINAL


// echo $sql;
 // echo $action;
 //echo $_SESSION['s_username'];	
$result = mysql_query($sql) or die("Query failed : SQL" . $sql ." ERROR: ". mysql_error() . mysql_errno());

	  while ($info = mysql_fetch_array($result))
        {
         echo "<tr>\n";
         echo "<td>\n";
         echo "<tr valign='top'>
         <td nowrap class='light_back' ><font class='font_normal'>".$info['id']."</font></td>
         <form action='administrator.php' method='post'>
		 <input type='hidden' name='samoyedo2' value='si' />
         <td nowrap align='middle' valign='middle' bgcolor='#FFFFFF'> ";


echo "							  
<input type='image' name='submit' SRC='editar.jpg' BORDER='0' value='Editar Evento' />  							
<input type='hidden' name='action' value='edit_Evento'>
<input type='hidden' name='password' value='".$_REQUEST['password']."'>
<input type='hidden' name='id' value='".$info['id']."'> ";

		                       
 echo " </td>
 </form>



<form action='administrator.php' method='post'>			
 <td nowrap align='middle' valign='middle' bgcolor='#FFFFFF'>					  
<input type='image' name='submit' SRC='horario.jpg' BORDER='0' value='Editar Fechas' />  							
<input type='hidden' name='action' value='edit_fechas'>
<input type='hidden' name='samoyedo2' value='si' />
<input type='hidden' name='idcurso' value='".$info['id']."'>                              
</form>




	
                              <form action='administrator.php' method='post'>
							  <input type='hidden' name='samoyedo2' value='si' />				  
                              <td nowrap align='middle' valign='middle' bgcolor='#FFFFFF'>
";
  

		 echo "<input TYPE='image' name='submit' SRC='borrar.jpg' BORDER='0' value='Eliminar Artículo' onCLick=\"return confirm('Desea Borrar el curso?')\"/> 
          <input type='hidden' name='action' value='delete_listing'> 
		  <input type='hidden' name='password' value='".$_REQUEST['password']."'>
          <input type='hidden' name='id' value='".$info['id']."'>                              
          </td></form>";

				 
          echo "<td class='light_back'><font class='font_contenido'>".$info['nombreCurso']."</font></td>
          <td class='light_back'><font class='font_contenido'>".$info['descripcion']."</font></td>
          <td nowrap class='light_back'><font class='font_contenido'>".$info['categoria']."</font></td>
		            <td nowrap class='light_back'><font class='font_contenido'>".$info['contacto']."</font></td>
					
					
					



					
          </tr>";
          }
         echo "</table>";
            
//parte siguiente anterior inicio...
/*echo "<table width='1000px' border='0' cellspacing='0' cellpadding='0' align='center'>
  <tr>
    <td width='50%'  class='docer'>";
	
			  
   if ($count[0] > $limit_results && $start >= $limit_results)
            {
                $prev_start = $_REQUEST['start'] - $limit_results;

                echo "<a class='style20' href='administrator.php?actionGet=listadoSupremo&order_by=".$_GET['order_by']."&sort=".$_GET['sort']."&mimi=".'ix'."&start=".$prev_start."'>";
                echo "&lt;&lt; Anterior";
                echo "</a>";
            }
			
			echo "</td><td width='50%' align='right'  class='docer' class='style20'>";
			
            if ($count[0] > $limit_results && $end <= $count[0])
            {
                $next_start = $_REQUEST['start'] + $limit_results;

                echo "<font class='style20'><a href='administrator.php?actionGet=listadolistadoSupremo&order_by=".$_GET['order_by']."&sort=".$_GET['sort']."&mimi=".'ix'."&start=".$next_start."'>";
                echo "Siguiente &gt;&gt;";
                echo "</a>";
            }
      
   echo "</td>
  </tr>
</table>"; */
  //parte siguiente anterior final... 
  include ('paginator.php');
  /*
echo "<table width='1000px'  border='0'  align='center' cellspacing='0' cellpadding='0' > <tr> <td height='20'><div align='center' class='docer'>Cursos y Capacitaciones</div></td>  </tr></table>";  */

   ?>