<?php
  //print_r ($_POST);
echo "<br />";
//First, make sure the user didn't enter empty fields
$invalid_first_name = ($_POST["firstname"] == "");
$invalid_last_name = ($_POST["lastname"] == "");
$invalid_ssn = ($_POST["ssn"] == "");

if(!preg_match("#\b[0-9]{3}-[0-9]{2}-[0-9]{4}\b#", $_POST["ssn"])){
  $invalid_ssn = true;
}

//if the user *did* enter any empty fields, send them back to the form page with a friendly reminder
if($invalid_first_name || $invalid_last_name || $invalid_ssn){
  header("Location: form.php?first_name={$invalid_first_name}&last_name={$invalid_last_name}&ssn={$invalid_ssn}");
  exit;
}

try{
  
  $db = new PDO('sqlite:../../database/airport.sqlite3');
  
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->exec("insert into passengers values ('" . $_POST['firstname'] . "', NULL,'" . $_POST['lastname']. "','" . $_POST['ssn'] . "')");

  $db = NULL;
  echo "<marquee direction='right'><h1>SUCCESS</h1></marquee>";
  echo "<a href='index.php'>Home</a>";
}
catch(PDOException $e){
  print 'Exception: ' . $e->getMessage();
}
?>