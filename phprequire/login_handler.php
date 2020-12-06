<?php
    session_start();
    require_once 'database.php';

    $_SESSION['err'] = array();
    $_SESSION['user_err'] = array();
    $_SESSION['pass_err'] = array();
    $_SESSION['username'] = array();
    $loginRedirect = "Location: ../login.php";

    $regex = "/[^a-z|^A-Z|^0-9|^_]/";           //Only allow these characters so checking that the input doesn't contain anything else
    $passwordRegex = "/[^a-z|^A-Z|^0-9|^_@$!%*#?&]/";

    $_SESSION['username'] = $_POST['username'];
    $ret = preg_match($regex, $_POST['username']);
    if($ret == 1) {
        $_SESSION['user_err'] = "Invalid Username";
        $_SESSION['authenticated'] = false;
        header($loginRedirect);
    }
    $ret = preg_match($passwordRegex, $_POST['password']);
    if($ret == 1) {
        $_SESSION['pass_err'] = "Invalid Password";
        $_SESSION['authenticated'] = false;
        header($loginRedirect);
    }

    $passedPass = hash('sha256', $_POST['password'] . "dfsa!#f4323@fkjg");

    $db = new Database();
    if($db->authorize($_POST['username'], $passedPass)) {
        $_SESSION['authenticated'] = true;
        header("Location: ../index_admin.php");
        exit();
    }
    else {
        $_SESSION['authenticated'] = false;
        $_SESSION['err'] = "Username or Password is incorrect";
        header($loginRedirect);
        exit();
    }
?>