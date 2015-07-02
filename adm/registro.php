<?    
 // Configura los datos de tu cuenta
    $dbhost='205.178.146.75';
    $dbusername='evolutionsoft';
    $dbuserpass='Evol2008';
    $dbname='web_evolution'; 
    // Conexión a la base de datos
    mysql_connect ($dbhost, $dbusername, $dbuserpass);
    mysql_select_db($dbname) or die("Cannot select database");

    // Preguntaremos si se han enviado ya las variables necesarias
    if (isset($_POST["username"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $email = $_POST["email"];
	$campos = $_POST["campos"];
	settype($campos, "integer");
    // Hay campos en blanco
    if($username==NULL|$password==NULL|$cpassword==NULL|$email==NULL) {
    echo "un campo está vacio.";
    }else{
    // ¿Coinciden las contraseñas?
    if($password!=$cpassword) {
    echo "Las contraseñas no coinciden";
    }else{
    // Comprobamos si el nombre de usuario o la cuenta de correo ya existían
    $checkuser = mysql_query("SELECT username FROM users WHERE username='$username'");
    $username_exist = mysql_num_rows($checkuser);

    $checkemail = mysql_query("SELECT email FROM users WHERE email='$email'");
    $email_exist = mysql_num_rows($checkemail);

    if ($email_exist>0|$username_exist>0) {
    echo "EL nombre de usuario o la cuenta de correo estan ya en uso";
    }else{
    //Todo parece correcto procedemos con la inserccion
    $query = "INSERT INTO users (username, password, email, campos) VALUES('$username','$password','$email', $campos)";
    mysql_query($query) or die(mysql_error());
    echo "El usuario $username ha sido registrado de manera satisfactoria.";
    }
    }
    }
    }
    ?> 
