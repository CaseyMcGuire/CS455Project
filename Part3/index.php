<html>
<?php
include("util/header.php");
   
?>
     <div class="container">
     	<div class="jumbotron">
	   
	    <h1>Welcome to our blogging website.</h1>
	    <div class="buttons">
		<?php if(false){ ?>
		    check if user is signed in 
		<?php }else{ ?>
		    <a href="users/new.php" class="btn btn-primary btn-lg">Sign Up</a>
		    <a href="sessions/new.php" class="btn btn-success btn-lg">Login</a>
		<?php } ?>

	    </div>
	</div>
     </div>

    </body>
</html>
