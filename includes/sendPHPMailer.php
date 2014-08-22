<?php

	//error_reporting(E_ALL);
	// error_reporting(E_STRICT);

	date_default_timezone_set('America/Toronto');

	require_once('PHPMailer_5.2.4/class.phpmailer.php');
	//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded

	$mail             = new PHPMailer();

	// $body             = file_get_contents('contents.html');
	// $body             = preg_replace('/[\]/', '', $body);
	$body = '<!doctype html><html>'.
            '<head>'.
            '<title>Gestor inteligente de citas</title>'.
            '<meta charset="utf-8"/>'.
            '</head>'.
            '<body style="font: 14px Helvetica, Arial, sans-serif;">'.
            '<header style="background: #c0392b; color: #F2F2F2; height: 80px; padding: 10px 20px; text-align: right;">'.
            '<img src="http://www.ucenfotec.ac.cr/wp-content/themes/ucenfotec-1-2/imagenes/logo-cenfotec-white-80.png" style="float: left;" />'.
            '<h1 style="color: #f2f2f2; font-size: 22px; position: relative; top: 15px;">Gestor Inteligente de Citas</h1>'.
            '</header>'.
            '<main style="padding: 10px 30px;">'.message.
            '<p><a href="http://localhost:8888/cenfotec-proyecto-1/seguridad/iniciarSesion.php">Ir al gestor de citas</a></p>'.
            '</main>'.
            '<footer style="background: #333; color: #f2f2f2; font-size: 12px; padding: 10px 20px; width: 100%;">Cenfotec 2014</footer>'.
            '</body></html>';

	$mail->IsSMTP(); // telling the class to use SMTP
	// $mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
	                                           // 1 = errors and messages
	                                           // 2 = messages only
	$mail->SMTPAuth   = true;                  // enable SMTP authentication
	$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
	$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
	$mail->Port       = 465;                   // set the SMTP port for the GMAIL server
	$mail->Username   = "gestorinteligentedecitas@gmail.com";  // GMAIL username
	$mail->Password   = "Cenfo2014";            // GMAIL password

	$mail->SetFrom('gestorinteligentedecitas@gmail.com', 'GIC');

	// $mail->AddReplyTo("name@yourdomain.com","First Last");

	$mail->Subject = "Gestor Inteligente de Citas";

	$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

	$mail->MsgHTML($body);

	$address1 = "villaloboselizabeth@gmail.com";
	$address2 = "jo_cego@hotmail.com";
	$address3 = "cotto527@gmail.com";

	$mail->AddAddress($address1, "Elizabeth Villalobos");
	$mail->AddAddress($address2, "Jose Cerdas");
	$mail->AddAddress($address3, "Miguel Coto");


	if(!$mail->Send()) {
	  echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
	  echo "Message sent!";
	}

?>
