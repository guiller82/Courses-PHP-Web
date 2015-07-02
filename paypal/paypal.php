<?php
/*  PHP Paypal IPN Integration Class Demonstration File
 *  4.16.2005 - Micah Carrick, email@micahcarrick.com
 *
 *  This file demonstrates the usage of paypal.class.php, a class designed  
 *  to aid in the interfacing between your website, paypal, and the instant
 *  payment notification (IPN) interface.  This single file serves as 4 
 *  virtual pages depending on the "action" varialble passed in the URL. It's
 *  the processing page which processes form data being submitted to paypal, it
 *  is the page paypal returns a user to upon success, it's the page paypal
 *  returns a user to upon canceling an order, and finally, it's the page that
 *  handles the IPN request from Paypal.
 *
 *  I tried to comment this file, aswell as the acutall class file, as well as
 *  I possibly could.  Please email me with questions, comments, and suggestions.
 *  See the header of paypal.class.php for additional resources and information.
*/

// Setup class
require_once('../constantes.php');
require_once('paypal.class.php');  // include the class file
$p = new paypal_class;             // initiate an instance of the class
//$p->paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr';   // testing paypal url
$p->paypal_url = 'https://www.paypal.com/cgi-bin/webscr';     // paypal url 
            
// setup a variable for this script (ie: 'http://www.micahcarrick.com/paypal.php')
$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

// if there is not action variable, set the default action of 'process'
if (empty($_GET['action'])) $_GET['action'] = 'process';  

switch ($_GET['action']) {
    
   case 'process':      // Process and order...

      // There should be no output at this point.  To process the POST data,
      // the submit_paypal_post() function will output all the HTML tags which
      // contains a FORM which is submited instantaneously using the BODY onload
      // attribute.  In other words, don't echo or printf anything when you're
      // going to be calling the submit_paypal_post() function.
 
      // This is where you would have your form validation  and all that jazz.
      // You would take your POST vars and load them into the class like below,
      // only using the POST values instead of constant string expressions.
 
      // For example, after ensureing all the POST variables from your custom
      // order form are valid, you might have:
      //
      // $p->add_field('first_name', $_POST['first_name']);
      // $p->add_field('last_name', $_POST['last_name']);
	//  $p->add_field('item_name','Inscripción Anual CursosyCapacitaciones.com');
$p->add_field('item_number','0001');
$p->add_field('quantity',1); 

      
      $p->add_field('business', 'info@cursosycapacitaciones.com');
      $p->add_field('return', $this_script.'?action=success');
      $p->add_field('cancel_return', $this_script.'?action=cancel');
      $p->add_field('notify_url', $this_script.'?action=ipn');
      $p->add_field('item_name', 'Inscripción Anual CursosyCapacitaciones.com');
      $p->add_field('amount', '100');

      $p->submit_paypal_post(); // submit the fields to paypal
      //$p->dump_fields();      // for debugging, output a table of all the fields
      break;
      
   case 'success':      // Order was successful...
   
      // This is where you would probably want to thank the user for their order
      // or what have you.  The order information at this point is in POST 
      // variables.  However, you don't want to "process" the order until you
      // get validation from the IPN.  That's where you would have the code to
      // email an admin, update the database with payment status, activate a
      // membership, etc.  
 
 header("Location: ".MYURL."/index.php?msg=6");
//      echo "<html><head><title>Exito!</title></head><body><h3>Gracias por su compra...</h3>";
  //    echo "<body>Su login y password han sido enviados a: ".$p->ipn_data['payer_email']."</body></html>";
	
      // You could also simply re-direct them to another page, or your own 
      // order status page which presents the user with the status of their
      // order based on a database (which can be modified with the IPN code 
      // below).
      
      break;
      
   case 'cancel':       // Order was canceled...

      // The order was canceled before being completed.
 
 header("Location: ".MYURL."/index.php?msg=7");      
     
	 break;
      
   case 'ipn':          // Paypal is calling page for IPN validation...
   
      // It's important to remember that paypal calling this script.  There
      // is no output here.  This is where you validate the IPN data and if it's
      // valid, update your database to signify that the user has payed.  If
      // you try and use an echo or printf function here it's not going to do you
      // a bit of good.  This is on the "backend".  That is why, by default, the
      // class logs all IPN data to a text file.
      
      if ($p->validate_ipn()) {
          
         // Payment has been recieved and IPN is verified.  This is where you
         // update your database to activate or process the order, or setup
         // the database with the user's order details, email an administrator,
         // etc.  You can access a slew of information via the ipn_data() array.
  
         // Check the paypal documentation for specifics on what information
         // is available in the IPN POST variables.  Basically, all the POST vars
         // which paypal sends, which we send back for validation, are now stored
         // in the ipn_data() array.


include('../constantes.php');				  
$dbh = mysql_connect(SQLHOST, SQLUSERNAME, SQLPASSWORD);
mysql_select_db(SQLDATABASE);

$qry = "INSERT INTO paypal (payer_id, payment_date, txn_id, first_name, last_name, payer_email, payer_status, payment_type, memo, item_name, item_number, quantity, mc_gross, mc_currency, address_name, address_street, address_city, address_state, address_zip, address_country, address_status, payer_business_name, payment_status, pending_reason, reason_code, txn_type) VALUES ('$payer_id', '$payment_date', '$txn_id', '$first_name', '$last_name', '$payer_email', '$payer_status', '$payment_type', '$memo', '$item_name', '$item_number', $quantity, $mc_gross, '$mc_currency', '$address_name', '".nl2br($address_street)."', '$address_city', '$address_state', '$address_zip', '$address_country', '$address_status', '$payer_business_name', '$payment_status', '$pending_reason', '$reason_code', '$txn_type')";
mysql_query($qry) or die("Query failed : " . mysql_error() . mysql_errno());

$query = "INSERT INTO users (email, verificado, fechaFinal) VALUES('$payer_email','0', DATE_ADD(CURRENT_DATE(), INTERVAL 60 DAY))";
mysql_query($query) or die(mysql_error());

//$result = mysql_query($sql, $conexion);

foreach ($p->ipn_data as $key => $value) {  $body .= "\n$key: $value";  }		 
// For this example, we'll just email ourselves ALL the data.
$cabeceras = 'From: info@cursosycapacitaciones.com' . "\r\n" .
    'Reply-To: info@cursosycapacitaciones.com' . "\r\n" .
	'Content-type: text/html; charset=iso-8859-1' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();
$subject = 'Notificacion Instantanea de Pago Recibido - PAYPAL';
$to = 'zuicid@gmail.com';    //  your email
$body =  "An instant payment notification was successfully recieved\n";
$body .= "from ".$p->ipn_data['payer_email']." on ".date('m/d/Y');
$body .= " at ".date('g:i A')."\n\nDetails:\n";
mail($to, $subject, $body, $cabeceras);		

//mail que se le envia a la persona que pago
$subject = 'CursosyCapacitaciones.com - Crear Cuenta';
$body = "Gracias por utilizar CursosyCapacitaciones.com. \r\n  Para poder acceder a su cuenta haga click en el siguiente link: \r\n http://cursosycapacitaciones.com/admUsers/adduser.php?mail=".$p->ipn_data['payer_email']."</br>Atentamente  \r\n  Equipo de CursosyCapacitaciones.com  ";		 
mail($p->ipn_data['payer_email'], $subject, $body, $cabeceras);		
//mail($to, $subject, $body, $cabeceras);		
      }
      break;
 }     

?>