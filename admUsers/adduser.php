<link href="../style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<?php include ('../supraBanner.php');?>

<?php //http://localhost/cursos/admUsers/adduser.php?mail=zuicid@gmail.com 
include ('../constantes.php');

//global $mail;
//$mail = $_GET['mail'];

	//include ('../constantes.php'); 
    mysql_connect (SQLHOST, SQLUSERNAME, SQLPASSWORD);
    mysql_select_db(SQLDATABASE) or die('Cannot select database');
	@mysql_query("SET NAMES 'utf8'");

 $checkemail = mysql_query("SELECT email FROM users WHERE email='$mail'");
 $email_exist = mysql_num_rows($checkemail);
 $result = mysql_query("SELECT verificado FROM users WHERE email='$mail'");
 $info = mysql_fetch_array($result);
 
// echo $info['verificado'];
 
/* 
    if (($email_exist>0) and ($info['verificado']==0)) {
    } else {
		include ('NO.php');
		break; 
} 		*/
		
		

?>
<table  width="100%"  align="center" border="0" height="100%">
<tr>
  <td valign="middle" >
  
  

<form action="../admUsers/registro.php" method="POST">
<table width="327" align="center" cellpadding="0" cellspacing="0">
<tr>
<td width="319" height="46" align="center" valign="middle" bgcolor="#006699"><a href="<?PHP echo MYURL; ?>"><img src="../images/logo.jpg" width="297" height="88" border="0" /></a></td>
</tr>

<tr>
  <td height="10" align='right' bgcolor="#FFFFFF"></td>
</tr>


<tr>
  <td height="30" align="right" bgcolor="#FFFFFF" style="padding-right:15px"><span class="style14">Organizaci&oacute;n: </span>
  <input type="text" size="20" name="organizacion" id="organizacion" class="Selectors"> </td>
</tr>
<tr>
  <td align="right" height="30"  bgcolor="#FFFFFF" style="padding-right:15px"><span class="style14">Departamento: </span>
    <input type="text" size="20" maxlength="25" name="departamento" id="departamento" class="Selectors"> </td>
</tr>

<tr>
  <td align="right" bgcolor="#FFFFFF" style="padding-right:15px">
  <span class="style14"  height="30" >Email:</span>
  <input name="email" type='text'  size="20"  class="Selectors"></td>
</tr>
<tr>
  <td align="right" bgcolor="#FFFFFF" height="30"  style="padding-right:15px"><span class="style14">Login: </span>
<input type="text" size="20" maxlength="25" name="username" class="Selectors"></td>
</tr>
<tr>
<td align="right" height="30"  bgcolor="#FFFFFF" style="padding-right:15px">
<span class="style14">Password:</span> 
<input type="password" size="20" maxlength="25" name="password" class="Selectors"></td>
</tr>

<tr>
<td align="right" bgcolor="#FFFFFF"  height="30" style="padding-right:15px">
<span class="style14" >Repite Password:</span> 

<input type="password" size="20" maxlength="25" name="cpassword" class="Selectors"></td>
</tr>
 

<tr>
<td align="right" bgcolor="#FFFFFF" height="30"  style="padding-right:15px"><span class="style14">Pa&iacute;s: </span> 
  <label>
 
 <select name='pais' id='pais' enabled='true' class="Selectors" >
                      <option value="0">País</option>
                      <option value="ARG">Argentina</option>
                      <option value="BOL">Bolivia</option>
                      <option value="BRA">Brasil</option>
                      <option value="CHI">Chile</option>
                      <option value="COL">Colombia</option>
                      <option value="CRC">Costa Rica</option>
                      <option value="CUB">Cuba</option>
                      <option value="DOM">Republica Dominicana</option>
                      <option value="ECU">Ecuador</option>
                      <option value="ESA">El Salvador</option>
                      <option value="GUA">Guatemala</option>
                      <option value="HON">Honduras</option>
                      <option value="MEX">México</option>
                      <option value="NIC">Nicaragua</option>
                      <option value="PAN">Panamá</option>
                      <option value="PAR">Paraguay</option>
                      <option value="PER">Perú</option>
                      <option value="URU">Uruguay</option>
                      <option value="VEN">Venezuela</option>
                      
                    </select>
 
 
  </label>  </td>
</tr>
<tr>
  <td align="right" bgcolor="#FFFFFF"  height="30"  style="padding-right:15px"><input name="submit" type="submit" value="Registrar" class="Selectors" /></td>
</tr>
<tr>
<td align="center">&nbsp;</td>
</tr>
</table>
</form>


</td></tr></table>