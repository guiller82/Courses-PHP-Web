<?php 
session_start();
function resta_fechas($fecha1,$fecha2)
{ 
$exp_date = $fecha2; $todays_date = $fecha1; $today = strtotime($todays_date); $expiration_date = strtotime($exp_date); if ($expiration_date > $today || $expiration_date == $today ) { $valid = "yes"; } else { $valid = "no"; }
return ($valid);
}      



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


     function truncate($string, $max = 20, $rep = '')
{
    if (strlen($string) <= ($max + strlen($rep)))
    {
        return $string;
    }
    $leave = $max - strlen ($rep);
    return substr_replace($string, $rep, $leave);
} 


  //echo date('Y m d H:i:s', $_SESSION['time']);

?>

<html>
<head>
    <title>Cursos y Capacitaciones</title>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

     <link href="../style.css" rel="stylesheet" type="text/css" />
   
  <link href="../diggstyle_css.css" rel="stylesheet" type="text/css">  
    
    <script type='text/javascript'>
    <!--
        // credits: bugimus.com
        function showPic(imgName, imgCaption, imgWidth, imgHeight, textColor, bgColor )
        {
        	if(imgWidth<=100)imgWidth=100
        	if(imgHeight<=100)imgHeight=100
        	winHeight=imgHeight+20;
        	w = window.open('','Demo','toolbar=no,location=no,directories=no,status=no,scrollbars=no,resizable=yes,copyhistory=no,width='+imgWidth+',height='+winHeight);
        	w.document.write( "<html><head><title>"+imgCaption+"</title>" );
        	w.document.write( "<STYLE TYPE='text/css'>" );
        	w.document.write( "A {font-family: verdana; font-size: 10px; color: "+textColor+"; text-decoration : none;}" );
        	w.document.write( "A:Visited {font-family: verdana;font-size: 10px; color: "+textColor+"; }" );
        	w.document.write( "A:Active { font-family: verdana; font-size: 10px; color: "+textColor+"; }" );
        	w.document.write( "A:Hover { font-family: verdana; font-size: 10px; color: "+textColor+"; }" );
        	w.document.write( "IMG {border-color : "+textColor+";}" );
        	w.document.write( "BODY { font-family: verdana; font-size : 10px; font-weight: normal; color : "+textColor+"; background-color : "+bgColor+"; }" );
        	w.document.write( "</STYLE>" );
        	w.document.write( "<script language='JavaScript'>\n");
        	w.document.write( "IE5=NN4=NN6=false\n");
        	w.document.write( "if(document.all)IE5=true;\n");
        	w.document.write( "else if(document.getElementById)NN6=true\n");
        	w.document.write( "else if(document.layers)NN4=true\n");
        	w.document.write( "function autoSize() {\n");
        	w.document.write( "	if(IE5) self.resizeTo(document.images[0].width+10,document.images[0].height+31+20)\n");
        	w.document.write( "	else if(NN6) self.sizeToContent()\n");
        	w.document.write( "	else top.window.resizeTo(document.images[0].width,document.images[0].height+20)\n");
        	w.document.write( "	self.focus()\n");
        	w.document.write( "}\n</scr");
        	w.document.write( "ipt>\n");
        	w.document.write( "</head><body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 onLoad=" );
        	w.document.write( "'javascript:autoSize();'>" );
        	w.document.write( "<table cellpadding=0 cellspacing=0 border=0><tr><td colspan=3><img src='"+imgName+"' border=0 alt='"+imgCaption+"'></td></tr>" );
        	w.document.write( "<tr><td align='left'>&nbsp;&nbsp;<a>&copy; Casa de Autos</a></td>" );
        	w.document.write( "<td align='right'><a href='javascript:top.window.close();'>close window</a>&nbsp;&nbsp;</td></tr>" );
        	w.document.write( "</table></body></html>" );
        	w.document.close();
        }
        
    	function popUp(URL, name, width)
    	{
    		
    		popid = window.open(URL, name, 'toolbars=1, scrollbars=yes, location=0, statusbars=yes, menubars=no, resizable=yes, width='+ width +', height=400, left = 250, top = 150');
    		popid.focus();
    	}
    -->
 
     </script>
 
	 
</head>
