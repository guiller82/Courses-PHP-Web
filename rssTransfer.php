<?PHP
      // Definimos variables globales

      $rss_titulo = 'CursosyCapacitaciones.com';

      $rss_url = 'http://cursosycapacitaciones.com';

      $rss_descripcion = 'Cr2Day.com';

      $rss_email = 'info@cursosycapacitaciones.com';

      // Parametros de conexion a MySQL
	  
	  include ('constantes.php'); 


      $db_server = SQLHOST;

      $db_user = SQLUSERNAME;

      $db_pass = SQLPASSWORD;

      // Conexion a la base de datos
	  
	  $username=$_GET['username'];

      $conexion = mysql_connect($db_server,$db_user,$db_pass);
      mysql_select_db(SQLDATABASE, $conexion);

//	  $sql = "SELECT * FROM cursos LEFT JOIN  fechas ON fechas.idcurso = cursos.id WHERE fechas.fechainicio >= NOW()  AND fechas.fechainicio  <= adddate(NOW(),15)  ORDER BY fechas.fechainicio DESC  LIMIT 20";

	  $sql = "SELECT * FROM cursos LEFT JOIN  fechas ON fechas.idcurso = cursos.id WHERE cursos.usuario = '".$username."' ORDER BY fechas.fechainicio DESC";
	  
	//  echo $sql;
	  
//$sql = "SELECT * FROM cursos LEFT JOIN  fechas ON fechas.idcurso = cursos.id WHERE fechas.fechainicio BETWEEN DATE_SUB(CURRENT_DATE(), INTERVAL 30 DAY) AND CURRENT_DATE()  ORDER BY fechas.fechainicio DESC  LIMIT 20";
	  

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
 
           echo "<item>"; 

           echo "<title>".$item['tipo'].": ".$item['nombreCurso']."</title>" ;

		   echo "<link>".$rss_url."/insidecursos.php?type=cursos&amp;id=".$item['id']."</link>";

           echo "<description>".str_replace('&', '&amp;', $item['descripcion'])." - Lugar: ".$item['organizacion']." </description>";
		   
		   echo "<pubDate>".strftime("%a, %d %b %Y %T %Z",strtotime($item['fechainicio']))."</pubDate>";

           echo "</item>";

      } while ($item = mysql_fetch_assoc($result));

      

      echo "</channel>
	  </rss>";   

      ?>