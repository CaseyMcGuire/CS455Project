<!DOCTYPE html>
<html>
    <head>
	
   
	
    </head>
    <body>
	<fieldset>
	    <legend>Passenger Info</legend>
	    <form action="form_validation.php" method="post">
		<label class="heading" for="firstname">First Name: </label>
		<input type="text" name="firstname" /> <br />
		<label class="heading" for="lastname"> Last Name: </label>
		<input type="text" name="lastname" /> <br />
		<label class="heading" for="ssn"> SSN(###-##-####): </label>
		<input type="text" name="ssn" /> <br />
		
		<input type="submit" value="Sign up" />
	</fieldset>
	    </form>
	    <?php
	    if(isset($_GET["first_name"]) && $_GET["first_name"]){
		echo "Please enter a first name. <br />";
	    }
	    if(isset($_GET["last_name"]) && $_GET["last_name"]){
                echo "Please enter a last name <br />";
	    }
	    if(isset($_GET["ssn"]) && $_GET["ssn"]){
                echo "Please enter a valid ssn.";
	    }
	    
	    
	    ?>
    </body>
</html>
