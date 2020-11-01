<?php
session_start();
require_once 'phprequire/database.php';
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <script src="jquery-3.5.1.js"></script>
    <script src="imagemodal.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <title>Clay Captures Photography</title>
</head>

<body>
<h1 id='name'>Clay Captures Photography</h1>
<a href="login.php" id="loginbtn">Login</a>
    <div id="logo">
        <img src="logo.png" alt="logo">
    </div>

    <div class="menu">
        <a <?php if ($thisPage=="Home") {echo "id=\"currentpage\"";} ?> href="index.php">Home</a>
        <a <?php if ($thisPage=="About") {echo "id=\"currentpage\"";} ?> href="aboutcat.php">About Me</a>
        <a <?php if ($thisPage=="Pricing") {echo "id=\"currentpage\"";} ?> href="pricing.php">Pricing</a>
        <a <?php if ($thisPage=="Contact") {echo "id=\"currentpage\"";} ?> href="contact.php">Contact Me</a>
    </div>
