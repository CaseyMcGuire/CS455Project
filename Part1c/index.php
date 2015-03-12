<!DOCTYPE html>
<html>
<body>
<?php
try
{
        $db = new PDO('sqlite:../../database/airport.sqlite3');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //These need to be commented out. Otherwise, we get a constraint error.
        //      $db->exec("insert into passengers values ('David', NULL, 'Chiu', '888-88-8888');");
        //      $db->exec("insert into passengers values ('Brad', NULL, 'Richards', '999-99-9999');");

        //      $db->exec("insert into onboard values ('888-88-8888', 4, '32B');");
        //      $db->exec("insert into onboard values ('999-99-9999', 4, '32C');");

        echo '<table border="1">';
        echo '<tr><td>SSN</td><td>Flight No.</td><td>Name</td><td>Seat</td><td>Departure</td><td>Arrival</td></tr>';

        $result = $db->query('SELECT * FROM passengers NATURAL JOIN onboard NATURAL JOIN flight');

        foreach($result as $tuple)
        {
                echo "<tr><td>".$tuple['ssn']."</td>";
		echo "<td>" . $tuple['flight_no'] . "</td>";
                echo "<td>".$tuple['f_name']." ".$tuple['l_name']."</td>";
                echo "<td>".$tuple['seat']."</td>";
                echo "<td>".$tuple['dep_loc']." ".$tuple['dep_time']."</td>";
                echo "<td>".$tuple['arr_loc']." ".$tuple['arr_time']."</td>";
                echo "<td><a href=\"delete.php?ssn=".$tuple['ssn']."&flight_no=".$tuple['flight_no']."\">Delete</a></td>";
                
                echo "
                  <td>
                  <a href=\"update_form.php?ssn=" . $tuple['ssn'] . 
		  "&flight_no=" . $tuple['flight_no'] . 
		     "&f_name=" . $tuple['f_name'] .
                     "&l_name=" . $tuple['l_name'] .
                     "&seat=" . $tuple['seat'] .
                     "&dep_loc=" . $tuple['dep_loc'] .
                     "&arr_loc=" . $tuple['arr_loc'] .
                     "\">Update</a></td>
                  ";
                  
                echo "</tr>";
        }
        echo "</table>";

        $db = NULL;

}

catch(PDOException $e)
{
        print 'Exception : '.$e->getMessage();
}
?>
</body>
</html>
