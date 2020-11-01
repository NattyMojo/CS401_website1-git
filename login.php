<?php
session_start();
if(isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
    header("Location: index_admin.php");
}
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <title>Clay Captures Photography - Login</title>
</head>

<body>

    <div id="logindiv">

        <img id="pic_login" src="logo.png" alt="logo">
        <?php
            if(!empty($_SESSION['err'])) {
                        echo "<div id=\"login_error\"> *" . $_SESSION['err'] . "</div>";
            }
        ?>
        <form id="loginform" method="POST" action="phprequire/login_handler.php">
            <div class="formdiv">Username: <input type="text" name="username" required="required"
            <?php
                if(!empty($_SESSION['username'])){
                    echo "value=\"" . $_SESSION['username'] . "\"";
                }
            ?>
            />
            </div>
            <div class="formdiv">Password: <input type="password" name="password" required="required"/></div>
            <input type="submit" value="Login">
        </form>

    </div>

</body

</html>