<?php
  
try {
  
  $db = new PDO('sqlite:../../database/airport.sqlite3');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
  
}
catch(PDOException $e) {
  print $e->getMessage();
}
  
?>