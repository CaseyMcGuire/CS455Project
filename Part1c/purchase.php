<?php
print_r($_POST);
try{
  
  $db = new PDO('sqlite:../../database/airport.sqlite3');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $seat = rand(0, 250) . "A";
  
  $flight_query = "insert into onboard values (:ssn, :flight_no, :seat)";
  $query = $db->prepare($flight_query);
  $query->bindValue(':ssn', $_POST['passenger-list'], SQLITE3_TEXT);
  $query->bindValue(':flight_no', $_POST['arrival'], SQLITE3_INTEGER);
  $query->bindValue(':seat', $seat, SQLITE3_TEXT);

  $query->execute();
  $db = NULL;

}
catch(PDOException $e){
  print $e->getMessage();
}
?>