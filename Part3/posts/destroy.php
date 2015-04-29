<?php
include('../util/header.php');

if(!user_logged_in() || !isset($_GET['post_id'])){
    header('Location: /');
    exit;
}

try{
    $db = new PDO('sqlite:../database/blog.sqlite3');

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $post_id = $_GET['post_id'];
    
    $stmt = $db->prepare('SELECT * from Post where id=:post_id');
    $stmt->bindValue(':post_id', $post_id, SQLITE3_INTEGER);
    $stmt->execute();

    $result = $stmt->fetch();
   
    //if this isn't the current user's post, redirect
    if(strcmp($result['user_email'], $_SESSION['username']) != 0){
        header("Location: /");
      	exit;
    }

    $stmt = $db->prepare('Delete from Post where id=:post_id');
    $stmt->bindValue(':post_id', $post_id, SQLITE3_INTEGER);
    $stmt->execute();
    
    header("Location: ../users/show.php?email=" . $_SESSION['username']);
    

}catch(PDOException $e){
    print "Exception " . $e->getMessage();
  header("Location: /");
  exit;
}

?>