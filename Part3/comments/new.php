<html>
<?php
require("../util/assets.php");
?>

<body>
    <?php
require("../util/header.php");
//var_dump($_SESSION); 
    if(!user_logged_in() || !isset($_GET['post_id'])){
	header('Location: /');
	exit;
    }
    $post_id = $_GET['post_id'];                                              
    ?>
    <div class="container">

        <div class=jumbotron">
	    <h2> New comment</h2>
            <form action="create.php" method="post">
                
                    <textarea name="content"></textarea>
		    <?php echo "<input type=\"hidden\" name=\"post_id\" value=$post_id>" ?>
                    <input type="submit" class="btn btn-primary btn-lg btn-block">

            </form> 
        </div> 
    </div>
</body> 
</html>
