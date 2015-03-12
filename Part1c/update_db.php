<?php
try {
  
  $db = new PDO('sqlite:../../database/airport.sqlite3');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
  $ssn = $_POST['ssn'];
  $new_l_name = $_POST['l_name'];
  $new_f_name = $_POST['f_name'];
  $new_seat = $_POST['seat'];
  $new_dep_loc = $_POST['dep_loc'];
  $new_arr_loc = $_POST['arr_loc'];
  $flight_no = $_POST['flight_no'];
    
  $db->exec("update passengers set f_name='$new_f_name', l_name='$new_l_name' where ssn='$ssn'");
  $db->exec("update onboard set seat='$new_seat' where ssn='$ssn' and flight_no=$flight_no");
  $db->exec("update flight set dep_loc='$new_dep_loc', arr_loc='$new_arr_loc' where flight_no='$flight_no'");
  $db = NULL;
  
  header("Location: myFirstDB.php");
  exit;
  
}
catch(PDOException $e) {
  print $e->getMessage();
}
?>