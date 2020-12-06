<?php
session_start();
if(isset($_SESSION['authenticated']) && $_SESSION['authenticated']) {
    header("Location: index_admin.php");
}
?>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/login_style.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />
    <script src="JS/jquery-3.5.1.js"></script>
    <script src="JS/loginfade.js"></script>
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
            <?php
                if(!empty($_SESSION['user_err'])) {
                    echo "<span class=\"inline_login_err\">&nbsp;&nbsp;*" . $_SESSION['user_err'] . "</span>";
                }
            ?>
            </div>
            <div class="formdiv">Password: <input type="password" name="password" required="required"/>
            <?php
                if(!empty($_SESSION['pass_err'])) {
                    echo "<span class=\"inline_login_err\">&nbsp;&nbsp;*" . $_SESSION['pass_err'] . "</span>";
                }
            ?>
            </div>
            <input type="submit" value="Login">
        </form>

    </div>

</body

</html>