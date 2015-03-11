<!DOCTYPE html>
<html>
<body>
  <?php
  
  echo "<form action=\"update_db.php\" method=\"post\">";
  
  foreach($_GET as $query_string => $variable) {
    echo "<label class=\"heading\" for=\"$query_string\"> $query_string: </label>";
    echo "<input type=\"text\" name=\"$query_string\" value=\"".$variable."\"\>";
    echo "<br />";
    echo "<br />";
  }
      
  echo "<input type=\"submit\"\\>";
  ?>
</body>
</html>