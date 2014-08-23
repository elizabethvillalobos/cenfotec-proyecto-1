<?php 

    if (!empty($_POST['to']) && !empty($_POST['subject'] && !empty($_POST['message']))) {
        sendEMail($_POST['to'], $_POST['subject'], $_POST['message']);
    }
    
    function sendEMail($to, $subject, $message) {
        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $headers .= 'To: <joalcg@gmail.com>' . "\r\n";
        $headers .= 'From: Gestor Inteligente de Citas <info@ucenfotec.ac.cr>' . "\r\n";

        // Mail it
        return mail($to, $subject, $message, $headers);
    }

?>