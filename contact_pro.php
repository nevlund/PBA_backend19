<?php
if(!isset($_POST['email'])) {
    header("Location: contact.php");
    }else{
    $email_to = "kt@easv.dk";
    $subject = "Subject";

    //Error handling function, to be called if errors are found during filtering.
    function err($error) {
        echo "Error processing your form input<br /><br />";
        echo "<b>The errors are:</b><br />";
        echo $error."<br /><br />";
        die();
    }

    // function for stripping bad user input
    function badWordCleaner($string) {
        $bad = array("content-type","bcc:","to:","cc:","href");
        return str_replace($bad,"",$string);
    }

    // validation expected data exists
    if(!isset($_POST['firstName']) ||
        !isset($_POST['lastName']) ||
        !isset($_POST['email']) ||
        !isset($_POST['message'])) {
        err('no input to validate.');
    }

    //Current date and time timestamp creator.
    function currentTime(){
        date_default_timezone_set('Europe/Copenhagen');
        $date = date_create();
        $dateOutput = date_format($date, 'Y-m-d H:i:s');
        return $dateOutput;
    }

    //Filtering the inputs (serverside)
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $err_msg = "";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $err_msg .= 'The Email Address you entered does not appear to be valid.<br />';
    }

    $string_exp = "/^[A-Za-z .'-æøåÆØÅ]+$/";

    if(!preg_match($string_exp,$firstName)) {
        $err_msg .= 'The firstname you entered does not appear to be valid.<br />';
    }
    if(!preg_match($string_exp,$lastName)) {
        $err_msg .= 'The lastname you entered does not appear to be valid.<br />';
    }

    if(strlen($message) < 2) {
        $err_msg .= 'The Message you entered does not appear to be valid.<br />';
    }

    if(strlen($err_msg) > 0) {
        err($err_msg);
    }
    // setting up the messages:
    $email_message = "Form details below.\n\n";

    $email_message .= "Name: ".badWordCleaner($firstName);
    $email_message .= " ".badWordCleaner($lastName)."\n";
    $email_message .= "Email: ".badWordCleaner($email)."\n";
    $email_message .= "Message: ".badWordCleaner($message)."\n";

    $headers = 'From: '.$email."\r\n".
        'Reply-To: '.$email."\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail($email_to, $subject, $email_message, $headers);

    $email_message2 = "Email form copy, thank you for your email.\n\nCopy details below:\n\n";

    $email_message2 .= "Send from Name: ".badWordCleaner($firstName);
    $email_message2 .= " ".badWordCleaner($lastName)."\n";
    $email_message2 .= "Email: ".badWordCleaner($email)."\n";
    $email_message2 .= "Message: ".badWordCleaner($message)."\n";
    $email_message2 .= "Time: ".currentTime()."\n";

    $headers2 = 'From: '.$email_to."\r\n".
        'Reply-To: '.$email_to."\r\n" .
        'X-Mailer: PHP/' . phpversion();

    mail(badWordCleaner($email), "Email copy from web", $email_message2, $headers2);

    //<!-- your success msg -->
echo "Thank you for your message $email_message";
}