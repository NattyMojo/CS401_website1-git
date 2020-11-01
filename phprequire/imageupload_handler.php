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
        $moved = move_uploaded_file($_FILES['img']['tmp_name'], $absolute_path);
        if(!$moved) {
            print_r(shell_exec("pwd"));
            print_r($_FILES['img']['tmp_name']);
            print_r($absolute_path);
            printf("Was unable to move image");
            exit();
            }

        $db = new Database();
        $db->saveImage($id, $relative_path);
        header("Location: ../index_admin.php");
        exit();
    }
?>