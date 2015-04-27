<?php

if(!isset($_POST['password']) || empty($_POST['password'])){
  header("Location:new.php?error=1");
  exit;
}

if(!isset($_POST['email']) || empty($_POST['email'])){
  header("Location:new.php?error=2");
  exit;
}

if(strcmp($_POST['password'], $_POST['password_again']) != 0){
  header('Location:new.php?password=1');
  exit;
}



try{

  $db = new PDO('sqlite:../database/blog.sqlite3');

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  var_dump($_POST);

  $email = $_POST['email'];
  $password = crypt($_POST['password'], 'asdf');

  $user_query = 'INSERT INTO User values (:email, :password, :screen_name)';
  $user_query = $db->prepare($user_query);

  $user_query->bindValue(':email', $email, SQLITE3_TEXT);
  $user_query->bindValue(':password', $password, SQLITE3_TEXT);
  $user_query->bindValue(':screen_name', $email, SQLITE3_TEXT);

    $user_query->execute();


    header('Location:/');

    $db = NULL;
    
}catch(PDOException $e){
    print 'Exception : ' . $e->getMessage();
    header("Location:new.php?error=3");
    exit;
 }
?>
