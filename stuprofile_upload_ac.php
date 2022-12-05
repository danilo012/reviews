<?php
        session_start();
        $target_dir = "student_profile/";
        $target_file = $target_dir . basename($_FILES["filetoupload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }
        
        // Check file size
        // if ($_FILES["filetoupload"]["size"] > 500000) {
        //     echo "Sorry, your file is too large.";
        //     $uploadOk = 0;
        // }
        
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) 
        {
            header("location:student_accountinfo.php?wrong-format=failed");
            // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        else
        {
            if (move_uploaded_file($_FILES["filetoupload"]["tmp_name"], $target_file)) 
            {
                require_once("connection.php");   
                $filepath=$target_file;
                $id=$_SESSION['studentid'];
                $query="UPDATE `student_details` SET `img` = '$filepath' WHERE `student_details`.`studentid` = $id;";
                if (mysqli_query($con,$query))
                {
                    header("location:student_accountinfo.php?upload-suc=sucess");
                }
                else
                {
                    header("location:student_accountinfo.php?upload-fail=failed");
                }
                // echo "The file ". basename( $_FILES["filetoupload"]["name"]). " has been uploaded.";
            } 
        }
?>