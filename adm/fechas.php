<script type='text/javascript' src='calendar/utils/zapatec.js'></script>
<script type="text/javascript" src="calendar/src/calendar.js"></script>
<script type="text/javascript" src="calendar/lang/calendar-en.js"></script>

<style type="text/css"></style>


<link href="calendar/themes/aqua.css" rel="stylesheet" type="text/css">

<SCRIPT LANGUAGE="JScript">
function myClose() {
    close();}
</SCRIPT>

<?php 
include ('../constantes.php'); 
$dbh = mysql_connect(SQLHOST,SQLUSERNAME,SQLPASSWORD);
mysql_select_db(SQLDATABASE);

?>


   <?php
$accion = $_POST['accion'];
$fechainicio = $_POST['fechainicio'];
$fechafinal = $_POST['fechafinal'];
$idcurso = $_POST['idcurso'];
$myid = $_GET['myid'];
$username = $_GET['username'];

if ($myid == '') 
{ 
echo "Web Protected!!";
break; 
}

//echo $myid;

//borrar
$accionBorrar = $_POST['accionBorrar'];
$paraBorrar = $_POST['paraBorrar']; //si se borra o no, es el accion
$numeroaborrar = $_POST['numeroaborrar'];
//echo $accionBorrar;
//echo $paraBorrar;
//echo $numeroaborrar;

//BORRA BASURA AL INICIO/////////////////////////////////////////////////////////////////////////////////////////////////
 $sql = "DELETE FROM fechas WHERE fechainicio = '0000-00-00' OR fechafinal = '0000-00-00'";
 mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
///////////////////////////////////////////////////////////////////////////////////////////////////

//FUNCION QUE RESTA FECHAS
function resta_fechas($fecha1,$fecha2)
{ 
$exp_date = $fecha2; $todays_date = $fecha1; $today = strtotime($todays_date); $expiration_date = strtotime($exp_date); if ($expiration_date > $today || $expiration_date == $today ) { $valid = "yes"; } else { $valid = "no"; }
return ($valid);
}      

global $diferencia;
$diferencia = resta_fechas($fechainicio,$fechafinal);
//echo $diferencia;
//FUNCION QUE RESTA FECHAS

if (($accion == 'agregar') and ($fechainicio  <> '' && $fechafinal <> '') and ($diferencia == 'yes'))
        {
         $sql = "INSERT INTO fechas (fechainicio, fechafinal, idcurso, usuario, fechaverificada) VALUES ('".$_POST['fechainicio']."', '".$_POST['fechafinal']."', '".$_POST['idcurso']."', '".$username."', 1)"; 
mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
   }
   
if ($accionBorrar == 'borrar')
        {
                $sql = "DELETE FROM fechas WHERE idfecha = '".$numeroaborrar."'";
			//	echo $sql;
                mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
   }
   
            


	   
	   
	        ?>


<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
}

.tablafechas {
padding: 0;
margin: 0;
text-decoration:none;
font:Verdana, Arial, Helvetica, sans-serif;
font-size:14px;
margin-left:20px;
background-color:#fffefe;
}

.letraFechas {
	color: #000000;
	font-weight: bold;
	font-size: 14px;
	font-family:Verdana, Arial, Helvetica, sans-serif;
}

.botoneta {
border:2px double #666666;
color:#000000; 


background-color:#CCCCCC; 
height:20px;
}

-->
</style>
<div align="center"  class="letraFechas"><br />
  Administrador de Fechas<br />
  <br />
</div>
<form action="" method="post">

<table width="345" border="0" class="tablafechas" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <td width="33%" bgcolor="#FFFFFF" ><span class="style14">Fecha Inicio:</span></td>
    <td width="67%"  ><input type="text" name="fechainicio" id="fechainicio" size="23" >
        <input type="reset" value=" ... " id='button1' class="botoneta">
        <script type="text/javascript">
		var cal = new Zapatec.Calendar.setup({		
		inputField:"fechainicio",
	//	ifFormat:"%Y-%m-%d [%W] ",
		ifFormat:"%Y-%m-%d",
		button:"button1",
		showsTime:false
		});		
	</script>    <input name="fechafinal" type="hidden" id="fechafinal" value="2030-09-30" size="23" />
    <input name="accion" type="hidden" id="accion" value="agregar" />
    <input name="idcurso" type="hidden" id="idcurso" value="<?php echo $myid ?>" size="30" /></td>
  </tr>
  
  <tr>
    <td colspan="2" bgcolor="#FFFFFF" ><div align="center">
      <input type="submit" value=" Agregar Fecha " id='button2' class="botoneta" /> &nbsp;
      
     
          <input type="button" value=" Finalizar " id='fin' class="botoneta" onclick="window.close()"; />
    </div></td>
  </tr>
</table>



</form>

<table width="345" class="tablafechas" border="0"  align="center">
  <tr>
    <td width="115">Fecha Inico</td>
   
    <td width="115">Borrar</td>
  </tr>
</table>

<?php
$sql = "SELECT * FROM fechas WHERE idcurso = '$myid' "; // echo $sql;
$result = mysql_query($sql) or die("Query failed : SQL" . $sql ." ERROR: ". mysql_error() . mysql_errno());
while ($info = mysql_fetch_array($result))
{
$idfechi = $info['idfecha']; 
echo "
<form action='' method='post'>
<table width='345' border='0' class='tablafechas'  align='center' height='19' cellpadding='0' cellspacing='0'>
  <tr>
    <td width='115'>".$info['fechainicio']."</td>
  
    <td width='115'> 
	<input name='accionBorrar' type='hidden' id='accionBorrar' value='borrar' />  
	<input name='numeroaborrar' type='hidden' id='numeroaborrar' value='".$info['idfecha']."' /> 
	<input type='submit' value='Borrar' class='botoneta' id='botonborrar' name='botonborrar' /> </td>
  </tr>
</table>
</form>";

  }
  ?>
