<?php
$upload_directory = "uploads/";
$file_to_upload = $upload_directory . basename($_FILES["filename"]["name"]);

if (move_uploaded_files($_FILES["filename"]["tmp_name"], $file_to_upload)) {
  echo "The file ".basename($_FILES["filename"]["tmp_name"])." has been uploaded.";
} else {
  echo "Please try again.";
  print_r($_FILES);
}
?>