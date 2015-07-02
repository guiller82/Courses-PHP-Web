<link href="../style.css" rel="stylesheet" type="text/css" />

  <?php	if ($_POST[samoyedo2] == 'si')  
	{
?>


<table width='1000px'  align='center' border='0' cellspacing='1' cellpadding='5' style='border:solid; border-color:#CCC; border-width:1px'><tr >
  <td width='83%' height='45' align='left' bgcolor='#FFFFFF' class='style14' style="padding-left:15px"  >Si lo que desea es editar el horario de este curso o capacitaci&oacute;n, haga click en el bot&oacute;n de la derecha para ir al administrador de fechas.</td>
  <td width='17%' align='center' valign='middle' bgcolor='#FFFFFF' style='padding-top:10px'   >
  
  <form action='administrator.php' method='post'>		 				  
<input type='image' name='submit' SRC='horario.jpg' BORDER='0' value='Editar Fechas' />  							
<input type='hidden' name='action' value='edit_fechas'>
<input type='hidden' name='samoyedo2' value='si' />
<input type='hidden' name='idcurso' value=' <?php echo $row['id'] ?>'>                              
</form>
  
  </td></tr></table>


<form action='administrator.php' name="form" method='post' onSubmit="return submitForm();">
  <input type='hidden' name='id' value="<?php echo $_POST['id']?>">
   <input type='hidden' name='action' value='save_Evento'>
                <table width="1000px"  align="center" border="0" cellspacing="1" cellpadding="5">
                  <tr>
                    <td colspan="3" valign="top" bgcolor="#FFFFFF"  ><p class="style2">Editar Curso<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="11" bgcolor="#006699"></td>
                        </tr>
                      </table>                     </td>
                  </tr>                  
                  <tr>
                    <td width="24%" valign="top" bgcolor="#FFFFFF" ><span class="style14">Nombre del Curso  <strong><span class="style3">*</span></strong></span></td>
                    <td width="40%" valign="top" bgcolor="#FFFFFF" ><input name="nombreCurso" type="text"  class="Selectors" id="nombreCurso" size="40" value="<?php echo trim($row['nombreCurso']) ?>" />
                    <input name="organizacion" id="organizacion" type="hidden" size="40" value="<?php echo trim($row['organizacion']) ?>" /></td>
                    <td width="36%" valign="top" bgcolor="#FFFFFF" class="letraQuees" >Favor no escribir la palabra curso. Ej. Especializaci&oacute;n en programaci&oacute;n php </td>
                  </tr>
                  
                 
                 
                  <tr>
                    <td width="24%" valign="top" bgcolor="#FFFFFF" class="style14" >Tipo  <strong><span class="style3">*</span></strong></td>
                    <td valign="top" bgcolor="#FFFFFF"  ><select name='tipo' id='tipo' enabled='true' class="Selectors" >
                     <option value="<?php echo trim($row['tipo'])?>"><?php echo trim($row['tipo'])?></option>
                      <option value="0">Tipo</option>
                      <option value="Curso">Curso</option>
                      <option value="Charla">Charla</option>
                      <option value="Conferencia">Conferencia</option>
                      <option value="Taller">Taller</option>
                      <option value="Seminario">Seminario</option>
                                        </select>
</td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees"  >Escoja el tipo de capacitaci&oacute;n. Ej. Conferencia</td>
                  </tr>
                     <tr>
                    <td width="24%" valign="top" bgcolor="#FFFFFF" class="style14" >Modalidad  <strong><span class="style3">*</span></strong></td>
                    <td valign="top" bgcolor="#FFFFFF"  ><select name='modalidad' id='modalidad' enabled='true' class="Selectors" >
                    <option value="<?php echo trim($row['modalidad'])?>"><?php echo trim($row['modalidad'])?></option>
                      <option value="0">Modalidad</option>
                      <option value="Presencial">Presencial</option>
                      <option value="Virtual">Virtual</option>
                      <option value="Presencial - Virtual">Presencial - Virtual</option>
                                        </select></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees"  >Escoja la modalidad de la capacitaci&oacute;n. Ej. Presencial</td>
                     </tr>  
                  
                   <tr>
                    <td width="24%" valign="top" bgcolor="#FFFFFF" ><span class="style14">Categor&iacute;a  <strong><span class="style3">*</span></strong></span></td>
                    <td valign="top" bgcolor="#FFFFFF" ><textarea name="categoria" cols="55" class="Selectors" rows="3" id="categoria"><?php echo trim($row['categoria'])?></textarea>
                    
                    </td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Escriba las diferentes categorias separadas por una coma. Ej. php, programaci&oacute;n, computaci&oacute;n, mysql</td>
                  </tr>
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Ubicaci&oacute;n</span></td>
                    <td valign="top" bgcolor="#FFFFFF" ><textarea name="ubicacion" cols="55" class="Selectors" rows="3" id="ubicacion"><?php echo trim($row['ubicacion'])?></textarea></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Escriba la direcci&oacute;n fisica donde se va a impartir la capacitaci&oacute;n. Ej. Instalaci&oacute;nes instituto ACME, detras del hospital.</td>
                  </tr>
                
                  
                  
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Descripci&oacute;n</span>  <strong><span class="style3">*</span></strong></td>
                    <td valign="top" bgcolor="#FFFFFF" ><textarea name="descripcion" class="Selectors" cols="55" rows="6" id="descripcion"><?php echo trim($row['descripcion']) ?></textarea></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Escriba una descripci&oacute;n corta sobre la capacitaci&oacute;n que se pretende impartir. Esto va a ser lo primero que el cliente va a leer en el listado.</td>
                  </tr>                  
                  
                  
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Objetivos</span></td>
                    <td valign="top" bgcolor="#FFFFFF" ><textarea name="objetivos" class="Selectors" cols="55" rows="6" id="objetivos"><?php echo trim($row['objetivos']) ?></textarea></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Escriba los diferentes objetivos que va a cumplir la capacitaci&oacute;n, debe de ser claros y consisos.</td>
                  </tr>
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Contenido</span></td>
                    <td valign="top" bgcolor="#FFFFFF" ><textarea name="contenido" cols="55" rows="6" class="Selectors" id="contenido"><?php echo trim($row['contenido']) ?></textarea></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Escriba el contenido de los diferentes objetivos del curso, taller o capacitaci&oacute;n</td>
                  </tr>
                      <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Materiales que incluye</span></td>
                    <td valign="top" bgcolor="#FFFFFF" >
       <textarea name="incluye" cols="55" rows="6" class="Selectors" id="incluye"><?php echo trim($row['incluye']) ?></textarea>
       </td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Muchas capacitaciones ofrecen diferente tipo de materiales para llevar a cabo como un plus hacia el cliente. Ej. Cada persona va a contar con un computador personal.</td>
                  </tr>
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" class="style14" >Metodolog&iacute;a</td>
                    <td valign="top" bgcolor="#FFFFFF" ><textarea name="metodologia" cols="55" rows="6" class="Selectors" id="metodologia"><?php echo trim($row['metodologia']) ?></textarea></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Las diferentes capacitaciones tienen su propia metod&oacute;logia. Ej. Este curso se desarrolla a partir del uso de la metodolog&iacute;a del aprendizaje activo.
Ser&aacute; de gran valor la consulta permanente en los libros</td>
                  </tr>
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" class="style14" >Requisitos</td>
                    <td valign="top" bgcolor="#FFFFFF" ><textarea name="requisitos" class="Selectors" cols="55" rows="6" id="requisitos"><?php echo trim($row['requisitos']) ?></textarea></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Los requisitos que el alumno debe de cumplir para poder matricular. Ej. El alumno debe de saber manejar el ambiente windows 7</td>
                  </tr>
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" class="style14" >Audiencia</td>
                    <td valign="top" bgcolor="#FFFFFF" >
					<textarea name="audiencia" cols="55" rows="6" class="Selectors" id="audiencia"><?php echo trim($row['audiencia']) ?></textarea></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Para quien va dirigido la capacitaci&oacute;n. Ej. Este curso va dirigido a profesionales en el ambito de la programaci&oacute;n y dise&ntilde;o gr&aacute;fico.</td>
                  </tr>
                  
                                    <tr>
                    <td valign="top" bgcolor="#FFFFFF" class="style14" >Impartido por:</td>
                    <td valign="top" bgcolor="#FFFFFF" >
<textarea name="impartidopor" cols="55" rows="6" class="Selectors" id="impartidopor"><?php echo trim($row['impartidopor']) ?></textarea></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Nombre de la persona o personas quienes van a impartir el curso. Ej. Luis Vargas, Profesor de las ciencias de la computaci&oacute;n de la universidad de Costa Rica, 10 a&ntilde;os de experiencia.</td>
                  </tr>
                  
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" class="style14" >Duraci&oacute;n</td>
                    <td valign="top" bgcolor="#FFFFFF" >
  <input name="duracion" class="Selectors" type="text" id="duracion" value="<?php echo trim($row['duracion']) ?>" size="40" /></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >La duraci&oacute;n es el tiempo necesario para llevar la capacitaci&oacute;n. Ej. 2 semanas.</td>
                  </tr>

                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Inversi&oacute;n  </span></td>
                    <td valign="top" bgcolor="#FFFFFF" ><input name="inversion" class="Selectors" type="text" id="inversion" value="<?php echo trim($row['inversion']) ?>" size="40" /></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >El costo a invertir para poder matricular la capacitaci&oacute;n. Ej. 550 d&oacute;lares.</td>
                  </tr>
                  
          <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Formas de Pago</span></td>
                    <td valign="top" bgcolor="#FFFFFF" ><textarea name="formasdepago" cols="55" rows="6" class="Selectors" id="formasdepago"><?php echo trim($row['formasdepago']) ?></textarea></td>
        <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Las diferentes formas de pago que la instituci&oacute;n que imparte la capacitaci&oacute;n acepta. Ej. Hacer los depositos a la cuenta 12-585-41 del Banco de Costa Rica.</td>
                  </tr>                  
    
     <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Informaci&oacute;n de contacto</span></td>
                    <td valign="top" bgcolor="#FFFFFF" ><textarea name="mayorinformacion" cols="55" rows="6" class="Selectors" id="mayorinformacion"><?php echo trim($row['mayorinformacion']) ?></textarea></td>
<td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Nombre y datos de la persona encargada de la matricula. Ej. Roberto Esquivel, t&eacute;lefono 2545-8545, email: resquivel@cursosycapacitaciones.com</td>
                  </tr>                
                  
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Email a notificar</span>  <strong><span class="style3">*</span></strong></td>
                    <td valign="top" bgcolor="#FFFFFF" ><input name="contacto" type="text" class="Selectors" id="contacto" value="<?php echo trim($row['contacto']) ?>" size="40" />                  </td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Favor escriba el correo el&eacute;ctronico al cual desea que lleguen las notificaciones de personas interesadas en llevar la capacitaci&oacute;n. Ej. info@nombredesuinstituci&oacute;n.com</td> 
                  </tr>
                  
                      <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Link de Confirmaci&oacute;n</span></td>
                    <td valign="top" bgcolor="#FFFFFF" ><input name="linkconfirmacion" type="text" class="Selectors" id="linkconfirmacion" value="<?php echo trim($row['linkconfirmacion']) ?>" size="40" />                  </td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Muchas empresas tienen sistema de confirmaci&oacute;n en linea, escriba el link. Ej. http://universidadX.com/confirma.php</td> 
                  </tr>
                  
                  <tr>
                    <td bgcolor="#FFFFFF" >&nbsp;</td>
                    <td colspan="2" bgcolor="#FFFFFF" >&nbsp;</td>
                  </tr>
                 
				  
				                   <tr bgcolor="#006699">
                    <td colspan="3" align="center" bgcolor="#006699"  >
<input type='hidden' name='samoyedo2' value='si' />
               <input type='submit'  class="selectors"value='Actualizar Curso'></td>
                  </tr>				  
      </table> 
              

  <?php 	} 
			  
			  	else
	
	{ 
	require_once('error.html'); 
	}
			  ?> </form>