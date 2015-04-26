<?php
try{
    $db = new PDO('sqlite:../database/blog.sqlite3');
    
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $email = $_POST['email'];
    // $password = crypt($_POST['password'], 'asdf');
    $password = $_POST['password'];

    var_dump($_POST);
    
    $stmt = $db->prepare('SELECT * FROM User where email=:email');
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);

    $stmt->execute();
    
    $result = $stmt->fetch();

    echo '<br />';
    echo 'hello';
    echo '<br />';
    var_dump($result);



    //if there is not user with that email or the password doesn't match, go back to login page
    if(!$result || strcmp($result['password'], $password) != 0){
	header('Location: new.php?error=1');	
	exit;
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
    $_SESSION['username'] = $email;

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