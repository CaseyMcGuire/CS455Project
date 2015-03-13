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
  $new_flight_no = $_POST['flight_no'];
  $old_flight_no = $_POST['old_flight_no'];
  print_r($_POST);

    //update the passengers name
  $db->exec("update passengers set f_name='$new_f_name', l_name='$new_l_name' where ssn='$ssn'");

    //update the flight's departure, arrival locations, and flight number
    $db->exec("update flight set dep_loc='$new_dep_loc', arr_loc='$new_arr_loc', flight_no=$new_flight_no where flight_no=$old_flight_no");
    
    //update flight number in onboard table (this shouldn't be necessary if the table is cascading
    //properly but it doesn't seem to be).
    $db->exec("update onboard set flight_no=$new_flight_no where flight_no=$old_flight_no");

    //update the passenger's seat 
    $db->exec("update onboard set seat='$new_seat' where ssn='$ssn' and flight_no=$new_flight_no");
    $db = NULL;
    
    header("Location: index.php");
    exit;
  
}
catch(PDOException $e) {
  print $e->getMessage();
}
?>