<?php     // Configura los datos de tu cuenta

   include ('../constantes.php'); 

    session_start();

    // Conexión a la base de datos
    mysql_connect (SQLHOST, SQLUSERNAME, SQLPASSWORD);
    mysql_select_db(SQLDATABASE) or die('Cannot select database');
	
    if ($_POST['username']) {
    //Comprobacion del envio del nombre de usuario y password
    $username=$_POST['username'];
    $password=$_POST['password'];
    if ($password==NULL) {
    echo "La password no fue enviada";
    }else{
    $query = mysql_query("SELECT username,password FROM users WHERE username = '$username' AND verificado = 1") or die(mysql_error());
    $data = mysql_fetch_array($query);
    if($data['password'] != $password) {
    echo "Login incorrecto";
    }else{
    $query = mysql_query("SELECT username,password FROM users WHERE username = '$username'") or die(mysql_error());
    $row = mysql_fetch_array($query);
    $_SESSION["s_username"] = $row['username'];
  //  echo "Has sido logueado correctamente ".$_SESSION['s_username']." y puedes acceder al index.php.";
// $_POST['action'] = 'edit_listing'; 


global $samoyedo;
 $samoyedo = 1 ;
 require_once('../admUsers/index.php'); 

//header("Location: index.php");
	}
    }
    }
    ?> 