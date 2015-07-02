<link href="xajax/mailattach.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 

<?php
require("xajax/class.phpmailer.php");
$msg = "";
if ($_POST['action'] == "send") {
	$varname = $_FILES['archivo']['name'];
    $vartemp = $_FILES['archivo']['tmp_name'];

	$mail = new PHPMailer();
	$mail->Host = "localhost";
	$mail->From = $_POST['email'];
	$mail->FromName = "e-volutionSoft BUG Report";
	$mail->Subject = "poner aca mensaje";
	//$mail->Subject = $_POST['asunto'];
	$mail->AddAddress($_POST['destino']);
	if ($varname != "") {
		$mail->AddAttachment($vartemp, $varname);
	}
	$body = "
	
Tipo de Mensaje : ".$_POST['tipodeinformacion']."<br />
  Nombre de la empresa: ".$_POST['nombredelaempresa']."<br />
Telefono de la empresa: ".$_POST['telefono']."<br />
Fax: ".$_POST['Fax']."<br />
Sitio Web: ".$_POST['sitioweb']."<br />
Producto: ".$_POST['producto']."<br />

	
	<strong>Mensaje</strong>	
	<br><br>".$_POST['mensaje']."<br><br>Mi Correo es: ".$_POST['email'];
	$body.= "<br><br><i>Enviado por e-volutionSoft</i>";
	$mail->Body = $body;
	$mail->IsHTML(true);
	$mail->Send();
	$msg = "Mensaje enviado correctamente";
}
?>

<table width="100%" border="0" >
  <tr>
    <td class='whitetable' align="left"><strong class="subder">Formulario de contacto</strong></td>
  </tr>
</table>

<table width="100%" border="0" align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40%" valign="top"  class="descdet">
	<div class="borde">
	<span class="textostitulos">Ingresar los datos en el formulario.</span> 
	<?php if ($msg != "") { ?><span class="conf"><br>
	<?php global $msg; ?></span><br><?php } ?>
	<form action="index.php?msg=4" method="post" enctype="multipart/form-data">
	  
	  <input name="destino" type="hidden" value="info@e-volutionsoft.com" size="50">
      
	  <span class="textos">Comunicarse con:</span><br>
	  <label>
	  <select name="tipodeinformacion" id="tipodeinformacion"  class="Selectors" >
	    <option value="Soporte">Soporte</option>
	    <option value="Publicidad">Publicidad</option>
	    <option value="Sugerencias">Sugerencias</option>
      </select>
	  </label>
	  <br />

      
      
      	  <span class="textos">Nombre de la empresa</span><br>
	  <input type="text" name="nombredelaempresa" size="60" style="width:280px"  class="Selectors" >
	  <br>
      	  <span class="textos">Tel&eacute;fono</span><br>
	  <input type="text" name="telefono" size="60" style="width:280px"  class="Selectors" >
	  <br>
      	  <span class="textos">Fax</span><br>
	  <input type="text" name="Fax" size="60" style="width:280px"  class="Selectors" >
	  <br>
      	  <span class="textos">Sitio Web</span><br>
	  <input type="text" name="sitioweb" size="60" style="width:280px"  class="Selectors" >
	  <br>
      
      
      
      
      
	  <span class="textos">Nombre Completo</span><br>
	  <input type="text" name="asunto" size="60" style="width:280px" class="Selectors" >
	  <br>
      	  <span class="textos">Correo el&eacute;ctronico</span><br> 
	  <input type="text" name="email" size="60" style="width:280px" class="Selectors" >
	  <br>

d  
	  <br />
	  <span class="textos">Mensaje.</span><br>
	  <textarea name="mensaje" cols="60" rows="7" wrap="virtual" id="mensaje" style="width:280px"  class="Selectors" ></textarea>
	  <br>
      	  <span class="textos">Enviar logo de la institución</span><br>
	  <input type="file" name="archivo"  size="32" class="Selectors" >
	  <br> <br>
	  <div align="left"><input type="submit" name="btsend"  value="Enviar Informaci&oacute;n" class="Selectors"> 
     &nbsp;   <input type="submit" class="Selectors" onclick="closeMessage();return false" value="Cerrar">
      </div>
	  <input type="hidden" name="action" value="send" />
	  </p>
	</form>
	</div>	</td>
    <td width="60%" valign="top"  class="descdet" style="padding-left:5px; padding-right:0px">
<div >  
  <p><strong>CursosyCapacitaciones.com </strong>
    <br/>
    <strong>San José<br/>
      Costa Rica </strong><br />
      <br />
     
    <strong>Tel:</strong> (506) 8858-1100<br/>
    <br />
    <strong>Web site</strong>: http://cursosycapacitaciones.com<br/>
    <strong>e-mail:</strong> informacion@cursosycapacitaciones.com <br />
    <br />
    Envíe sus comentarios y consultas a info@cursosycapacitaciones.com<br/>
    <br/>
   
    
    
    <br/> 
  </p>
</div>

    
    </td>
  </tr>
</table>