<link href="style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
 <?php	if ($_POST[samoyedo2] == 'si')  
	{
?>

<link href="../style.css" rel="stylesheet" type="text/css" />
<form action='administrator.php' name="form" method='post' onSubmit="return submitForm();">

   <input type='hidden' name='id' value="<?php echo $_POST['id']?>">
   <input type='hidden' name='action' value='update_User'>
                <table width="1000px"  align="center" border="0" cellspacing="1" cellpadding="5">
                  <tr>
                    <td colspan="3" valign="top" bgcolor="#FFFFFF"  ><p class="style2">Editar Usuario<table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td height="11" bgcolor="#006699"></td>
                        </tr>
                      </table>                     </td>
                  </tr>                  
                  <tr>
                    <td width="25%" valign="top" bgcolor="#FFFFFF" ><span class="style14">Organización</span></td>
                    <td width="38%" bgcolor="#FFFFFF" ><input name="organizacion" type="text"  class="Selectors" id="organizacion" size="40" value="<?php echo trim($row['organizacion']) ?>" /></td>
                    <td width="37%" align="center" bgcolor="#FFFFFF" ><span class="style14"> Logo de la Empresa</span></td>
                  </tr>
                  
                 	
                 
                  <tr>
                    <td width="25%" bgcolor="#FFFFFF" class="style14" >Departamento</td>
                    <td bgcolor="#FFFFFF"  ><input name="departamento" class="Selectors" type="text" id="departamento" size="40" value="<?php echo trim($row['departamento']) ?>" /></td>
                    <td rowspan="4" align="center" valign="middle" bgcolor="#FFFFFF" class="style14"  >
                   
                   <table width="100px" height="100px" border="0" cellspacing="0" cellpadding="00" style="border-bottom:solid #ccc 1px; border-left:solid #ccc 1px; border-top:solid #ccc 1px; border-right:solid #ccc 1px; padding:7px; ">
  <tr>
    <th scope="row"><?php 
	
$sql = "SELECT * FROM listing_pics WHERE listing_id = ".$row['id']."";
$photo_result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());
$pics = mysql_fetch_array($photo_result);
$photo = ($pics['pic_location'] != '') ? $pics['pic_location'] : 'gravatar.jpg';
echo "<img src='../photos/thumbs/".$photo."' border='0' style'cursor:pointer' onClick=\"javascript:popUp('photo.php?password=".'memo0021'."&id=".$row['id']."','../photo',250)\"> ";    
	
	?> 
    
    </th>
  </tr>
</table>
 

		              </td>
                  </tr>
                     <tr>
                    <td width="25%" bgcolor="#FFFFFF" class="style14" >Username</td>
                    <td bgcolor="#FFFFFF"  ><input name="username" class="Selectors" type="text" id="username" disabled="disabled" size="40" value="<?php echo trim($row['username']) ?>" /></td>
                    </tr>  
                  
                   <tr>
                    <td width="25%" valign="top" bgcolor="#FFFFFF" ><span class="style14">Password</span></td>
                    <td bgcolor="#FFFFFF" ><input name="password" class="Selectors" type="text" id="password" size="40" value="<?php echo trim($row['password']) ?>" /></td>
                  </tr>
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">Email</span></td>
                    <td bgcolor="#FFFFFF" ><input name="email" type="text"  class="Selectors" id="email" size="40" value="<?php echo trim($row['email']) ?>" /></td>
                  </tr>
                  <tr>
                    <td valign="top" bgcolor="#FFFFFF" ><span class="style14">País</span></td>
                    <td bgcolor="#FFFFFF" ><select name='pais' id='pais' enabled='true' class="Selectors" >
                      <option value="<?php echo trim($row['pais'])?>"> <?php echo desabreviarPais($row['pais'])?>  </option>
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
                      
                    </select></td>
                    <td bgcolor="#FFFFFF" class="copy" >La imagen debe de ser formato JPG y su tamaño es de 70 X 70 pixeles y menor a 300 kb.</td>
                  </tr>
                  
                  <tr>
                    <td bgcolor="#FFFFFF" >&nbsp;</td>
                    <td colspan="2" bgcolor="#FFFFFF" >&nbsp;</td>
                  </tr>
                 
				  
				                   <tr bgcolor="#006699">
                    <td colspan="3" align="center" bgcolor="#006699"  >
<input type='hidden' name='samoyedo2' value='si' />
               <input type='submit'  class="selectors"value='Actualizar Usuario'></td>
                  </tr>				  
      </table> 
              

  <?php 	} 
			  
			  	else
	
	{ 
	require_once('error.html'); 
	}
			  ?> </form>