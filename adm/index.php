   <?php // Configura la información de tu cuenta
   
   include ('../constantes.php'); 

    session_start();

    // Conexión a la base de datos
    mysql_connect (SQLHOST, SQLUSERNAME, SQLPASSWORD);
    mysql_select_db(SQLDATABASE) or die('Cannot select database');
	@mysql_query("SET NAMES 'utf8'");



    if (isset($_SESSION['s_username'])) {
    //echo "Bienvenido a mi sitio has ingresado como ".$_SESSION['s_username'].", gracias por la visita!";
		
	global $samoyedo;
	$samoyedo=1;
require_once('administrator.php'); 
 }else{
 	$samoyedo=0;
    echo "Tu no estas autentificado dirígete a login.php o registrate en register.php";
    echo $_SESSION['s_username'];
    }
    ?> 