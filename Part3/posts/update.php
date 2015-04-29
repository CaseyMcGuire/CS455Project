<?php
include('../util/header.php');
var_dump($_POST);
if(!user_logged_in() || !isset($_POST['post_id']) || !isset($_POST['title']) || !isset($_POST['content'])){
  header("Location: /");
  exit;
}

//make sure they didn't enter empty title or content
if(empty($_POST['title']) || empty($_POST['content'])){
  header('Location: edit.php?post_id=' . $_POST['post_id'] . '&error=1');
  exit;
}

try{

  $db = new PDO('sqlite:../database/blog.sqlite3');
  
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $post_id = $_POST['post_id'];
  $title = $_POST['title'];
  $content = $_POST['content'];

  $stmt = $db->prepare('UPDATE Post SET content=:content, title=:title where id=:post_id');
  $stmt->bindValue(':post_id', $post_id, SQLITE3_INTEGER);
  $stmt->bindValue(':content', $content, SQLITE3_TEXT);
  $stmt->bindValue('title', $title, SQLITE3_TEXT);

  $stmt->execute();

  $db = NULL;
  
  header("Location: show.php?id=" . $post_id);
  exit;

}catch(PDOException $e){
    header('Location: /');
    exit;
  print 'Exception : ' . $e->getMessage();
 }

?>