<link href="style.css" rel="stylesheet" type="text/css" />
<script type='text/javascript' src='calendar/utils/zapatec.js'></script>
<script type="text/javascript" src="calendar/src/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>
<link href="calendar/themes/aqua.css" rel="stylesheet" type="text/css">
<link href="../style.css" rel="stylesheet" type="text/css" />

<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">


<script type="text/javascript">
function validarDatos() {
	
  if (form.fechainicio.value.length==0) {
    alert('Favor Agregar la Fecha de Inicio');
	 return false;
  }
  }
</script>

 <?php	if ($_POST[samoyedo2] == 'si')  
	{
?>
<table width='1000px'  align='center' border='0' cellspacing='1' cellpadding='5' style='border:solid; border-color:#CCC; border-width:1px'><tr >
  <td width='83%' height='45' align='left' bgcolor='#FFFFFF' class='style14' style="padding-left:15px"  >Favor agregar la fecha de inicio del curso o capacitación en la sección de <strong>Agregar Fechas</strong>, si comete un error o desea eliminar la fecha antes agregada, busquela en la sección de <strong>Eliminar Fechas</strong> y da click en el botón de borrar. Al terminar de click en el botón de la derecha para volver al listado principal de cursos.</td>
  <td width='17%' align='center' valign='middle' bgcolor='#FFFFFF' style='padding-top:10px'   ><form action='administrator.php' method='post'>		 				  
<input type='image' name='submit' SRC='logos/navigate_48.png' BORDER='0' value='Listado' />  							
<input type='hidden' name='action' value='listado'>
<input type='hidden' name='samoyedo2' value='si' />
<input type='hidden' name='idcurso' value='".$row['id']."'>                              
</form></td></tr></table>





<form action='administrator.php' name="form" method='post' onSubmit="return submitForm();">
 
   
   
                <table width="1000px"  align="center" border="0" cellspacing="1" cellpadding="5">
                  <tr>
                    <td colspan="2" valign="top" bgcolor="#FFFFFF"  ><p class="style2">Agregar	 Fechas<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="11" bgcolor="#006699"></td>
                        </tr>
                      </table>         
                      
                      </td>
                  </tr>  
                  
                  
  </table>
                   



                   <table width="1000px"  align="center" border="0" cellspacing="1" cellpadding="5" style="border:solid; border-color:#CCC; border-width:1px">               
                  <tr>
                    <td width="13%" valign="top" bgcolor="#FFFFFF" ><span class="style14">Fecha de Inicio</span></td>
                    <td width="31%" valign="top" bgcolor="#FFFFFF" ><input type="text" name="fechainicio" id="fechainicio" size="30" >
        <input type="reset" value=" ... " id='button1' class="botoneta">
        <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({		
		inputField:"fechainicio",
	//	ifFormat:"%Y-%m-%d [%W] ",
		ifFormat:"%Y-%m-%d",
		button:"button1",
		showsTime:false
		});		
	</script>    <input name="fechafinal" type="hidden" id="fechafinal" value="2030-09-30" size="23" />
    <input name="action" type="hidden" id="action" value="agregarFecha" />
    <input name="idcurso" type="hidden" id="idcurso" value="<?php echo $_POST['idcurso'] ?>" size="30" /></td>
                    <td width="9%" rowspan="2" valign="top" bgcolor="#FFFFFF" class="style14" >Horario:                    </td>
                    <td width="47%" rowspan="2" valign="top" bgcolor="#FFFFFF" class="style14" ><textarea name="horario" class="Selectors" cols="45" rows="4" id="horario"></textarea></td>
                  </tr>
                  
                 
                 
                  <tr>
                    <td width="13%" valign="top" bgcolor="#FFFFFF" class="style14" >Detalles</td>
                    <td valign="top" bgcolor="#FFFFFF"  ><input name="duracion" class="Selectors" type="text" id="duracion" size="27" value="" /></td>
                    </tr>
                 
				  
				                   <tr bgcolor="#006699">
                    <td height="45" colspan="4" align="center" bgcolor="#FFFFFF" style="border-top:solid; border-top-color:#CCC; border-top-width:1px"  >
<input type='hidden' name='samoyedo2' value='si' />
               <input type='submit'  class="selectors" value='Agregar Fecha' onClick="return validarDatos()"></td>
                  </tr>				  
</table> 
           </form>
           
           <?php include ('fechasListado.php');?>
           
              

  <?php 	} 
			  
			  	else
	
	{ 
	require_once('error.html'); 
	}
			  ?> 
              
              
         
              
              