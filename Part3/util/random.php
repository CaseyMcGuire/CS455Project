<?php
try{
    $db = new PDO("sqlite:../database/blog.sqlite3");
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "Select * from User ORDER BY RANDOM() LIMIT 1";
    $statement = $db->prepare($query);
    
    $statement->execute();

    $result = $statement->fetchAll();

    $email = $result[0]['email'];
    echo $email;
    header('Location: /users/show.php?email=' . $email);
    
    $db = NULL;
    

    

}catch(PDOException $e){
    print 'Exception : ' . $e->getMessage();
}
?>