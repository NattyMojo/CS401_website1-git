<?php
    // require_once 'phprequire\database.php';
    session_start();
    $_SESSION['name_err'] = array();
    $_SESSION['email_err'] = array();
    $_SESSION['name'] = array();
    $_SESSION['email'] = array();
    $_SESSION['message'] = array();
    $_SESSION['success'] = false;
    $redirect = "Location: ../contact.php";
    require_once '../vendor/autoload.php';
    
    $regex = "/[^a-zA-Z '-]+/";
    $email_regex = "/.{1,}@.+\.[a-zA-Z]{3}/";
    
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['message'] = $_POST['message'];
    $ret = preg_match($regex, $_POST['name']);
    if($ret == 1) {
        $_SESSION['name_err'] = "Invalid Name";
        print_r($_SESSION['err']);
        header($redirect);
        exit();
    }
    $ret = preg_match($email_regex, $_POST['email']);
    if($ret == 0) {
        $_SESSION['email_err'] = "Invalid Email";
        print_r($_SESSION['err']);
        header($redirect);
        exit();
    }
    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom("zachary.luciano@gmail.com", "Zach Luciano");
    $email->setSubject("Photography Inquiry - " . $_POST['name']);
    $email->addTo("zachary.luciano@gmail.com", "Zach Luciano");
    $email->addContent("text/plain", "Reply To: " . $_POST['email'] . "\n\n");
    $email->addContent("text/plain", $_POST['message']);
    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
    try {
        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
        $_SESSION['success'] = true;
        header($redirect);
        exit();
    } catch (Exception $e) {
        $_SESSION['no_email'] = "Could not send request, please contact the photographer at <a href = \"mailto: zachary.luciano@gmail.com\">zachary.luciano@gmail.com</a>";
        header($redirect);
        exit();
    }

?>