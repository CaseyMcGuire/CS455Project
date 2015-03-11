<?php
try {
  $db = new PDO('sqlite:../../database/airport.sqlite3');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->exec("delete from passengers NATURAL JOIN flight NATURAL JOIN onboard where ssn=".$_GET['ssn']."AND flight_no=".$_GET['flight_no']);
  
  echo '<table border="1">';
  echo '<tr><td>SSN</td><td>Name</td><td>Seat</td><td>Departure</td><td>Arrival</td></tr>';

  $result = $db->query('SELECT * FROM passengers NATURAL JOIN onboard NATURAL JOIN flight');

  foreach($result as $tuple)
  {
          echo "<tr><td>".$tuple['ssn']."</td>";
          echo "<td>".$tuple['f_name']." ".$tuple['l_name']."</td>";
          echo "<td>".$tuple['seat']."</td>";
          echo "<td>".$tuple['dep_loc']." ".$tuple['dep_time']."</td>";
          echo "<td>".$tuple['arr_loc']." ".$tuple['arr_time']."</td>";
          echo "<td><a href=\"delete.php?ssn=".$tuple['ssn']."&flight_no=".$tuple['flight_no']."\">Delete</a></td>";
          echo "<td>Update</td>";
          echo "</tr>";
  }

  echo "</table>";
  
  $db = NULL;
}
catch(PDOException $e){
  print $e->getMessage();
}
?>