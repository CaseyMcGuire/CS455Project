<?php
$upload_directory = "uploads/";
$file_to_upload = $upload_directory . basename($_FILES["filename"]["name"]);

if (move_uploaded_file($_FILES["filename"]["tmp_name"], $file_to_upload)) {
  
  $file = basename($_FILES["filename"]["name"]);
  
  echo "$file has been uploaded.\n";
  
  $file_size = filesize("uploads/$file");
  echo "$file is $file_size bytes in size.\n";
  echo "Download your file: ";
  
  if ($source = opendir($upload_directory)) {
    $to_download = readdir($source);
    echo "<a href='download.php?file=".$to_download."'>Download</a>";
  }
  
} else {
  echo "Please try again.";
  print_r($_FILES);
}
?>