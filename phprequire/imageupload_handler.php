<?php

require_once 'database.php';

    if(!empty($_FILES)) {
        print_r($_FILES);
        $id = uniqid();
        $extension = "";
        if($_FILES['img']['type'] == "image/png") {
            $extension = ".png";
        }
        else if($_FILES['img']['type'] == "image/jpeg") {
            $extension = ".jpg";
        }
        else if($_FILES['img']['type'] == "image/tiff") {
            $extension = ".tiff";
        }
        $relative_path = "/pics/" .  $id . $extension;
        $absolute_path =  "/app" . $relative_path;
        $relative_path_thumb = "/pics/" .  $id . "_t" . $extension;
        $absolute_path_thumb =  "/app" . $relative_path_thumb;
        $moved = move_uploaded_file($_FILES['img']['tmp_name'], $absolute_path);
            if(!$moved) {
                printf("Was unable to move image");
                exit();
            }
        if(!copy((".." . $relative_path), (".." . $relative_path_thumb))){echo "Couldn't Copy";}
        $image = new SimpleImage();
        $image->load($absolute_path_thumb);
        $image->resize(377,252);
        $image->save($absolute_path_thumb, IMAGETYPE_JPEG, 75, 777);
        echo "<img src=" . $absolute_path_thumb . ">";


        $db = new Database();
        $db->saveImage($id, $relative_path);
        $db->saveImage($id . "_t", $relative_path_thumb);
        header("Location: ../index_admin.php");
        exit();
    }
?>