
<html>
<?php

//allow people to sign up here
include("../util/assets.php");
?>
<body>
<?php 
include("../util/header.php"); 

if(isset($_GET['error'])){
    $error = $_GET['error'];
    
    if(strcmp($error, '1') == 0){
	$message = "You must enter a password";
    }
    elseif(strcmp($error, '2') == 0){
	$message = "You must enter a username";
    }
    elseif(strcmp($error,'3') == 0){
	$message = "That email address is already taken";
    } 
    else{
	$message = "There was an error";
    }

    echo "<p class=\"bg-danger\">" . $message . "</h3>";
}
 ?>
    
    <div class="signup-login-form">
	   
	    <form action="create.php" class="pure-form" method ="post">
		<fieldset>
		<legend>Sign Up</legend>

		<div class="form-element">
		<label for="email">Email</label>
   <input id="email" name="email"  type="email" placeholder="Email">
		</div>
	
		<div class="form-element">
		<label for="password">Password</label>
		<input id="password" name="password" type="password" placeholder="Password">
		</div>
	
		<div class="form-element">
		<label for="password-again">Enter Your Password Again</label>
		<input id="password-again" name="password_again" type="password" placeholder="Password">
		</div>
	
		<button type="submit" class="pure-button pure-button-primary">Create</button>
		</fieldset>
	    </form>
	    <?php if(isset($_GET['password']) && $_GET['password']){ ?>
		<h3>Password didn't match.</h3>
	    <?php } ?>

    </div>
    </body>
</html>
