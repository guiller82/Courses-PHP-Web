<?php     // Configura los datos de tu cuenta

include ('../constantes.php'); 
//    session_start();
    mysql_connect (SQLHOST, SQLUSERNAME, SQLPASSWORD);
    mysql_select_db(SQLDATABASE) or die('Cannot select database');
	@mysql_query("SET NAMES 'utf8'");


    // Preguntaremos si se han enviado ya las variables necesarias
    if (isset($_POST["username"])) {
    $organizacion = $_POST["organizacion"];
	$departamento = $_POST["departamento"];	
	$username = preg_replace('/\\s+/', '', $_POST["username"]);
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $email = $_POST["email"];
	$pais = $_POST["pais"];
    // Hay campos en blanco
    if($username==NULL|$password==NULL|$cpassword==NULL|$email==NULL) {
	 echo "<table width='100%' border='0' align='center' bgcolor='#333333'><tr> <td class='copyHead'>	
	Debe de llenar todos los campos del formulario </td></tr></table>";
    }else{
    // ¿Coinciden las contraseñas?
    if($password!=$cpassword) {
	 echo "<table width='100%' border='0' align='center' bgcolor='#333333'><tr> <td class='copyHead'>	
	Las contraseñas no coinciden </td></tr></table>";
    }else{
    // Comprobamos si el nombre de usuario o la cuenta de correo ya existían
    $checkuser = mysql_query("SELECT username FROM users WHERE username='$username'");
    $username_exist = mysql_num_rows($checkuser);

    $checkemail = mysql_query("SELECT email FROM users WHERE email='$email'");
    $email_exist = mysql_num_rows($checkemail);

 if ($email_exist>0) {
	 
	 echo "<table width='100%' border='0' align='center' bgcolor='#333333'><tr> <td class='copyHead'>	
	El email ingresado esta siendo utilizado en nuestro sistema </td></tr></table>";	 

    }elseif ($username_exist>0) {
		
	 echo "<table width='100%' border='0' align='center' bgcolor='#333333'><tr> <td class='copyHead'>	
	El username ingresado esta siendo utilizado en nuestro sistema </td></tr></table>";	
	
    }else{
    //Todo parece correcto procedemos con la inserccion
	$seguridad = $username.strval(rand(1, 100000));
	
	$query = "INSERT INTO users (username, password, email, verificado, fechaFinal, organizacion, departamento, pais, seguridad) VALUES('$username', '$password', '$email','0', DATE_ADD(CURRENT_DATE(), INTERVAL 365 DAY), '$organizacion', '$departamento', '$pais', '$seguridad')";



//	$query = "UPDATE users SET  = '$',  = '$departamento', ',  = '$password',  = '$pais', seguridad = '$seguridad', fechaFinal = DATE_ADD(CURRENT_DATE(), INTERVAL 365 DAY) WHERE email = '$email'";
    mysql_query($query) or die(mysql_error());
	
	//echo $query;
	
	$message = "Hola ".$username.".\n Haga click en el siguiente vínculo para verificar su dirección de correo electrónico y activar su cuenta. La verificación del correo electrónico protege su identidad y le permite utilizar de manera segura las herramientas de nuestro sitio.\n    

http://www.cursosycapacitaciones.com/admUsers/activar.php?login=".$username."&codigo=".$seguridad."\n

Su Login es:".$username." \n
Su Password es:".$password." \n

Gracias por registrarse\n
Esquipo de CursosyCapacitaciones.com";

$cabeceras = 'From: info@cursosycapacitaciones.com' . "\r\n" .
    'Reply-To: info@cursosycapacitaciones.com' . "\r\n" .
	'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
	
	mail($email,"Acción requerida para activar tu cuenta en CursosyCapacitaciones.com",$message, $cabeceras);

	
	 header("Location: ".MYURL."/index.php?msg=8");
    }
    }
    }
    }
	
	include ('adduser2.php');
    ?> 
