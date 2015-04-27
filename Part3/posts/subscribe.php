
<?php

try {
    $db = new PDO("sqlite:../database/blog.sqlite3");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_GET['subscriber'];
    $id_str = $_GET['id'];
    $id = intval($id_str);
    
    $dump = var_dump($id);
    
    echo $dump;
    echo "\n";
    
    $query = $db->prepare("INSERT INTO Faves VALUES(".$email.",".$id.")");
    
    $query->execute();
    
    $db = NULL;
    
    header("Location: /faves/show.php");
}
catch(PDOException $e) {
    echo "Exception ".$e->getMessage();
}


?>
