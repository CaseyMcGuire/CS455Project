<?php
try {
  $db = new PDO('sqlite:../../database/airport.sqlite3');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $db->exec("delete from onboard where ssn='".$_GET['ssn']."'AND flight_no='".$_GET['flight_no']."'");
  
  header("Location: myFirstDB.php");
  
  $db = NULL;
  
  exit;
}
catch(PDOException $e){
  print $e->getMessage();
}
?>