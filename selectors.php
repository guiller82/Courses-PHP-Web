 <?php
//reseteando variables 
 
global $mes;
global $anno;
global $categoria;

global $mesVirgen;
global $annoVirgen;
global $categoriaVirgen;
global $buscador;

$mes = $_GET['mes'];
$anno = $_GET['anno'];
$categoria = $_GET['categoria'];
$buscador = $_GET['buscador'];
//aecho $buscador;



$mesVirgen = $mes;
$annoVirgen = $anno;
$categoriaVirgen = $categoria;


$porcentaje='%'; 
$comillas="'";
if (($categoria == 'Categoría') or ($categoria == '')){ $categoria = '%';  }
if (($mes == '0') or ($mes == '')){ $mes = '%'; $mes=$comillas.$mes.$comillas; }
if (($anno == '0') or ($anno == '')){ $anno = '%'; $anno=$comillas.$anno.$comillas; }

 ?>
 
 
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    
<?php 
if ( (ExistenciaCursosEnPais($_GET['p'], 'cursos') <> '0') or ($_GET['p'] == '%') or (!isset($_GET['p'])) ) 
{ 
//echo "si hay";
//UnoHitMas($_GET['id']); 
}
else
{ 
echo "
<table width='640px'  border='0' cellspacing='0' cellpadding='0'  align='center' style='border-bottom:solid #ccc 1px; border-left:solid #ccc 1px; border-top:solid #ccc 1px; border-right:solid #ccc 1px; padding-top:13px; padding-bottom:13px; margin-top:5px'><tr><td align='center' valign='middle' class='cajitacursoTitulo'>No tenemos listado de Cursos ni Capacitaciones en ". desabreviarPais($_GET['p'])."</td></tr><tr><td align='center' valign='middle' class='copy'>Publicite los cursos de su institución haciendo click <a  href='admUsers/adduser.php'>aquí</a></td></tr></table> <br />
";
//$msg = 5; 
}


?>    
    
    


    
    
    
     <table width="640px"  border="0" cellspacing="0" cellpadding="0"  align="center" style="border-bottom:solid #ccc 1px; border-left:solid #ccc 1px; border-top:solid #ccc 1px; border-right:solid #ccc 1px; padding-top:13px; padding-bottom:13px; margin-top:5px; margin-bottom:20px">
  <tr>
    <td align="center" valign="middle">

 <form action='index.php' method='GET'> 
 
 <select name='mes' id='mes' enabled='true' class="Selectors" >
  <option value="0">Mes</option>
  <option value="1">Enero</option>
  <option value="2">Febrero</option>
  <option value="3">Marzo</option>
  <option value="4">Abril</option>
  <option value="5">Mayo</option>
  <option value="6">Junio</option>
  <option value="7">Julio</option>
  <option value="8">Agosto</option>
  <option value="9">Setiembre</option>
  <option value="10">Octubre</option>
  <option value="11">Noviembre</option>
  <option value="12">Diciembre</option>
</select>




 <select name='anno' id='anno' enabled='true' class="Selectors" >
  <option value="0">A&ntilde;o</option>
  <option value="2012">2012</option>
  <option value="2011">2011</option>
  <option value="2010">2010</option>
  <option value="2009">2009</option>
</select>
 
 <?php include ('categoriasComplete.php');?>
 <input type="hidden" name="submit" value="Categorias" />
 
 
 <select name='p' id='p' enabled='true' class="Selectors"  style="width:150px">
                      <option value="<?php echo $quePais ?>"> <?php echo desabreviarPais($quePais)?>  </option>
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
 
 


<input type='submit' value='Buscar'  width="20"  class="Selectors" />

</form>

</td>
  </tr>
</table>
  



     