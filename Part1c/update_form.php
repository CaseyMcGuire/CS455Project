<!DOCTYPE html>
<html>
<body>
  <?php
  
  $ssn = $_GET['ssn'];
  $old_l_name = $_GET['l_name'];
  $old_seat = $_GET['seat'];
  $old_dep_loc = $_GET['dep_loc'];
  $old_arr_loc = $_GET['arr_loc'];
  $old_flight_no = $_GET['flight_no'];
  echo "<form action=\"update_db.php\" method=\"post\">";
  
  foreach($_GET as $query_string => $variable) {
      
      //we don't the user to be able to edit ssn but we still need it
      if($query_string =='ssn') continue;
      echo "<label class=\"heading\" for=\"$query_string\"> $query_string: </label>";
      echo "<input type=\"text\" name=\"$query_string\" value=\"".$variable."\"\>";
      echo "<br />";
      echo "<br />";
  }
  
  echo "<input type=\"hidden\" name=\"ssn\" value=\"$ssn\"/>";
  
  echo "<input type=\"hidden\" name=\"old_l_name\" value=\"$old_l_name\"/>";
  echo "<input type=\"hidden\" name=\"old_seat\" value=\"$old_seat\"/>";
  echo "<input type=\"hidden\" name=\"old_dep_loc\" value=\"$old_dep_loc\"/>";
  echo "<input type=\"hidden\" name=\"old_arr_loc\" value=\"$old_arr_loc\"/>";
  echo "<input type='hidden' name='old_flight_no' value='$old_flight_no' />";
  echo "<input type=\"submit\"\\>";
  ?>
</body>
</html>