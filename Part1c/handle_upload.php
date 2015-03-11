<?php
$upload_directory = "uploads/";
$file_to_upload = $upload_directory . basename($_FILES["filename"]["name"]);

if (move_uploaded_file($_FILES["filename"]["tmp_name"], $file_to_upload)) {
  
  $file = basename($_FILES["filename"]["name"]);
  
  echo "$file has been uploaded.";
  
  $file_size = filesize("uploads/$file");
  echo "$file is $filesize large";
  
} else {
  echo "Please try again.";
  print_r($_FILES);
}
?>