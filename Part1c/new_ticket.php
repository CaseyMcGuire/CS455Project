<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>

	<?php 
	try{
	    $db = new PDO('sqlite:../../database/airport.sqlite3');
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	    echo "<p>Buy a ticket</p>";
	    echo "Passenger Name";
	    $passengers = $db->query('select ssn, f_name, l_name FROM passengers');
	    
	    
	    echo "<select name='passenger-list' form='ticket-form'>";
	    foreach($passengers as $passenger){

		echo $passenger['f_name'];
		$name = $passenger['f_name'] . " " . $passenger['l_name'];

		echo "<option value='" . $passenger['ssn'] . "'>" . $name . "</option>";
	    }
	    echo "</select>";

	    $destinations = $db->query('select flight_no, arr_loc from flight');
	    
	    echo "<br />";
	    echo "Destination";
	    echo "<select name='arrival' form='ticket-form'>";
	    foreach($destinations as $destination){
		echo "<option value='" . $destination['flight_no'] . "'>" . $destination['arr_loc'] . "</option>";
	    }
	    echo "</select>";
	    
	    $db = NULL;
	}
	catch(PDOException $e){
	    print $e->getMessage();
	}
	?>
	<form action="purchase.php" id="ticket-form">
	    <input type="submit">
	</form>
    </body>
</html>