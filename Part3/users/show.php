<html>
<?php
include("../util/assets.php");
?>
<body>
<?php include("../util/header.php") ?>
<?php 
    if(!isset($_GET["email"])){
	header("Location: ../");
    }
 ?>
    <div class="container">
	<div class="jumbotron">
	    
	    <?php
	    
	    try{

		$db = new PDO("sqlite:../database/blog.sqlite3");
		
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$email = $_GET["email"];
		if(!isset($_GET["page"])){
		    $page = $_GET["page"];
		}else{
		    $page = 1;
		}

		$query = "Select * from Post where email=:email";

		$statement = $db->prepare($query);

		$statement->execute(['email' => $email]);

		foreach($result as $tuple){
		?>
		
	    <div class="blog-post"
		 <?php
		echo "hello";
		?>
	    </div>
		
	    <?php
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
