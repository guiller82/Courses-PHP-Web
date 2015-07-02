 <table width="640px"  border="0" cellspacing="0" cellpadding="0" height="80px" align="center" >
  <tr>
    <td align="center" valign="middle">

<?php 
//---------------PAGINATOR----------------------------------
    if (isset($_GET['page'])) 
	{
	$paginaquevamos = $_GET['page']; 
    }else{
	$paginaquevamos = 1;	
	}


include('pagination.class.php');
$p = new pagination;
$p->items($contadorGeneral);
$p->limit(10);
$p->currentPage($paginaquevamos);
//ESTOS IF SON EL POCHIMBOL DEL BUSCADOR INICIO

$submit = $_GET['submit'];

switch($submit)
{
case 'Categorias': 
$p->target("index.php?mes=$mesVirgen&anno=$annoVirgen&categoria=$categoriaVirgen&submit=Categorias&p=$quePais");
break;

case 'Buscar':
$p->target("matcher.php?buscador=$buscador&submit=Buscar&p=$quePais");
break;

case 'Institucion':
$p->target("matcher.php?institucion=$institucion&submit=institucion&p=$quePais");
break;

}

//ESTOS IF SON EL POCHIMBOL DEL BUSCADOR FIN
$p->show();
//--------------------------------------------------
?>

</td>
  </tr>
</table>