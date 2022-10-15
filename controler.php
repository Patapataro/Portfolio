<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
//$mail->SMTPDebug = 0;


if(isset($_POST['submit'])) {

    // Varify - No Mail Header Injection
    $email = preg_replace("([\r\n])", "", $_POST['email']);

    $find = "/(content-type|bcc:|cc:)/i";
    if (preg_match($find, $_POST['name']) || preg_match($find, $_POST['email']) || preg_match($find, $_POST['body'])) {
        // echo "<h1>Error</h1>\n
        //     <p></p>";

        echo '<script>showAlert(" Error! No meta/header injections, please.", "bg-danger");</script>';
        exit;
    } else {

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.dreamhost.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'message@savvyscheme.dev';                     //SMTP username
            $mail->Password   = $_ENV['EMAIL_PASSWORD'];                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('message@savvyscheme.dev', 'Portfolio Message');
            $mail->addAddress('savvyscheme@gmail.com');     //Add a recipient
            //$mail->addAddress('ellen@example.com');               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            $mail->addCC('message@savvyscheme.dev');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Message From: ' . $_POST['name'];
            $mail->Body    = $_POST['body'] . " <br> Contact's Email: " . $email;
            $mail->AltBody = $_POST['body'] . " <br> Contact's Email: " . $email;

            $mail->send();
            echo '<script>showAlert("Your email has been sent", "bg-success");</script>';
        } catch (Exception $e) {

            echo '<script>showAlert("Your email was not sent! Mailer Error: {$mail->ErrorInfo}", "bg-danger");</script>';

        }

    }
}



// PHP Mail() method
//     // Construct Email
//     $to = "savvyscheme@gmail.com";
//     $subject = $_POST['name'];
//     $message = $_POST['body'] . " <br> Contacts Email:" . $email;
//     $message = wordwrap($message, 70) ;
//     $header ="From: message@savvyscheme.dev\r\n";
//     $headers .= "MIME-Version: 1.0\r\n";
//     $headers .= "Content-type: text/html; charset=iso-8859-1";

//     if(!$subject == '' || !$header == '' || !$message = '') {
//         // send email
//         mail($to, $subject, $message, $header);

//         echo '<script>showAlert("Your email has been sent", "bg-success");</script>';
    
//     } else {
//         echo '<script>showAlert("Your email was not sent!", "bg-danger");</script>';
//     }
