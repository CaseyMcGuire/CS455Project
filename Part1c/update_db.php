<?php
try {
  
  $db = new PDO('sqlite:../../database/airport.sqlite3');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $table = $db->query("SELECT * FROM passengers NATURAL JOIN onboard NATURAL JOIN flight");

  $old_ssn = $_POST['old_ssn'];  
  $new_ssn = $_POST['ssn'];
  $db->exec("update passengers set $table.ssn=$new_ssn where $table.ssn=$old_ssn");

  // $old_l_name = $_POST['old_l_name'];
  // $new_l_name = $_POST['l_name'];
  // $db->exec("update passengers set l_name=$new_l_name where l_name=$old_l_name");
  //
  // $old_seat = $_POST['old_seat'];
  // $new_seat = $_POST['seat'];
  // $db->exec("update onboard set seat=$new_seat where seat=$old_seat");
  //
  // $old_dep_loc = $_POST['old_dep_loc'];
  // $new_dep_loc = $_POST['dep_loc'];
  // $db->exec("update flight set dep_loc=$new_dep_loc where dep_loc=$old_dep_loc");
  //
  // $old_arr_loc = $_POST['old_arr_loc'];
  // $new_arr_loc = $_POST['arr_loc'];
  // $db->exec("update flight set arr_loc=$new_arr_loc where arr_loc=$old_arr_loc");
  
  // $db = NULL;
  
  header("Location: myFirstDB.php");
  
  
}
catch(PDOException $e) {
  print $e->getMessage();
}
?>