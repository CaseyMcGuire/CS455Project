<!DOCTYPE html>
<html>
<body>
  <?php
  
  echo "<form action=\"update2.php\" method=\"post\">";
  echo "<input type=\"text\" name=\"ssn\" value=\"".$_GET['ssn']."\"\>";
  echo "<input type=\"text\" name=\"l_name\" value=\"".$_GET['l_name']."\"\>";
  echo "<input type=\"text\" name=\"seat\" value=\"".$_GET['seat']."\"\>";
  echo "<input type=\"text\" name=\"departure\" value=\"".$_GET['departure']."\"\>";
  echo "<input type=\"text\" name=\"arrival\" value=\"".$_GET['arrival']."\"\>";
  echo "<input type=\"submit\"\\>";
  ?>
</body>
</html>