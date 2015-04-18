<?php

if(strcmp($_POST['password'], $_POST['password_again']) != 0){
  header('Location:new.php?password=1');
}

try{

  $db = new PDO('sqlite:../database/blog.sqlite3');

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  var_dump($_POST);

  

  $db = NULL;

}catch(PDOException $e){
  print 'Exception : ' . $e->getMessage();

 }
?>
