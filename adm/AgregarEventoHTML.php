<link href="../style.css" rel="stylesheet" type="text/css" />
<?php	


	
if ($_POST[samoyedo2] == 'si')  
	{
?>

<script type="text/javascript">
//Validadores
function validarDatos() {
	
  if (form.nombreCurso.value.length==0) {
    alert('Favor Agregar el nombre del curso');
	 return false;
  }
  
  if (form.descripcion.value.length==0) {
    alert('Favor Agregar la descripcion del curso');
	 return false;
  }
  
  if (form.categoria.value==0) {
    alert('Favor Agregar la categoria del curso');
	 return false;
  }
  
  if (form.tipo.value==0) {
    alert('Favor el tipo de capacitación');
	 return false;
  }
    if (form.modalidad.value==0) {
    alert('Favor agregar la modalidad de la capacitación');
	 return false;
  }

  if (form.email.value.length==0) {
    alert('Favor Agregar email a notificar');
	 return false;
  }

  }
</script>

<form action='administrator.php' name="form" method='post' onSubmit="return submitForm();">
                              <input type='hidden' name='action' value='add_Evento'>
                <table width="1000px" border="0" align="center" cellspacing="1" cellpadding="5">
                  <tr>
                    <td colspan="4" valign="top" bgcolor="#FFFFFF"  ><p class="style2">Crear Nuevo Curso<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="11" bgcolor="#006699"></td>
                        </tr>
                      </table>                     </td>
                  </tr>
                  <tr>
                    <td width="21%" valign="top" bgcolor="#FFFFFF" ><span class="style14">Organizaci&oacute;n </span><strong><span class="style3">*</span></strong></td>
                    <td width="47%" valign="top" bgcolor="#FFFFFF"  ><input name="organizacion" readonly="readonly" type="text" id="organizacion" value="<?php echo $organizacion ?>" size="40"  class="Selectors"  /></td>
                    <td width="32%" valign="top" bgcolor="#FFFFFF" class="letraQuees"  >El campo no puede ser editado</td>
                  </tr>	
                          <tr>
                    <td width="21%" valign="top" bgcolor="#FFFFFF" ><span class="style14">Nombre del Curso <strong><span class="style3">*</span></strong></span></td>
                    <td width="47%" valign="top" bgcolor="#FFFFFF"  ><input name="nombreCurso" type="text" id="nombreCurso" size="40" class="Selectors"  /></td>
                    <td width="32%" valign="top" bgcolor="#FFFFFF" class="letraQuees"  >Favor no escribir la palabra curso. Ej. Especialización en programación php </td>
                  </tr>
                  <tr>
                    <td width="21%" valign="top" bgcolor="#FFFFFF" class="style14" >Categor&iacute;a <strong><span class="style3">*</span></strong></td>
                    <td valign="top" bgcolor="#FFFFFF"  >
                    <input name="departamento" type="hidden" id="departamento" value="<?php echo $departamento ?>" size="40" />
                    <input name="pais" type="hidden" id="pais" value="<?php echo $pais ?>" size="40" />
                   
                   <textarea name="categoria" cols="55" class="Selectors" rows="3" id="categoria"></textarea>
                   
                   </td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees"  >Escriba las diferentes categorias separadas por una coma. Ej. php, programación, computación, mysql</td>
                  </tr>
                  
                  
                  
   <tr>
                    <td width="21%" valign="top" bgcolor="#FFFFFF" class="style14" >Tipo <strong><span class="style3">*</span></strong></td>
                    <td valign="top" bgcolor="#FFFFFF"  ><select name='tipo' id='tipo' enabled='true' class="Selectors" >
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
                    <td width="21%" valign="top" bgcolor="#FFFFFF" class="style14" >Modalidad <strong><span class="style3">*</span></strong></td>
                    <td valign="top" bgcolor="#FFFFFF"  ><select name='modalidad' id='modalidad' enabled='true' class="Selectors" >
                      <option value="0">Modalidad</option>
                      <option value="Presencial">Presencial</option>
                      <option value="Virtual">Virtual</option>
                      <option value="Presencial - Virtual">Presencial - Virtual</option>
                                        </select></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees"  >Escoja la modalidad de la capacitaci&oacute;n. Ej. Presencial</td>
                     </tr>

       <tr>
                    <td bgcolor="#FFFFFF" class="style14" valign="top" >Ubicaci&oacute;n</td>
         <td valign="top" bgcolor="#FFFFFF"  ><span class="light_back style3 style11">
<textarea name="ubicacion" cols="55" rows="3" id="ubicacion" class="Selectors" ></textarea>
                    </span></td>
<td valign="top" bgcolor="#FFFFFF" class="letraQuees"  >Escriba la dirección fisica donde se va a impartir la capacitación. Ej. Instalaciónes instituto ACME, detras del hospital.</td>
                  </tr>
                  
                  
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" class="style14" >Descripci&oacute;n <strong><span class="style3">*</span></strong></td>
                    <td valign="top" bgcolor="#FFFFFF"  >
                      <textarea name="descripcion" cols="55" rows="6" id="descripcion" class="Selectors" ></textarea>
                   </td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees"  >Escriba una descripción corta sobre la capacitación que se pretende impartir. Esto va a ser lo primero que el cliente va a leer en el listado.</td>
                  </tr>
                  
                  
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" class="style14" >Objetivos</td>
                    <td valign="top" bgcolor="#FFFFFF"  ><span class="light_back style3 style11">
                      <textarea name="objetivos" cols="55" rows="6" id="objetivos" class="Selectors" ></textarea>
                    </span></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees"  >Escriba los diferentes objetivos que va a cumplir la capacitación, debe de ser claros y consisos.</td>
                  </tr>
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" class="style14" >Contenido</td>
                    <td valign="top" bgcolor="#FFFFFF"  ><span class="light_back style3 style11">
                      <textarea name="contenido" cols="55" rows="6" id="contenido" class="Selectors" ></textarea>
                    </span></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees"  >Escriba el contenido de los diferentes objetivos del curso, taller o capacitación</td>
                  </tr>
                  
                          <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Materiales que incluye</span></td>
                    <td valign="top" bgcolor="#FFFFFF" ><textarea name="incluye" cols="55" rows="6" class="Selectors" id="incluye"></textarea></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Muchas capacitaciones ofrecen diferente tipo de materiales para llevar a cabo como un plus hacia el cliente. Ej. Cada persona va a contar con un computador personal.</td>
                  </tr>
                  
                  
                  <tr>
                    <td width="21%" bgcolor="#FFFFFF" class="style14" valign="top" >Metodolog&iacute;a</td>
                    <td valign="top" bgcolor="#FFFFFF"  ><span class="light_back style3 style11">
                    <textarea name="metodologia" cols="55" rows="6" id="metodologia" class="Selectors" ></textarea>
                    </span></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees"  >Las diferentes capacitaciones tienen su propia metodólogia. Ej. Este curso se desarrolla a partir del uso de la metodología del aprendizaje activo.
Será de gran valor la consulta permanente en los libros</td>
                  </tr>
                  <tr>
                    <td width="21%" valign="top" bgcolor="#FFFFFF" class="style14" >Requisitos </td>
                    <td valign="top" bgcolor="#FFFFFF"  ><span class="light_back style3 style11">
                      <textarea name="requisitos" cols="55" rows="6" id="requisitos" class="Selectors" ></textarea>
                    </span></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees"  >Los requisitos que el alumno debe de cumplir para poder matricular. Ej. El alumno debe de saber manejar el ambiente windows 7</td>
                  </tr>
                  <tr>
                    <td width="21%" valign="top" bgcolor="#FFFFFF" ><span class="style14">Audiencia</span></td>
                    <td valign="top" bgcolor="#FFFFFF"  ><span class="light_back style3 style11">
                      <textarea name="audiencia" cols="55" rows="6" id="audiencia" class="Selectors"></textarea>
                    </span></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees"  >Para quien va dirigido la capacitación. Ej. Este curso va dirigido a profesionales en el ambito de la programación y diseño gráfico.</td>
                  </tr>
                  
                         <tr>
                    <td valign="top" bgcolor="#FFFFFF" class="style14" >Impartido por:</td>
                    <td valign="top" bgcolor="#FFFFFF" >
<textarea name="impartidopor" cols="55" rows="6" class="Selectors" id="impartidopor"></textarea>
</td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Nombre de la persona o personas quienes van a impartir el curso. Ej. Luis Vargas, Profesor de las ciencias de la computación de la universidad de Costa Rica, 10 años de experiencia.</td>
                  </tr>
                  
                  
                  <tr>
                    <td width="21%" valign="top" bgcolor="#FFFFFF" class="style14" >Duraci&oacute;n</td>
                    <td valign="top" bgcolor="#FFFFFF"  ><input name="duracion" type="text" id="duracion" size="40" class="Selectors" /></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees"  >La duración es el tiempo necesario para llevar la capacitación. Ej. 2 semanas.</td>
                  </tr>
           
            
                  
           
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Inversi&oacute;n</span></td>
                    <td valign="top" bgcolor="#FFFFFF" ><input name="inversion" type="text" id="inversion" size="40" class="Selectors" /></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >El costo a invertir para poder matricular la capacitación. Ej. 550 dólares.</td>
                  </tr>
                  
                            <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Formas de Pago</span></td>
                    <td valign="top" bgcolor="#FFFFFF" ><textarea name="formasdepago" cols="55" rows="6" class="Selectors" id="formasdepago"></textarea>
                    </td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Las diferentes formas de pago que la institución que imparte la capacitación acepta. Ej. Hacer los depositos a la cuenta 12-585-41 del Banco de Costa Rica.</td>
                  </tr>    
                  
                     <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Informaci&oacute;n de contacto</span></td>
                    <td valign="top" bgcolor="#FFFFFF" ><textarea name="mayorinformacion" cols="55" rows="6" class="Selectors" id="mayorinformacion"></textarea></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Nombre y datos de la persona encargada de la matricula. Ej. Roberto Esquivel, télefono 2545-8545, email: resquivel@cursosycapacitaciones.com</td>
                  </tr>  
                  
                  
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Email a notificar </span><span class="style14"><strong><span class="style3">*</span></strong></span></td>
                    <td valign="top" bgcolor="#FFFFFF"  ><input name="contacto" type="text" value="<?php echo $email ?>" id="contacto" size="40" class="Selectors" /></td>
                    <td valign="top" bgcolor="#FFFFFF" class="letraQuees"  >Favor escriba el correo eléctronico al cual desea que lleguen las notificaciones de personas interesadas en llevar la capacitación. Ej. info@nombredesuinstitución.com</td>
                  </tr>
                  
             <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Link de Confirmaci&oacute;n</span></td>
                    <td valign="top" bgcolor="#FFFFFF" ><input name="linkconfirmacion" type="text" class="Selectors" id="linkconfirmacion"  size="40" />                  </td>
              <td valign="top" bgcolor="#FFFFFF" class="letraQuees" >Muchas empresas tienen sistema de confirmación en linea, escriba el link. Ej. http://universidadX.com/confirma.php</td> 
                  </tr>                  
                  
                  <tr>
                    <td bgcolor="#FFFFFF" >&nbsp;</td>
                    <td colspan="2" bgcolor="#FFFFFF"  >&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="4" bgcolor="#006699"  > <input type='hidden' name='samoyedo2' value='si' />

              <div align="center">  <input type='submit' value='Publicar Curso' class="Selectors" onClick="return validarDatos()" ></div>

              </td>
                  </tr>
  </table>
                
    

  <?php 	} 
			  
			  	else
	
	{ 
	require_once('error.html'); 
	}
			  ?></form>