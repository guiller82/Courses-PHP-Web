<?php  


    $login = $_GET["login"];
    $codigo = $_GET["codigo"];

// Configura los datos de tu cuenta
//  include ('configusers.php');
	
	include ('../constantes.php'); 

	
    // Conexión a la base de datos
    mysql_connect (SQLHOST, SQLUSERNAME, SQLPASSWORD);
    mysql_select_db(SQLDATABASE) or die("Cannot select database");
	
	 // Comprobamos si el nombre de usuario o la cuenta de correo ya existían
    $sql = "SELECT count(*) FROM users WHERE username='$login' AND seguridad='$codigo'";

    $count = mysql_fetch_row(mysql_query($sql)) or die("Query failed : " . mysql_error() . mysql_errno());
 

if ($count[0] == 0) {
echo "ERROR - Activaci�n NO permitida";
}else{
//echo "Gracias! $login. Cuenta Verificada.";
$sql="UPDATE users SET verificado = 1 WHERE username='$login'";
mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());		
 header("Location: ".MYURL."/index.php?msg=9");
}

 
//include ('../adm/autuser.php');
?>




	