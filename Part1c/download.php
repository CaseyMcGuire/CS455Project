<?php
$name = basename($_FILES['file']);
$file = "uploads/$name";

if(!$file) {
  die("File not found.");
}
else {
  header("Cache-Control: public");
  header("Content-Description: File Transfer");
  header("Content-Disposition: attachment; filename=$file");
  header("Content-Type: application/zip");
  header("Content-Transfer-Encoding: binary");
  readfile($file);
}

?>