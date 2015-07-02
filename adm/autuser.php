<link href="../style.css" rel="stylesheet" type="text/css" />


<?php include ('../supraBanner.php');?>

<?PHP include ('../constantes.php') ?>
<table  width="100%"  align="center" border="0" height="100%" cellpadding="0" cellspacing="0">
<tr>
  <td valign="middle" >

<form action='login.php' method='POST'>
<table  width="301" height="194"  align="center" cellpadding="0" cellspacing="0" >

<tr>
  
  <td width="293" height="46" align='center' bgcolor="#006699"><a href="<?PHP echo MYURL; ?>"><img src="../images/logo.jpg" width="297" height="88" border="0" /></a></td>
</tr>
<tr>
  <td height="10" align='right' bgcolor="#FFFFFF"></td>
</tr>
<tr>
  <td height="30" align='right' bgcolor="#FFFFFF" style="padding-right:15px"><span class="style14">Usuario :</span>    <input type='text' size='20' maxlength='25' name='username' class="Selectors" /></td>
  </tr>

<tr>
<td height="30" align='right' bgcolor="#FFFFFF" style="padding-right:15px"><span class="style14">Password :</span>  
  <input type='password' size='20' maxlength='25' name='password'  class="Selectors"/>
  <input type='hidden' name='start' value='0' />
  <input type='hidden' name='action' value='listado' />
  </td>
</tr>
<tr>
  <td align='right' bgcolor="#FFFFFF" style="padding-right:15px"><input type="submit" value="Ingresar" class="Selectors" /></td>
</tr>
<tr>
  <td height="4" colspan="2" align='center'></td>
</tr>
</table>

</form>

</td></tr></table>