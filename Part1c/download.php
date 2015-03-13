<?php
$name = basename($_GET['file']);
$file = "uploads/$name";

if(!$file) {
  die("File not found.");
}
else {
  readfile($file);
}

?>