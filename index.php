<?php $thisPage="Home"; ?>
<?php include("phpinclude/header.php");?>

    <div class="portfolio">
        <p id='porttext'>Portfolio</p>
            
        <div id="myModal" class="modal">
            
            <!-- The Close Button -->
            <span class="close">&times;</span>
            
            <!-- Modal Content (The Image) -->
            <img class="modal-content" id="modalImg">
        </div>
        <?php
                $db = new Database();
                $image_array = $db->getImages();
                //print_r($image_array);
                $lastElement = end($image_array);
                if((count($image_array) % 3) == 0) {
                    $j = 0;
                    for($i = 0; $i < (count($image_array)/3); $i++) {
                        echo "\r\n<div class=\"row\">";

                        for($k = 0; $k < 3; $k++) {
                            if($image_array['' . $j] == $lastElement) {$k = 4;}
                            echo "\r\n<img src=\"" . $image_array['' . $j]['path'] . "\" class=\"pic\">";
                            $j++;
                        }
                        echo "</div>\r\n";
                    }

                }
                else {
                    $j = 0;
                    for($i = 0; $i < (intdiv(count($image_array),3)+1); $i++) {
                        echo "\r\n<div class=\"row\">";

                        for($k = 0; $k < 3; $k++) {
                            if($image_array['' . $j] == $lastElement) {$k = 4;}
                            echo "\r\n<img src=\"" . $image_array['' . $j]['path'] . "\" class=\"pic\">";
                            $j++;
                        }
                        echo "</div>\r\n";
                    }

                }
            ?>
    </div>
    <?php include("phpinclude/footer.php"); ?>
</body>

</html>