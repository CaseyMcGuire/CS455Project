<?php
try {
  
  $db = new PDO('sqlite:../../database/airport.sqlite3');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $new_ssn = $_GET['ssn'];
  echo "$new_ssn";
  
}
catch(PDOException $e) {
  print $e->getMessage();
}
?>