<?php
var_dump($_POST);

include('../util/header.php');
if(!user_logged_in() || !isset($_POST['content']) || !isset($_POST['post_id'])){
  header('Location: /');
  exit;
    var_dump($_POST);
}

try{
  $db = new PDO('sqlite:../database/blog.sqlite3');

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $user_email = $_SESSION['username'];
//  $title = $_POST['title'];
  $post_id = $_POST['post_id'];
  $content = $_POST['content'];
  $date = date('Y') . '-' . date('m') . '-' . date('d');
  $time = date('H') . ':' . date('i') . ':' . date('s');

  $user_query = "INSERT INTO Comment (user_email, post_id, content, date, time) values(:user_email, :post_id, :content, :date, :time)";
  $user_query = $db->prepare($user_query);


  $user_query->bindValue(':user_email', $user_email, SQLITE3_TEXT);
  //  $user_query->bindValue(':title', $title, SQLITE3_TEXT);
    $user_query->bindValue(':post_id', $post_id, SQLITE3_INTEGER);
  $user_query->bindValue(':content', $content, SQLITE3_TEXT);
  $user_query->bindValue(':date', $date, SQLITE3_TEXT);
  $user_query->bindValue(':time', $time, SQLITE3_TEXT);

  $user_query->execute();

  $db = NULL;

  $redirect = "/posts/show.php?id=" . $post_id;
  header('Location: /posts/show.php?id=' . $post_id);

}catch(PDOException $e){
  print 'Exception : ' . $e->getMessage();
 }
?>
