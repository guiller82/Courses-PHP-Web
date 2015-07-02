<link href="style.css" rel="stylesheet" type="text/css" />
<?php
include ('../constantes.php');
$dbh = mysql_connect(SQLHOST,SQLUSERNAME,SQLPASSWORD);
mysql_select_db(SQLDATABASE);
@mysql_query("SET NAMES 'utf8'");
?>

<html>
  <head>
    <title>CursosyCapacitaciones.com</title>
    
  <body>
 
    <?php
	
	$admin_password='memo0021';
	
       if ($_REQUEST['password'] == $admin_password)
       {
            $action = $_REQUEST['action'];
       
            if ($action == 'save_photo')
            {

                if ($_FILES['image_file']['size'] > 307200)
                {
                     $error_msg .= "El archivo es muy pesado. Maximo de 300 kilobytes ";
                }

                //security error
                if (strstr($_FILES['image_file']['name'], "..")!= "")
                {
                    $error_msg .= "Violacion de Seguridad!";
                }
                
                if ($error_msg == '')
                {
                    save_photo($_POST['id']);
                }
                else
                {
                    show_upload_photo($error_msg);
                }
            }
            else
            {

                if ($action == 'delete_pic' && isset($_POST['pic_id']))
                {
                    $sql = "DELETE FROM listing_pics WHERE pic_id=".$_POST['pic_id'];
                    mysql_query($sql);



$direcciondelafoto1 = '../photos/';
$direcciondelafoto2 = '../photos/thumbs/';
$myFile = $_POST['textonombrevariable'];
$xxx1 = $direcciondelafoto1.$myFile;
$xxx2 = $direcciondelafoto2.$myFile;
///////BORRA RAIZ FOTO GRANDE//////////////////////////
$filename1 = $xxx1;
@chmod ($filename1, 0777);
if (!unlink($filename1))
  {
  echo ("Error Borrando $file");
  }
else
  {
 // echo ("Archovo eliminado $filename");
  }
///////////BORRA FOTO PEQUEÑA//////////////////////
$filename2 = $xxx2;
@chmod ($filename2, 0777);
if (!unlink($filename2))
  {
  echo ("Error Borrando $file");
  }
else
  {
//  echo ("Archovo eliminado $filename");
  }
///////////////////////////////
               
			    }
            
                show_upload_photo();
            }
        }
        else
        {
            echo 'Acceso Invalido. Ingrese al administrador nuevamente.';
        }
    ?>
  </body>
</html>

<?php

	function ExistenciaDeFoto ($id){

$consulta="select * from listing_pics where listing_id='".$id."'"; 
//echo $consulta;
$resultado=mysql_query($consulta) or die (mysql_error()); 
	if (mysql_num_rows($resultado) == 0) 
	{ 
	return '0'; 
	}
}

    function show_upload_photo ($error_msg = '')
    {
        ?>
            <?=$error_msg?>
            
            
<?php

if ( ExistenciaDeFoto($_GET['id']) <> '0' ) 
{ 
//UnoHitMas($_GET['id']); 
}
else
{ ?>  
            <form method="post" action="photo.php" enctype="multipart/form-data">
            <input type='hidden' name='action' value='save_photo'>
              <input type="hidden" name="id" value="<?=$_REQUEST['id']?>">
              <input type="hidden" name="password" value="<?=$_REQUEST['password']?>">
              <table width="92%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td><font class='font_normal'>Subir Fotos</font></td>
                </tr>
                <td>
                  <p>
                    <input type="file" name="image_file">
                  </p>
                </td>
                </tr>
                <tr>
                  <td>
                    <input type="submit" name="Submit" value="Subir Foto">
                  </td>
                </tr>
                <tr>
                  <td><font class='font_normal'>Solamente archivos JPG</font></td>
                </tr>
              </table>
            </form>
            

<?php  } ?>     
	   
       
       
        <?php
       if (isset($_REQUEST['id']))
       {
            echo "<table  align='center'><tr>";
            $sql = "SELECT * FROM listing_pics WHERE listing_id = ".$_REQUEST['id'];

            $photo_result = mysql_query($sql) or die("Query failed : " . mysql_error() . mysql_errno());

            $i = 0;
            while ($pics = mysql_fetch_array($photo_result))
            {
                echo "<form action='photo.php' method='post'>\n";
                echo "<input type=\"hidden\" name=\"password\" value=\"".$_REQUEST['password']."\">\n";
                echo "<input type=\"hidden\" name=\"pic_id\" value=\"".$pics['pic_id']."\">\n";
                echo "<input type=\"hidden\" name=\"id\" value=\"".$_REQUEST['id']."\">\n";
                echo "<td><center><img src='../photos/thumbs/".$pics['pic_location']."' height='70' width='70'><br />";


$nombredelafoto = $pics['pic_location'];
$direcciondelafoto = "../photos/thumbs/";
$direcciondelafoto2 = "../photos/";
$concatenacion = $direcciondelafoto.$nombredelafoto;
$concatenacion2 = $direcciondelafoto2.$nombredelafoto;
echo "<br>
<input name='textonombrevariable' type='hidden' value='$nombredelafoto' />";
                echo "<input type='submit' value='Delete'><input type='hidden' name='action' value='delete_pic'></center>";
                echo "</td></form>";
				
				
				
                $i++;
                if ($i % 4 == 0) { echo"</tr><tr>"; }
            }

            echo "</tr></table>";
       }
    }
    
    function save_photo ($listing_id)
    {
      if ($_FILES['image_file']['type'] == 'image/x-png')
        {
            $file_ext = '.png';
        }
        else
        {
            $file_ext = '.jpg';
        }

        $pic_id = $listing_id.'-'.time();

        move_uploaded_file($_FILES['image_file']['tmp_name'], "../photos/".$pic_id.$file_ext) or die("No se puede copiar el archivo");
        
        $src_file = "../photos/".$pic_id.$file_ext;
        $des_file = "../photos/thumbs/".$pic_id.$file_ext;
        
        $dest_image = imagecreatetruecolor(70, 70);
        
        $file_ext == '.jpg' and $temp_image = imagecreatefromjpeg($src_file);
        
        $ix = imagesx($temp_image);
        $iy = imagesy($temp_image);
        
		
        $im = imagecopyresized($dest_image, $temp_image, 0, 0, 0, 0, 70, 70, $ix, $iy);
        
        if ($im)
        {
            $file_ext == '.jpg' and imagejpeg($dest_image,$des_file);
        
            imagedestroy($temp_image);
            imagedestroy($dest_image);

            $sql = "INSERT INTO listing_pics (listing_id, pic_location) VALUES ('".$listing_id."', '".$pic_id.$file_ext."')";

            mysql_query($sql);

            echo "<h2>Imagen subida con exito</h2><br /><br />";
            echo "<input type='button' onclick=\"document.location='photo.php?password=".$_REQUEST['password']."&id=".$_REQUEST['id']."'\" value='ok'>";
        }
        else
        {
            echo '<h2>No se puede copiar el archivo</h2>';
        }
    }
    
?>
