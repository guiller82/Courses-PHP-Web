<?php 
//session_start();
function show_header()
    {
        ?>
<link href="../style.css" rel="stylesheet" type="text/css" />



<table width="1000px" border="0" cellspacing="0" cellpadding="00" align="center" height="160px" bgcolor="#006699"  >
  <tr>
    <td width="313" height="100" align="right" valign="middle"><img src="../images/logo.jpg" width="297" height="88" alt="Logo" /><br />
    <br /></td>
    <td width="687"  align="center" >
    
    <table width="80%" height="100px" style="padding-top:0px; padding-bottom:5px; " border="0" cellspacing="0" cellpadding="00" bgcolor="#FFFFFF" align="center">
      <tr>
        <td width="25%" align="center" ><form action='administrator.php' method='post'>
		 <input type='hidden' name='samoyedo2' value='si' />
         	<input type='hidden' name='action' value='listado' />
         	  <input type='hidden' name='buscador' value='no' />
        <input TYPE="image" name="submit" SRC="logos/navigate_48.png" BORDER="0" value='Administrar Artículos' />  
	</form></td>
        <td width="25%" align="center">  
        <form action='administrator.php' method='post'>
	<input type='hidden' name='action' value='new_Evento' />
   	 <input type='hidden' name='samoyedo2' value='si' />
	 <input TYPE="image" name="submit" SRC="logos/paper_content_chart_48.png" BORDER="0" value='Agregar Evento' />
    </form> </td>
    
    
     <td width="25%" align="center">  
     <form action='administrator.php' method='post'>
	 <input type='hidden' name='action' value='Edit_User' />
   	 <input type='hidden' name='samoyedo2' value='si' />
	 <input TYPE="image" name="submit" SRC="logos/user.png" BORDER="0" value='Agregar Usuario' />
     </form> </td>    
    
    
        <td width="25%" align="center">
        <form action='logout.php' method='post'>
	 <input type='hidden' name='samoyedo2' value='no' />
	  <input type='hidden' name='action' value='cerrarsesion' />
      <input type="image" name="salir" value='Salir' SRC="salir.gif" BORDER="0" />
    </form>	</td>
      </tr>
      <tr>
        <td  width="25%" align="center" class="textADM">Ver listado</td>
        <td width="25%" align="center" class="textADM">Agregar Curso</td>
        <td width="25%" align="center" class="textADM">Editar Usuario</td>
        <td width="25%" align="center" class="textADM">Salir</td>
      </tr>
    </table>

    <br /></td>
  </tr>
  </table>

<?php
    }
// session_start();
?> 
