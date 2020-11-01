<?php $thisPage="Contact"; ?>
<?php include("phpinclude/header.php");?>

    <form method="POST" action="phprequire/contact_handler.php" id="contact_form">
        <?php
            if(!empty($_SESSION['success']) && !$_SESSION['success']) {
                echo "<div id=\"no_email\">*Could not send request, please contact the photographer at <a href = \"mailto: zachary.luciano@gmail.com\">zachary.luciano@gmail.com</a></div>";
            }
            else if(!empty($_SESSION['success']) && $_SESSION['success']) {
                echo "<div id=\"yes_email\">Email Sent Successfully</div>";
            }
        ?>
        <div>Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" autofocus="true" required="required" 
            <?php
                if(!empty($_SESSION['name'])){
                    echo "value=\"" . $_SESSION['name'] . "\"";
                }
            ?>
        />
            <?php
                if(!empty($_SESSION['name_err'])) {
                    echo "<span>&nbsp;&nbsp;*" . $_SESSION['name_err'] . "</span>";
                }
            ?>    
        </div>
        <div>Email:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" required="required" 
            <?php
                if(!empty($_SESSION['email'])){
                    echo "value=\"" . $_SESSION['email'] . "\"";
                }
            ?>
        />
        <?php
                if(!empty($_SESSION['email_err'])) {
                    echo "<span>&nbsp;&nbsp;*" . $_SESSION['email_err'] . "</span>";
                }
            ?> 
        </div>
        <div>Message:<textarea name="message" rows="20" cols="50" autocomplete="off" required="required"><?php
                if(!empty($_SESSION['message'])){
                    echo $_SESSION['message'];
                }
            ?></textarea></div>
        <input type="submit" value="Submit">
    </form>
    <?php include("phpinclude/footer.php"); ?>
</body>

</html>