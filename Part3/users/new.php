
<html>
<?php

//allow people to sign up here
include("../util/header.php");
?>
    <div class="signup-login-form">
	   
	    <form action="create.php" class="pure-form" method ="post">
		<fieldset>
		<legend>Sign Up</legend>

		<div class="form-element">
		<label for="email">Email</label>
		<input id="email"  type="email" placeholder="Email">
		</div>
	
		<div class="form-element">
		<label for="password">Password</label>
		<input id="password" type="password" placeholder="Password">
		</div>
	
		<div class="form-element">
		<label for="password-again">Enter Your Password Again</label>
		<input id="password-again" type="password" placeholder="Password">
		</div>
	
		<button type="submit" class="pure-button pure-button-primary">Create</button>
		</fieldset>
	    </form>
    </div>
    </body>
</html>
