<?php
try {
  
  $db = new PDO('sqlite:../../database/airport.sqlite3');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $new_ssn = $_POST['ssn'];
  $new_l_name = $_POST['l_name'];
  $new_seat = $_POST['seat'];
  $new_dep_loc = $_POST['dep_loc'];    
  $new_arr_loc = $_POST['arr_loc'];
}
catch(PDOException $e) {
  print $e->getMessage();
}
?>