<html>
<?php
include("../util/assets.php");
?>
<body>
<?php include("../util/header.php") ?>
<?php 
 //if there is no query string and the user is not logged in, we don't know which
 //blog to show them so just redirect to home page
if(!isset($_GET["email"]) && !user_logged_in()){
  header("Location: ../");
}elseif(!isset($_GET["email"]) && user_logged_in()){ 
?>
    <a href="../posts/new.php" class="btn btn-primary btn-large">New Post </a>
<?php } ?>
  
  <div class="container">
	<div class="jumbotron">
	    
	    <?php
	    
	    try{

		$db = new PDO("sqlite:../database/blog.sqlite3");
		
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		//determine if its the current user's blog or someone else's
		if(isset($_GET["email"])){
		    $email = $_GET["email"];
		}else{
		    $email = $_SESSION["username"];
		}

		if(isset($_GET["page"])){
		    $page = $_GET["page"];
		}else{
		    $page = 1;
		}

		$query = "Select * from Post where user_email LIKE :email ORDER BY date, time DESC";

		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);
		

		$statement->execute();

		$result = $statement->fetchAll();
		
		foreach($result as $tuple){
		    echo "<div class=\"panel panel-default\">";
		    echo $tuple['date'];
		    echo "<br />";
		    echo $tuple['time'];
		    echo "<div class=\"panel-heading\">";
		    echo "<h2>" . $tuple['title'] . "</h2>";
		    echo "</div>";

		    echo  "<div class=\"panel-body\">";
		   
		    echo "<div class=\"blog-text\">" . $tuple['content'] . "</div>";

		    echo "</div>";
		    echo "</div>";

		    echo "<br />";
		}

	    $db = NULL;
	    }catch(PDOException $e){
		print 'Exception : ' . $e->getMessage();
	    }
	    
	    ?>


	</div>
    </div>
</body>
</html>