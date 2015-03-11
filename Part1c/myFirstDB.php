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
        echo '<tr><td>SSN</td><td>Name</td><td>Seat</td><td>Departure</td><td>Arrival</td></tr>';

        $result = $db->query('SELECT * FROM passengers NATURAL JOIN onboard NATURAL JOIN flight');

        foreach($result as $tuple)
        {
                echo "<tr><td>".$tuple['ssn']."</td>";
                echo "<td>".$tuple['f_name']." ".$tuple['l_name']."</td>";
                echo "<td>".$tuple['seat']."</td>";
                echo "<td>".$tuple['dep_loc']." ".$tuple['dep_time']."</td>";
                echo "<td>".$tuple['arr_loc']." ".$tuple['arr_time']."</td>";
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
