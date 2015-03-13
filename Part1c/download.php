<?php
$name = basename($_GET['file']);
$file = "uploads/$file";

if(!$file) {
  die("File not found.");
}
else {
  readfile($file);
}

?>