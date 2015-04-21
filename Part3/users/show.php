<html>
<?php
include("../util/assets.php");
?>
<body>
<?php include("../util/header.php") ?>
<?php 
    if(!isset($_GET["email"]) && !user_logged_in()){
	header("Location: ../");
    }
 ?>
    <div class="container">
	<div class="jumbotron">
	    
	    <?php
	    
	    try{

		$db = new PDO("sqlite:../database/blog.sqlite3");
		
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
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

		$query = "Select * from Post where user_email=:email";

		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);

		$statement->execute();

		$result = $statement->fetchAll();

		foreach($result as $tuple){

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
