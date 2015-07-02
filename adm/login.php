<?php     // Configura los datos de tu cuenta

    include ('../constantes.php'); 

    session_start();

    // Conexión a la base de datos
    mysql_connect (SQLHOST, SQLUSERNAME, SQLPASSWORD);
    mysql_select_db(SQLDATABASE) or die('Cannot select database');
	

  //  if ($_POST['username']) {
    //Comprobacion del envio del nombre de usuario y password
    $username=$_POST['username'];
    $password=$_POST['password'];
    if (($password==NULL) or ($username == NULL)) {
	 echo "<table width='100%' border='0' align='center' bgcolor='#333333'><tr> <td class='copyHead'>	
	Debe de llenar los campos del formulario </td></tr></table>";	 
	include ('autuser.php');
		
    }else{
    $query = mysql_query("SELECT username,password,verificado FROM users WHERE username = '$username'") or die(mysql_error());
    $data = mysql_fetch_array($query);
	
    if($data['password'] != $password) {
	 echo "<table width='100%' border='0' align='center' bgcolor='#333333'><tr> <td class='copyHead'>	
	El password ingresado es incorrecto </td></tr></table>";	 
	include ('autuser.php');
	 }
	 
	elseif ($data['verificado'] == '0') {
	 echo "<table width='100%' border='0' align='center' bgcolor='#333333'><tr> <td class='copyHead'>	
	Esta cuenta no a sido verificada, favor revisar su correo electronico, de lo contrario comunicarse a info@cursosycapacitaciones.com</td></tr></table>";	 
	include ('autuser.php');
	
    }else{
    $query = mysql_query("SELECT username,password FROM users WHERE username = '$username'") or die(mysql_error());
    $row = mysql_fetch_array($query);
    $_SESSION["s_username"] = $row['username'];

	global $samoyedo;
    $samoyedo = 1 ;
 	require_once('index.php'); 

	}
    }
 //   }
    ?> 