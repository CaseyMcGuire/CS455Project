
<?php
include("../util/assets.php");
?>
<body>
<?php include("../util/header.php") ?>
<?php 

if(!isset($_GET["email"]) && !user_logged_in()){
  header("Location: ../");
}
elseif(!isset($_GET["email"]) && user_logged_in()){ 

?>
    <!-- <a href="../posts/new.php" class="btn btn-primary btn-large">New Post </a> -->
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

		?>

	<h2><?php echo $email; ?>'s favorited posts!</h2>
		<?php

		if(isset($_GET["page"])){
		    $page = $_GET["page"];
		}else{
		    $page = 0;
		}

		

		$query = "Select * from Post where user_email LIKE :email ORDER BY date, time DESC LIMIT 10 OFFSET " . $page*10;

		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);
		
		
		$statement->execute();

		$result = $statement->fetchAll();


		
		foreach($result as $tuple){
		    
		    echo "<div class=\"panel panel-default\">";
//		    echo $tuple['date'];
//		    echo "<br />";
//		    echo $tuple['time'];
		    echo "<div class=\"panel-heading\">";
		    echo "<h2><a href=\"/posts/show.php?id=" . $tuple['id']. "\">" . $tuple['title'] . "</a></h2>";
		    echo "</div>";

		    echo  "<div class=\"panel-body\">";
		   
		    echo "<div class=\"blog-text\">" . $tuple['content'] . "</div>";

		    echo "</div>";
		    echo "</div>";

		    echo "<br />";
		}
		
		$query = "SELECT COUNT(*) from POST where user_email LIKE :email";
		$statement = $db->prepare($query);
		$statement->bindValue(':email', $email);
		$statement->execute();
		$result = $statement->fetchAll();

		$numRows = intval($result[0][0]);


	    $db = NULL;

	    }catch(PDOException $e){
		print 'Exception : ' . $e->getMessage();
	    }
	    
	    ?>
	    
	    
	    <nav>
		<ul class="pagination pagination-lg">
		    <?php
		    if($page == 0){
			?>
			<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">Previous</span></a></li>
			<?php

			}else{
			?>
			    <li>
				<?php
				$prev_page = $page - 1;
				echo "<a href=\"show.php?page=$prev_page\" aria-label=\"Previous\">"; 
				?>
				<span aria-hidden="true">Previous</span>
				</a>
			    </li>
		    <?php
			}
		    for($i = 0; $i <= $numRows/10; $i++){
			if($i == $page){
		    ?>
			<li class="active">
			    <?php echo "<a href=\"show.php?page=$i\">" . ($i+1) . "</a>"; ?>
			</li>
		    <?php
		}else{
		    ?>
			<li>
                            <?php echo "<a href=\"show.php?page=$i\">" . ($i+1) . "</a>"; ?>
			</li>
			
			
		    <?php }} 
		    if($page == (int)($numRows/10)){


		    ?>
			<li class="disabled"><a href="#" aria-label="Next"><span aria-hidden="true">Next</span></a></li>
		    <?php
			}else{
		    ?>
			<li>
			    <?php
			    
			    $next_page = $page + 1;
			    echo "<a href=\"show.php?page=$next_page\" aria-label=\"Next\">";
			    ?>
			    <span aria-hidden="true">Next</span></a>
			    </li>
		    <?php } ?>
		</ul>
	    </nav>
	</div>
  </div>
</body>
</html>
