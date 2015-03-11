<?php
$upload_directory = "uploads/";
$file_to_upload = $upload_directory . basename($_POST["filename"]);
if (move_uploaded_file($_FILES["filename"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
?>