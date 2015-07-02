<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
<?php

$tiketnumber = date("YmdHis");
require("xajax/class.phpmailer.php");
$msg = "";
if ($_POST['action'] == "send") {
	$varname = $_FILES['archivo']['name'];
    $vartemp = $_FILES['archivo']['tmp_name'];

	$mail = new PHPMailer();
	$mail->Host = "localhost";
	$mail->From = $_POST['email'];
	$mail->FromName = "CursosyCapacitaciones,com ";
	$mail->Subject = "Formulario de Contacto";
	//$mail->Subject = $_POST['asunto'];
	$mail->AddAddress($_POST['destino']);
	if ($varname != "") {
		$mail->AddAttachment($vartemp, $varname);
	}
	$body = "
	Ticket Number: ".$tiketnumber." <br />
Tipo de Mensaje : ".$_POST['tipodeinformacion']."<br />
  Nombre de la empresa: ".$_POST['nombredelaempresa']."<br />
Telefono de la empresa: ".$_POST['telefono']."<br />
Fax: ".$_POST['Fax']."<br />
Sitio Web: ".$_POST['sitioweb']."<br />
Producto: ".$_POST['producto']."<br /><br />

	
	<strong>Mensaje</strong>	
	<br><br>".$_POST['mensaje']."<br><br>Mi Correo es: ".$_POST['email'];
	$body.= "<br><br><i>Enviado por CursosyCapacitaciones.com</i>";
	$mail->Body = $body;
	$mail->IsHTML(true);
	$mail->Send();
	$msg = "Mensaje enviado correctamente";
}

///CORREO A INTERESADO//////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

$para      = $_POST['email'];
$asunto    = "CursosyCapacitaciones.com Ticket # ".$tiketnumber."";
$mensaje   = "Su Reporte ha sido recibido por nuestro equipo. <br>Prontamente un representante se va a poner en contacto. <br>Muchas Gracias.";
$cabeceras = 'From: info@cursosycapacitaciones.com' . "\r\n" .
    'Reply-To: info@cursosycapacitaciones.com' . "\r\n" .
	'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
	
    'X-Mailer: PHP/' . phpversion();

mail($para, $asunto, $mensaje, $cabeceras);
?>


