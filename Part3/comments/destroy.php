<?php 
include('../util/header.php');

if(!user_logged_in() || !isset($_GET['comment_id']) || !isset($_GET['post_id'])){
  header('Location: /');
  exit;
}

try{

  $db = new PDO('sqlite:../database/blog.sqlite3');

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $post_id = $_GET['post_id'];
  $comment_id = $_GET['comment_id'];

  $stmt = $db->prepare('SELECT * from Post where id=:post_id');
  $stmt->bindValue(':post_id', $post_id, SQLITE3_INTEGER);

  $stmt->execute();

  $result = $stmt->fetch();

  $stmt = $db->prepare('Select * from Comment where id=:comment_id');
  $stmt->bindValue(':comment_id', $comment_id, SQLITE3_INTEGER);

  $stmt->execute();

  $result2 = $stmt->fetch();

    

}catch(PDOException $e){
  print "Exception : " . $e->getMessage();
 }
?>