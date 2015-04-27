<?php 
include('../util/header.php');

if(!user_logged_in() || !isset($_GET['comment_id']) || !isset($_GET['post_id'])){
  header('Location: /');
  exit;
    error_reporting(E_ALL);
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

    //if the current user does not own this post, redirect
    if(strcmp($result['user_email'], $_SESSION['username']) != 0){
	header("Location: /");
	exit;
    }

    //if the comment does not refer to this post, redirect
    if(strcmp($result['id'],$result2['post_id']) != 0){
	header("Location: /");
	exit;
    }
    
    $stmt = $db->prepare('Delete from Comment where id=:comment_id');
    $stmt->bindValue(':comment_id',$comment_id, SQLITE3_INTEGER);

    $stmt->execute();


    header("Location: /posts/show.php?id=" . $post_id);
    exit;

}catch(PDOException $e){
  print "Exception : " . $e->getMessage();
    header("Location: /");
    exit;
 }
?>