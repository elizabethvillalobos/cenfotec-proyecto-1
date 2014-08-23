<?php
    require_once('PHPMailer_5.2.4/class.phpmailer.php');
    
    // Retornar un json.
    header('Content-Type:application/json');

    if (!empty($_POST['query'])) {
        $queryType = $_POST['query'];

        switch ($queryType) {
            case 'sendEMail':
                sendEMail();
                break;
        }
    }

    function sendEMail() {
        if (!empty($_POST['to']) &&
            !empty($_POST['subject']) &&
            !empty($_POST['message'])) {

            $to = $_POST['to']);
            $subject = $_POST['subject']);
            $message = $_POST['message']);

            $mail = new PHPMailer();
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
                    '<main style="padding: 10px 30px;">'.$message.
                    '<p><a href="http://localhost:8888/cenfotec-proyecto-1/seguridad/iniciarSesion.php">Ir al gestor de citas</a></p>'.
                    '</main>'.
                    '<footer style="background: #333; color: #f2f2f2; font-size: 12px; padding: 10px 20px; width: 100%;">Cenfotec 2014</footer>'.
                    '</body></html>';

            $mail->IsSMTP(); // telling the class to use SMTP
            // $mail->SMTPDebug  = 2; // enables SMTP debug information (for testing)
                                      // 1 = errors and messages
                                      // 2 = messages only
            $mail->SMTPAuth   = true; // enable SMTP authentication
            $mail->SMTPSecure = "ssl"; // sets the prefix to the servier
            $mail->Host       = "smtp.gmail.com"; // sets GMAIL as the SMTP server
            $mail->Port       = 465; // set the SMTP port for the GMAIL server
            $mail->Username   = "gestorinteligentedecitas@gmail.com"; // GMAIL username
            $mail->Password   = "Cenfo2014";  // GMAIL password

            $mail->SetFrom('gestorinteligentedecitas@gmail.com', 'Gestor Inteligente de Citas');
            $mail->Subject = $subject;
            $mail->MsgHTML($body);

            $address1 = ;

            $mail->AddAddress($to);
            $mail->AddAddress("villaloboselizabeth@gmail.com");

            if(!$mail->Send()) {
                deliver_response(400, 'OK', $mail->ErrorInfo);
            } else {
                deliver_response(200, 'OK', 'El correo se envio con exito.');
            }
        }
    }

    function deliver_response($status, $statusMessage, $data) {
        header("HTTP/1.1 $status $statusMessage");
        $response['status'] = $status;
        $response['status-message'] = $statusMessage;
        $response['data'] = $data;
        echo json_encode($response);
    } 
?>
