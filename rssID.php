<?php 
      // Definimos variables globales

      $rss_titulo = 'CursosyCapacitaciones.com';

      $rss_url = 'http://cursosycapacitaciones.com';

      $rss_descripcion = 'Cursos y Capacitaciones';

      $rss_email = 'info@cursosycapacitaciones.com';

      // Parametros de conexion a MySQL
	  
	  include ('constantes.php'); 


      $db_server = SQLHOST;

      $db_user = SQLUSERNAME;

      $db_pass = SQLPASSWORD;

      // Conexion a la base de datos

      $conexion = mysql_connect($db_server,$db_user,$db_pass);
      mysql_select_db(SQLDATABASE, $conexion);
//@mysql_query("SET NAMES 'utf8'");
	  
	  //      $sql = "SELECT * FROM cursos LEFT JOIN  fechas ON fechas.idcurso = cursos.id WHERE fechas.fechainicio >= NOW()  ORDER BY fechas.fechainicio DESC";  NOW()
//$sql = "SELECT * FROM cursos LEFT JOIN  fechas ON fechas.idcurso = cursos.id WHERE fechas.fechainicio BETWEEN CURRENT_DATE() AND DATE_ADD(CURRENT_DATE(), INTERVAL 15 DAY)  ORDER BY fechas.fechainicio DESC  LIMIT 20";	  
	 
$sql = "SELECT * FROM cursos ORDER BY cursos.id DESC";	 
	 
$result = mysql_query($sql, $conexion);

$item = mysql_fetch_assoc($result);


header('Content-Type: text/xml');//le digo al browser que es un documento xml

echo '<?xml version="1.0" encoding="iso-8859-1"?>';

echo '<rss version="2.0">';


echo "          <channel>

                <docs>http://cursosycapacitaciones.com/</docs>

                <title>".$rss_titulo."</title>

                <link>".$rss_url."</link>

                <description>".$rss_descripcion."</description>
				
                <language>es</language>

                <managingEditor>".$rss_email."</managingEditor>

                <webMaster>".$rss_email."</webMaster>";

       //str_replace('&', 'y', $item['titulo'])

      do {
 
		$descripcion = eregi_replace("[\n|\r|\n\r]", ' ', $item['descripcion'])." - Lugar: ".$item['organizacion'];

           echo "<item>

           <title>".$item['tipo'].": ".$item['nombreCurso']."</title>

		   <link>".$rss_url."/insidecursos.php?type=cursos&amp;id=".$item['id']."&amp;p=".$item['pais']."</link>   
		   
		<description>".str_replace('&', '&amp;', $descripcion)."</description>
		
	  <pubDate>".strftime("%a, %d %b %Y %T %Z",strtotime($item['fecha']))."</pubDate>

</item>";

      } while ($item = mysql_fetch_assoc($result));

      

      echo "</channel>
	  </rss>";   

      ?>