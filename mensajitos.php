


<?php
    $msg = $_GET["msg"];
    $email = $_GET["email"]; 
	
	echo "<link href='style.css' rel='stylesheet' type='text/css' />";
	
switch ( $msg) {
case '1':
    echo "
	<table width='100%' border='0' align='center' bgcolor='#FFF' ><tr> <td class='letragay'>	
	El usuario $username ha sido registrado de manera satisfactoria. Las instrucciones de activaci&oacute;n de la cuenta han sido enviadas al correo $email. No olvide revisar en el spam, ya que algunos servidores son ingratos </td></tr></table>";
   break;
case '2':
    echo "	<table width='100%' border='0' align='center' bgcolor='#FFF' > <tr><td class='letragay'>	El username que se trato de registrar ya est&aacute; en uso </td>  </tr></table>";
   break;
case '3':
    echo "<table width='100%' border='0' align='center' bgcolor='#FFF' > <tr><td class='letragay'>La contrase&ntilde;a para el correo $email es incorrecta </td>  </tr></table>";
   break;   
   case '4':
   echo "	<table width='100%' border='0' align='center' bgcolor='#FFF' > <tr><td align='center' class='letragay'>El mensaje a sido enviado correctamente</td>  </tr></table>";
 include ('reportesMailSender.php');  
 break;   
   
case '5':
    echo "	<table width='100%' border='0' align='center' bgcolor='#FFF' > <tr><td align='center' class='letragay'>El curso que a buscado a sido eliminado de nuestra base de datos. Disculpe el inconveniente</td>  </tr></table>";
   break;   
   
case '6':
    echo "	<table width='100%' border='0' align='center' bgcolor='#FFF' > <tr><td align='center' class='letragay'>Gracias por su compra... Las instrucciones de activacion de la cuenta han sido enviadas a su correo electronico</td>  </tr></table>";
   break;    
   
case '7':
    echo "	<table width='100%' border='0' align='center' bgcolor='#FFF' > <tr><td align='center' class='letragay'>Se ha cancelado la compra, si tiene alguna duda favor escribir a info@cursosycapacitaciones.com</td>  </tr></table>";
   break;     
   
   
case '8':
    echo "	<table width='100%' border='0' align='center' bgcolor='#FFF' > <tr><td align='center' class='letragay'>El usuario ha sido registrado de manera satisfactoria. Las instrucciones de activacion de la cuenta han sido enviadas a su correo electronico. Puede que tarde hasta 30 minutos en llegarle el correo</td>  </tr></table>";
   break;    
   
case '9':
    echo "	<table width='100%' border='0' align='center' bgcolor='#FFF' > <tr><td align='center' class='letragay'>Su cuenta a sido verificada con exito! Bienvenido a CursosyCapacitaciones.com</td>  </tr></table>";
   break;       
   
   
}      
?>
