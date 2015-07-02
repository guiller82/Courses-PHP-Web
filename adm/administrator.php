<?php
session_start();
include ('../constantes.php'); 

	
	//echo $_SESSION['s_username'];

if (isset($_SESSION['s_username'])) {
    mysql_connect (SQLHOST, SQLUSERNAME, SQLPASSWORD);
    mysql_select_db(SQLDATABASE) or die('Cannot select database');
	@mysql_query("SET NAMES 'utf8'");
} 
			  

	global $organizacion;
	global $departamento;
	global $email;
    global $pais;
	global $namexxx;
	global $proximonumero;
	$namexxx = $_SESSION['s_username'];	


$sql1 = "select * from users where username = '".$namexxx."'";  
mysql_query($sql1) or die("Query failed : " . mysql_error() . mysql_errno());
$result = mysql_query($sql1) or die("Query failed : " . mysql_error() . mysql_errno());
$row = mysql_fetch_array($result);
	
$organizacion = $row['organizacion'];
$departamento = $row['departamento'];
$email = $row['email'];
$pais = $row['pais'];

	
// VARIABLE PARA USUARIOS 
global $usuarius; global $usuarius3; // esta variable es la que hace que usuarios van a salir en la lista
if ($namexxx == 'radarti') 
{
	$usuarius = '';
	} 
	else {
		$usuarius = "WHERE usuario = '".$namexxx."'"; 
		$usuarius2 = "and usuario = '".$namexxx."'";
		$usuarius3 = $namexxx;
		
		}
		

//	if ($_GET[mimi] == 'ix' or $samoyedo == 1 or $_POST[samoyedo2] == 'si')  
	//{
   // include ('config.php');
   // include ('common.php');
//	}	
//	else
	//	{ 
	//require_once('error.html'); 
	//break;
	//}
 
	include ('header.php');
	include ('listadoMaster.php'); // este php tiene el encabezado de la vara
	show_header();



//echo $diferencia;
//echo $action;


$action = $_POST['action'];


//////////////////////////////////////////////////////////////////////////////////
if (($action == 'listado') or isset($_GET['page']) )
        {
		include ('listaTodo.php');
	    }	

/////////////////////////////////////////////////////////////////////////////////
if ($action == 'Edit_User')
        {
$sql = "SELECT * FROM users WHERE email = '".$email."'";
$result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
$row = mysql_fetch_array($result);
include ('EditarUser.php');
		}	
/////////////////////////////////////////////////////////////////////////////////		
		
		
/////////////////////////////////////////////////////////////////////////////////
if ($action == 'update_User' && isset($_POST['id']))
        {
$sql = "UPDATE users SET organizacion='".trim($_POST['organizacion'])."', departamento='".trim($_POST['departamento'])."', password='".trim($_POST['password'])."', email='".trim($_POST['email'])."',pais='".trim($_POST['pais'])."' WHERE username = '".$namexxx."'";
mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());

$sql = "UPDATE cursos SET organizacion='".trim($_POST['organizacion'])."'  WHERE usuario = '".$namexxx."'";
mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());



echo "<div align='center'>  <br />  <span class='style14'>El Usuario fue actualizado exitosamente.</span></div> ";

$sql = "SELECT * FROM users WHERE email = '".$email."'";
$result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
$row = mysql_fetch_array($result);
include ('EditarUser.php');
        }
		
/////////////////////////////////////////////////////////////////////////////////		
		
if ($action == 'new_Evento')
        {
			include ('AgregarEventoHTML.php');
        }
/////////////////////////////////////////////////////////////////////////////////

if ($action == 'add_Evento')
        { 
$sql = "INSERT INTO cursos (nombreCurso, pais, descripcion, categoria, horario, ubicacion, objetivos, contenido, metodologia, requisitos, audiencia, duracion, inversion, detalles, contacto, fechainicio, fechafinal, organizacion, incluye, formasdepago, mayorinformacion, impartidopor, linkconfirmacion, tipo, modalidad, usuario) VALUES ('".$_POST['nombreCurso']."', '".$pais."', '".$_POST['descripcion']."','".$_POST['categoria']."', '".$_POST['horario']."', '".$_POST['ubicacion']."', '".$_POST['objetivos']."', '".$_POST['contenido']."', '".$_POST['metodologia']."', '".$_POST['requisitos']."', '".$_POST['audiencia']."', '".$_POST['duracion']."', '".$_POST['inversion']."', '".$_POST['detalles']."', '".$_POST['contacto']."', '".$_POST['fechainicio']."', '".$_POST['fechafinal']."', '".$_POST['organizacion']."', '".$_POST['incluye']."', '".$_POST['formasdepago']."', '".$_POST['mayorinformacion']."', '".$_POST['impartidopor']."', '".$_POST['linkconfirmacion']."', '".$_POST['tipo']."', '".$_POST['modalidad']."', '".$namexxx."')"; 
mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
///////// MENSAJE DE CURSO AGREGADO...
$sql1 = "select * from cursos  where usuario = '".$namexxx."' ORDER BY  id DESC limit 1";  
mysql_query($sql1) or die("Query failed : " . mysql_error() . mysql_errno());
$result = mysql_query($sql1) or die("Query failed : " . mysql_error() . mysql_errno());
$row = mysql_fetch_array($result);
echo " <br /><table width='1000px'  align='center' border='0' cellspacing='1' cellpadding='5' style='border:solid; border-color:#CCC; border-width:1px'><tr ><td width='83%' height='45' align='left' bgcolor='#FFFFFF' class='style14'   >El curso a sido agregado con &eacute;xito, para que se despliegue en el listado debe de agregarle la fecha de inicio al curso o capacitaci&oacute;n anteriormente agregado, haciendo click en la im&aacute;gen del calendario a la derecha.</td><td width='17%' align='center' valign='middle' bgcolor='#FFFFFF' style='padding-top:10px'   ><form action='administrator.php' method='post'>		 				  
<input type='image' name='submit' SRC='horario.jpg' BORDER='0' value='Editar Fechas' />  							
<input type='hidden' name='action' value='edit_fechas'>
<input type='hidden' name='samoyedo2' value='si' />
<input type='hidden' name='idcurso' value='".$row['id']."'>                              
</form></td></tr></table>   ";
///////
include ('listaTodo.php');

        }
		
/////////////////////////////////////////////////////////////////////////////////

if ($action == 'edit_Evento' && isset($_POST['id']))
        {
        $sql = "SELECT * FROM cursos WHERE id = ".$_POST['id'];
        $result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
        $row = mysql_fetch_array($result);
 		include ('EditarEvento.php');
		}
		
		
/////////////////////////////////////////////////////////////////////////////////

if ($action == 'save_Evento' && isset($_POST['id']))
        {
 $sql = "UPDATE cursos SET nombreCurso='".trim($_POST['nombreCurso'])."', descripcion='".trim($_POST['descripcion'])."', categoria='".trim($_POST['categoria'])."', ubicacion='".trim($_POST['ubicacion'])."',horario='".trim($_POST['horario'])."', objetivos='".trim($_POST['objetivos'])."', contenido='".trim($_POST['contenido'])."', metodologia='".trim($_POST['metodologia'])."', requisitos='".trim($_POST['requisitos'])."', audiencia='".trim($_POST['audiencia'])."', duracion='".trim($_POST['duracion'])."', inversion='".trim($_POST['inversion'])."', detalles='".trim($_POST['detalles'])."', contacto='".trim($_POST['contacto'])."', fechainicio='".trim($_POST['fechainicio'])."', fechafinal='".trim($_POST['fechafinal'])."', organizacion='".trim($_POST['organizacion'])."', incluye='".trim($_POST['incluye'])."', formasdepago='".trim($_POST['formasdepago'])."', mayorinformacion='".trim($_POST['mayorinformacion'])."', impartidopor='".trim($_POST['impartidopor'])."', linkconfirmacion='".trim($_POST['linkconfirmacion'])."', tipo='".trim($_POST['tipo'])."', modalidad='".trim($_POST['modalidad'])."', usuario = '".$namexxx."'  WHERE id = ".$_POST['id'];
mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());


echo "<div align='center'>  <br />  <span class='style14'>El Curso fue actualizado exitosamente.</span></div> ";
	include ('listaTodo.php');


        }
	
/////////////////////////////////////////////////////////////////////////////////
if ($action == 'delete_listing' && isset($_POST['id']))
        {		
                $sql = "DELETE FROM cursos WHERE id = '".$_POST['id']."'";
                mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
				
				
                $sql = "DELETE FROM fechas WHERE idcurso = '".$_POST['id']."'";
                mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());				
				include ('listaTodo.php');
          }
		  
/////////////////////////////////////////////////////////////////////////////////
if ($action == 'edit_fechas')
        {
//$sql = "SELECT * FROM users WHERE email = '".$email."'";
//$result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
//$row = mysql_fetch_array($result);
include ('editFechas.php');
		}	

//echo $_POST['fechainicio'];


//echo $action;
														
/////////////////////////////////////////////////////////////////////////////////
$diferencia = resta_fechas($_POST['fechainicio'],$_POST['fechafinal']);
if ( ($action == 'agregarFecha') and ($diferencia=='yes') )
        {
//echo $diferencia;
$sql = "INSERT INTO fechas (fechainicio, fechafinal, idcurso, usuario, fechaverificada, duracion, horario) VALUES ('".$_POST['fechainicio']."', '".$_POST['fechafinal']."', '".$_POST['idcurso']."', '".$namexxx."', 1,  '".$_POST['duracion']."',  '".$_POST['horario']."')"; 
//echo $sql;
mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());

include ('editFechas.php');
}
////////////////////////////////////////////////////////////////////////////////////////////////

if ($action == 'borrarFecha')
        {
                $sql = "DELETE FROM fechas WHERE idfecha = '".$_POST['numeroaborrar']."'";
	             mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
 				include ('editFechas.php');
 }



/*
if ($action == 'cerrarsesion')
        {		
//session_unregister("session");
session_unset();
session_destroy();
 header("Location: autuser.php"); 
}
*/
//Logout() 


//////////////////////////////////////////////////

	
?>	