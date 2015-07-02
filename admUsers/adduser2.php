<link href="../style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<?php include ('../supraBanner.php');?>
<?php //http://localhost/cursos/admUsers/adduser.php?mail=zuicid@gmail.com 

include ('../constantes.php');
function desabreviarPais($abrev)
  {
switch($abrev)
{
 case 'ARG': $paises='Argentina'; break;
 case 'BRA': $paises='Brasil'; break;
 case 'CHI': $paises='Chile'; break;
 case 'COL': $paises='Colombia'; break;
 case 'CRC': $paises='Costa Rica'; break;
 case 'CUB': $paises='Cuba'; break;
 case 'DOM': $paises='Republica Dominicana'; break;
 case 'ECU': $paises='Ecuador'; break;
 case 'ESA': $paises='El Salvador'; break;
 case 'GUA': $paises='Guatemala'; break;
 case 'HON': $paises='Honduras'; break;
 case 'MEX': $paises='México'; break;
 case 'NIC': $paises='Nicaragua'; break;
 case 'PAN': $paises='Panamá'; break;
 case 'PAR': $paises='Paraguay'; break;
 case 'PER': $paises='Perú'; break;
 case 'URU': $paises='Uruguay'; break;
 case 'VEN': $paises='Venezuela'; break;
 case 'ESP': $paises='España'; break;
  case 'BOL': $paises='Bolivia'; break;
 case '%': $paises='Pais'; break;
}
$desabreviarPais = $paises;
return $desabreviarPais;
}


/*    if ($_POST['email'] == '') { 
include ('NO.php');
		break; 
    } else {

} */	


?>
<table  width="100%"  align="center" border="0" height="100%">
<tr>
  <td valign="middle" >
  
  

<form action="../admUsers/registro.php" method="POST">
<table width="327" align="center">
<tr>
<td width="319" height="46" align="center" valign="middle"><a href="<?PHP echo MYURL; ?>"><img src="../images/logo.jpg" width="297" height="88" border="0" /></a></td>
</tr>
<tr>
  <td align="right"><span class="style14">Organizaci&oacute;n: </span>
  <input name="organizacion" type="text" class="Selectors" id="organizacion" value="<?php echo $_POST["organizacion"];  ?>" size="20" maxlength="25"> </td>
</tr>
<tr>
  <td align="right"><span class="style14">Departamento: </span>
    <input name="departamento" type="text" class="Selectors" id="departamento" value="<?php echo $_POST["departamento"];  ?>" size="20" maxlength="25"> </td>
</tr>

<tr>
  <td align="right">
  <span class="style14">Email:</span>
  <input name="email" type='text'  size="20" value="<?php echo $_POST["email"];  ?>" class="Selectors"></td>
</tr>


<tr>
  <td align="right"><span class="style14">Login: </span>
<input name="username" type="text" class="Selectors" value="<?php echo $_POST["username"];  ?>" size="20" maxlength="25"></td>
</tr>
<tr>
<td align="right">
<span class="style14">Password:</span> 
<input type="password" size="20" maxlength="25" name="password" class="Selectors"></td>
</tr>
<tr>
<td align="right">
<span class="style14">Repite Password:</span> 
<input type="password" size="20" maxlength="25" name="cpassword" class="Selectors"></td>
</tr>


<tr>
<td align="right"><span class="style14">Pa&iacute;s: </span> 
  <label>
 
 <select name='pais' id='pais' enabled='true' class="Selectors" >
                      <option value="<?= trim($_POST["pais"])?>"> <?= desabreviarPais($_POST["pais"])?>  </option>
                      <option value="%">País</option>
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
  <td align="right"><input name="submit" type="submit" value="Registrar" class="Selectors" /></td>
</tr>
<tr>
<td align="center">
<a href="http://www.cursosycapacitaciones.com/adm/autuser.php" class="menuArriba">Login</a></td>
</tr>
</table>
</form>


</td></tr></table>