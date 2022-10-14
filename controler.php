<?php
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
  
        // Construct Email
        $to = "savvyscheme@gmail.com";
        $subject = $_POST['name'];
        $message = $_POST['body'] . " <br> Contacts Email:" . $email;
        $message = wordwrap($message, 70) ;
        $header ="From: message@savvyscheme.dev\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1";
        
        if(!$subject == '' || !$header == '' || !$message = '') {
            // send email
            mail($to, $subject, $message, $header);

            echo '<script>showAlert("Your email has been sent", "bg-success");</script>';
            
        } else {
            echo '<script>showAlert("Your email was not sent!", "bg-danger");</script>';
        }

    }
    
}


?>