<html>
<?php
include('../util/assets.php');
//var_dump($_GET);

if(!isset($_GET['id'])){
    header('Location: /');
    exit;
}
?>
<body>

    <?php include('../util/header.php'); ?>
    <div class="container">
	<div class="jumbotron">    
    <?php
    try{
	$db = new PDO('sqlite:../database/blog.sqlite3');
	
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$stmt = $db->prepare('Select * From Post where id=:id');
	$stmt->bindValue(':id', $_GET['id'], SQLITE3_INTEGER);
	$stmt->execute();

	$result = $stmt->fetch();
	

	//if this post belongs to the viewer currently viewing it, set a sentinel variable
	//so they can delete posts.
	if(user_logged_in() && strcmp($_SESSION['username'], $result['user_email']) == 0){
	    $is_user_post = true;
	}else{
	    $is_user_post = false;
	}
    ?>
	<div class="panel panel-default">
	    <div class="panel-heading">
		<h3><?php echo $result['title']; ?><small>  by <?php echo $result['user_email']; ?></small> 
		    <?php 
		    echo "<a href=\"edit.php?post_id=" . $result['id'] . "\" class=\"btn btn-info danger-button\"> Edit</a>";
		    ?>
		</h3>
        
        <h4>
    	    <?php
	    if(user_logged_in() && !$is_user_post){
		echo "<a href=\"subscribe.php?id=".$result['id']."&subscriber=".$_SESSION['username']."\">Save Post</a>";
	    }
            ?>
        </h4>
        
	    </div>
	    <div class="panel-body">
		<div class="blog-text">
            <!-- this is where an individual post's content is displayed -->
		    <?php echo $result['content']; ?>
p		</div>
	    </div>
	</div>
    <?php

    $stmt = $db->prepare('Select * from Comment where post_id=:post_id ORDER BY date,time DESC');

    $stmt->bindValue(':post_id', $_GET['id']);
    $stmt->execute();

    $result2 = $stmt->fetchAll();

    foreach($result2 as $tuple){
    ?>
	<div class="panel panel-info">
	    <div class="panel-heading">
		<?php echo $tuple['user_email']; ?>

		<?php if($is_user_post){ 
		    echo "<a href=\"../comments/destroy.php?post_id=" . $_GET['id'] . "&comment_id=" .$tuple['id'] . "\"class=\"btn btn-danger\">Delete </a>";
		 } ?>
	    </div>

	    <div class="panel-body">
		<div class="blog-text">
		<?php echo $tuple['content']; ?>
		</div>
	    </div>
	</div>
    <?php
    }
    $id = $_GET['id'];
    echo "<a href=\"../comments/new.php?post_id=$id\" class=\"btn btn-primary\">New Comment</a>";
    }catch(PDOException $e){
	print 'Exception : ' . $e->getMessage();
    }

    
    ?>

</div>
</div>
</body>

</html>
