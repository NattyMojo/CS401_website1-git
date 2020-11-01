<?php
    session_start();
    require_once 'database.php';

    $_SESSION['err'] = array();
    $_SESSION['username'] = array();
    $loginRedirect = "Location: ../login.php";

    $regex = "/[^a-z|^A-Z|^0-9|^_]/";           //Only allow these characters so checking that the input doesn't contain anything else
    $passwordRegex = "/[^a-z|^A-Z|^0-9|^_@$!%*#?&]/";

    $_SESSION['username'] = $_POST['username'];
    $ret = preg_match($regex, $_POST['username']);
    if($ret == 1) {
        $_SESSION['err'] = "Invalid Username";
        $_SESSION['authenticated'] = false;
        print_r($_SESSION['err']);
        print_r($_POST['username']);
        header($loginRedirect);
        exit();
    }
    $ret = preg_match($passwordRegex, $_POST['password']);
    if($ret == 1) {
        $_SESSION['err'] = "Invalid Password";
        $_SESSION['authenticated'] = false;
        print_r($_SESSION['err']);
        print_r($_POST['password']);
        header($loginRedirect);
        exit();
    }

    $db = new Database();
    if($db->authorize($_POST['username'], $_POST['password'])) {
        $_SESSION['authenticated'] = true;
        $_SESSION['err'] = array();
        $_SESSION['username'] = array();
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