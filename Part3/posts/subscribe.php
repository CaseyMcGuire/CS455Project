
<?php

try {
    $db = new PDO("sqlite:../database/blog.sqlite3");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_GET['subscriber'];
    $id_str = $_GET['id'];
    $id = intval($id_str);
    
    print "$email";
    print "$id";

    $db->exec("INSERT INTO Faves VALUES(".$email.",".$id")");

    header("Location: /faves/show.php");
}
catch(PDOException $e) {
    print "Exception ".$e->getMessage();
}


?>
