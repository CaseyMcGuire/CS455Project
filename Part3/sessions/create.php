<?php
try{
    $db = new PDO('sqlite:../database/blog.sqlite3');
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_POST['email'];
    $password = crypt($_POST['password'], 'asdf');

    var_dump($_POST);
    
    $stmt = $db->prepare('SELECT * FROM User where email=:email');
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);

    $stmt->execute();
    
    $result = $stmt->fetch();

    echo '<br />';
    echo 'hello';
    echo '<br />';
    var_dump($result);
    if(!$result || strcmp($result['password'], $password) != 0){
	header('Location: new.php?error=1');	
    }

    echo '<br />';
    echo $password;
    echo '<br />';
    echo $result['password'];
    echo '<br />';
    
    if(strcmp($result['password'], $password) != 0){
	echo 'passwords dont match';
    }

    session_start();

    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $result['email'];

    header('Location:/');
    echo "<br />";
    echo "hello";
    var_dump($_SESSION);
    //	echo "Hashed passwords dont match
    
    //foreach($result as $tuple){
  //  echo $tuple['email'] . ' ' . $tuple['password'];
//    echo '<br />';
  //  }




} catch(PDOException $e){
    print 'Exception : ' . $e->getMessage();
}
?>