<!DOCTYPE html>
<html>
<body>
  <?php
  
  echo "<form action=\"update2.php\" method=\"post\">";
  
  echo "<label class=\"heading\" for=\"ssn\"> SSN: </label>";
  echo "<input type=\"text\" name=\"ssn\" value=\"".$_GET['ssn']."\"\>";
  
  echo "<label class=\"heading\" for=\"l_name\"> Last Name: </label>";  
  echo "<input type=\"text\" name=\"l_name\" value=\"".$_GET['l_name']."\"\>";

  echo "<label class=\"heading\" for=\"seat\"> Seat: </label>";
  echo "<input type=\"text\" name=\"seat\" value=\"".$_GET['seat']."\"\>";
  
  echo "<label class=\"heading\" for=\"dep_loc\"> Departure Location: </label>";
  echo "<input type=\"text\" name=\"dep_loc\" value=\"".$_GET['dep_loc']."\"\>";
  
  echo "<label class=\"heading\" for=\"arr_loc\"> Arrival Location: </label>";
  echo "<input type=\"text\" name=\"arr_loc\" value=\"".$_GET['arr_loc']."\"\>";
  
  echo "<input type=\"submit\"\\>";
  ?>
</body>
</html>