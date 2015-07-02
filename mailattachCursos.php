<link href="xajax/mailattach.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<?php
require_once('recaptchalib.php');
//Llaves de la captcha
$captcha_publickey = "6LfAuAoAAAAAALOAtGJ8mXVAqbkkc9LaPUWz87Jb";
$captcha_privatekey = "6LfAuAoAAAAAAFx-Qm1s6Ue-EPIr5hjUtpCS9BsW";
//por ahora ponemos a null el error de la captcha
$error_captcha=null;
$captcha_respuesta = recaptcha_check_answer ($captcha_privatekey,
$_SERVER["REMOTE_ADDR"],
$_POST["recaptcha_challenge_field"],
$_POST["recaptcha_response_field"]);

if ($captcha_respuesta->is_valid) {
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
$link = "<br>El link del curso es:<br>".MYURL."/insidecursos.php?type=cursos&id=".$info['id'];
require("xajax/class.phpmailer.php");
$msg = "";
if ($_POST['action'] == "send") {
	$varname = $_FILES['archivo']['name'];
    $vartemp = $_FILES['archivo']['tmp_name'];
	$mail = new PHPMailer();
	$mail->Host = "localhost";
	$mail->From = "info@cursosycapacitaciones.com";
//	$mail->From = $_POST['email'];
	$mail->FromName = "Cursos y Capacitaciones - ";
	$mail->Subject = "Posible candidato para ".$info['id']." - ".$info['nombreCurso'];
	//$mail->Subject = $_POST['asunto'];
	$mail->AddAddress($_POST['destino']);
	$mail->AddAddress($_POST['destino2']); // email yenory
	if ($varname != "") {
		$mail->AddAttachment($vartemp, $varname);
	}
	$body = "<strong>Mensaje</strong><br><br>".$_POST['mensaje']."<br><br>Mi Correo es: ".$_POST['email'].$link;
	$body.= "<br><br><i>Correo enviado por CursosyCapacitaciones.com</i>";
	$mail->Body = $body;
	$mail->IsHTML(true);
	$mail->Send();
	$msg = "Mensaje enviado correctamente";
}

///CORREO A INTERESADO////////////////////////////////////////

if ($_POST['action'] == "send") {
$para      = $_POST['email'];
$asunto    = "CursosyCapacitaciones.com";
$mensaje   = "Su solicitud de información ha sido enviada. <br>Prontamente un representante se va a poner en contacto.<br>Muchas Gracias.";
$cabeceras = 'From: info@cursosycapacitaciones.com' . "\r\n" .
    'Reply-To: info@cursosycapacitaciones.com' . "\r\n" .
	'Content-type: text/html; charset=iso-8859-1' . "\r\n" .	
    'X-Mailer: PHP/' . phpversion();

mail($para, $asunto, $mensaje, $cabeceras);
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////
} else {
   //El código de validación de la imagen está mal escrito.
   $error_captcha = $captcha_respuesta->error;
   if ($_POST['action'] == "send") {
   	$msg = "Mensaje no enviado porque se lleno mal el CAPTCHA"; }
}


?>

<link href="style.css" rel="stylesheet" type="text/css" />
<table width="100%" border="0" >
  <tr>
    <td  align="left"><strong class="TtuloCursoInside">Obtener m&aacute;s informaci&oacute;n para el curso</strong></td>
  </tr>
</table>

<table width="90%" border="0" align="left" cellspacing="0" cellpadding="0">
  <tr>
    <td   >
	<div class="borde">

	<?php 
	
	if ($msg != "") { ?><span class="conf"><br><?php echo $msg; ?></span><br><?php } ?>
	<form action="insidecursos.php?type=cursos&id=<?php echo $info['id']; ?>" method="post" enctype="multipart/form-data">
	  
   <input name="destino" type="hidden" value="zuicid@gmail.com" size="50">
   
  <input name="destino2" type="hidden" value="<?php echo htmlentities($info['contacto']); ?>" size="50">
  
	  <span class="azulito">Nombre Completo</span> <br>
	  <input type="text" name="asunto" size="50" class="Selectors">
	  <br>
      	   <span class="azulito"> Correo el&eacute;ctronico</span><br>
	  <input type="text" name="email" size="50" class="Selectors">
	
	  <input type="hidden" name="archivo"  size="32">
	  <br>
	  <span class="azulito"> Mensaje </span><br>
	  <textarea name="mensaje" cols="47" rows="8" wrap="virtual" id="mensaje" class="Selectors"></textarea>
	  <br><br>
      
<?php
require_once('recaptchalib.php');
//Llaves de la captcha
$captcha_publickey = "6LfAuAoAAAAAALOAtGJ8mXVAqbkkc9LaPUWz87Jb";
$captcha_privatekey = "6LfAuAoAAAAAAFx-Qm1s6Ue-EPIr5hjUtpCS9BsW";
//por ahora ponemos a null el error de la captcha
$error_captcha=null;
?>


<?php
//escribimos en la página lo que nos devuelve recaptcha_get_html()
echo recaptcha_get_html($captcha_publickey, $error_captcha);
?>
      
      <br />

	  <input type="submit" name="btsend" class="Selectors" value="Enviar Informaci&oacute;n">
	  <input type="hidden" name="action" value="send" />
	  </p>
	</form>
	</div>
	</td>
  </tr>
</table>
