<?php
//header('Content-Type: text/html; charset=utf-8');
include ('constantes.php'); 
$dbh = mysql_connect(SQLHOST, SQLUSERNAME, SQLPASSWORD);
mysql_select_db(SQLDATABASE);
  

function stripAccents($text)
	{
		$text = htmlentities($text, ENT_QUOTES, 'UTF-8');
		$text = strtolower($text);
		$patron = array (
			// Espacios, puntos y comas por guion
			'/[\., ]+/' => ' ', 
			// Vocales
			'/&agrave;/' => 'a',
			'/&egrave;/' => 'e',
			'/&igrave;/' => 'i',
			'/&ograve;/' => 'o',
			'/&ugrave;/' => 'u',
 			'/&aacute;/' => 'a',
			'/&eacute;/' => 'e',
			'/&iacute;/' => 'i',
			'/&oacute;/' => 'o',
			'/&uacute;/' => 'u',
 			'/&acirc;/' => 'a',
			'/&ecirc;/' => 'e',
			'/&icirc;/' => 'i',
			'/&ocirc;/' => 'o',
			'/&ucirc;/' => 'u',
 			'/&atilde;/' => 'a',
			'/&etilde;/' => 'e',
			'/&itilde;/' => 'i',
			'/&otilde;/' => 'o',
			'/&utilde;/' => 'u',
 			'/&auml;/' => 'a',
			'/&euml;/' => 'e',
			'/&iuml;/' => 'i',
			'/&ouml;/' => 'o',
			'/&uuml;/' => 'u',
 			'/&auml;/' => 'a',
			'/&euml;/' => 'e',
			'/&iuml;/' => 'i',
			'/&ouml;/' => 'o',
			'/&uuml;/' => 'u',
 			// Otras letras y caracteres especiales
			'/&aring;/' => 'a',
			'/&ntilde;/' => 'n',
 			// Agregar aqui mas caracteres si es necesario
		); 
		$text = preg_replace(array_keys($patron),array_values($patron),$text);
		return $text;
	}


$sql = "select * from cursos";
@mysql_query("SET NAMES 'utf8'");
$result = mysql_query($sql) or die("Query failed : SQL" . $sql ." ERROR: ". mysql_error() . mysql_errno());
//$sopaFromSQL;
                    while ($info = mysql_fetch_array($result))
                    {
					$sopaFromSQL=$sopaFromSQL.$info['categoria'].' ';
					}


//echo $sopaFromSQL;

//$sopaFromSQL = htmlentities($sopaFromSQL, ENT_QUOTES, 'UTF-8');
//$sopaFromSQL = strtolower($sopaFromSQL);
$string = stripAccents($sopaFromSQL);


//$string = preg_replace ("/,/", " ", $string);
//echo $string;

//$string = preg_replace ("/y/", " ", $string);


$excluidas = array("a", "ante", "lo", "el", "la", "a", "al", "era", "de", "con",  "en" , "un" , "del", "que");

//count words
$words_to_count = strip_tags($string);


$pattern = "/[^(\w|\d|\'|\"|\\|\/|\&|@)]+/";
$words_to_count = preg_replace ($pattern, " ", $words_to_count);
$words_to_count = trim($words_to_count);

$str = explode(" ",$words_to_count);
$str = array_unique($str);

$palabras = $str;

$total = count($palabras);
for($i=0; $i < $total ; ++$i){
  if ( in_array(trim(strtolower($palabras[$i])), $excluidas ) ){
     unset( $palabras[$i] );
  }
}

//echo implode($palabras);
//echo "<br />";

$bolsaPalabras = implode(",", $palabras);
/*
$total = count($palabras);
echo $total;
for($i=0; $i < $total ; ++$i){
  $bolsaPalabras = $bolsaPalabras.strtolower($palabras[$i]).' ';
}
*/
//echo $bolsaPalabras;


//$long=strlen($bolsaPalabras)-1;
//echo $long;
//$bolsaPalabras = substr($bolsaPalabras,0,$long);
//$bolsaPalabras = mb_strtolower( $bolsaPalabras,"UTF-8");


//echo elimina_acentos("Comunicación, Funsión, Código");


//$bolsaPalabras = utf8_decode($bolsaPalabras); // 
//$bolsaPalabras = utf8_encode($bolsaPalabras); 
//$bolsaPalabras = utf8_encode($bolsaPalabras); 

$str = explode(",", $bolsaPalabras);
$aUsers = $str; 

	
	$input = strtolower( $_GET['input'] );
	$len = strlen($input);
	$aResults = array();
//	$aResults = array();
	
	if ($len)
	{
		for ($i=0;$i<count($aUsers);$i++)
		{
			if (strtolower(substr(($aUsers[$i]),0,$len)) == $input)
				$aResults[] = array( "id"=>($i+1) ,"value"=>($aUsers[$i]), "info"=>($aInfo[$i]) );
		}
	}
	
	
	
	if (isset($_REQUEST['json']))
	{
		header("Content-Type: application/json");
	//	header ('Content-type: text/html; charset=utf-8');

//	header('Content-Type: text/html; charset=UTF-8'); 
		echo "{\"results\": [";
		$arr = array();
		for ($i=0;$i<count($aResults);$i++)
		{
			$arr[] = "{\"id\": \"".$aResults[$i]['id']."\", \"value\": \"".$aResults[$i]['value']."\", \"info\": \"\"}";
		}
		echo implode(", ", $arr);
		echo "]}";
	}

?>