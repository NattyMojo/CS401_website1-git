<?php $thisPage="Home"; ?>
<?php 
    include("phpinclude/header.php");
    if(isset($_SESSION['authenticated']) && !$_SESSION['authenticated'] || !isset($_SESSION['authenticated'])) {
        header("Location: login.php");
        exit();
    }
?>

    <script src="JS/jquery-3.5.1.js"></script>
    <script src="JS/imagemodal.js"></script>
    <script src="JS/imagecarousel.js"></script>

    <div class="portfolio">
            <p id='porttext'>Portfolio</p>
            <form method="POST" action="phprequire/imageupload_handler.php" enctype="multipart/form-data">
                <div>Upload an Image: <input type="file" id="img" name="img" accept="image/*"><input type="submit" value="Submit"></div>
            </form>
        <div id="myModal" class="modal">
            
            <!-- The Close Button -->
            <span class="close">&times;</span>
            
            <!-- Modal Content (The Image) -->
            <img class="modal-content" id="modalImg">
        </div>
        <div id="portfolio_parent">
        <?php
                $db = new Database();
                $image_array = $db->getThumbnails();
                $lastElement = end($image_array);
                $size = count($image_array);

                echo "<div class=\"arrow\"><img src=\"/pics/left_arrow.png\" id=\"left\"><a id=\"left\" onclick=\"plusSlides(-1)\"></a></div>\r\n";
                
                if(($size % 9) == 0) {
                    for($x = 0; $x < ($size/9); $x++) {
                        echo "\r\n<div class=\"slidediv\">";
                        $j = 0;
                        for($i = 0; $i < 3; $i++) {
                            echo "\r\n<div class=\"row\">";
                            for($k = 0; $k < 3; $k++) {
                                if($image_array['' . $j] == $lastElement) {$k = 4;}
                                echo "\r\n<img src=\"" . $image_array['' . $j]['path'] . "\" class=\"pic\">";
                                $j++;
                            }
                            echo "</div>\r\n";
                        }
                        echo "</div>\r\n";
                    }
                }
                else {
                    $j = 0;
                    for($x = 0; $x < (intdiv($size,9)+1); $x++) {
                        echo "\r\n<div class=\"slidediv\">";
                        for($i = 0; $i < 3; $i++) {
                            echo "\r\n<div class=\"row\">";
                            for($k = 0; $k < 3; $k++) {
                                if($j < $size) {
                                    if($image_array['' . $j] == $lastElement) {$k = 4;}
                                    echo "\r\n<img src=\"" . $image_array['' . $j]['path'] . "\" class=\"pic\">";
                                    $j++;
                                }
                            }
                            echo "</div>\r\n";
                        }
                        echo "</div>\r\n";
                    }
                }
                echo "<div class=\"arrow\"><img src=\"/pics/right_arrow.png\" id=\"right\"><a id=\"right\" onclick=\"plusSlides(1)\"></a></div>\r\n";
                echo "</div>\r\n";
                ?>
        </div>
    <?php include("phpinclude/footer.php"); ?>
    </div>
</body>

</html>