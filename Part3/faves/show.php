<?php include("../util/assets.php"); ?>

<body>
    <?php include("../util/header.php"); ?>
    <?php
    if(!isset($_GET["email"]) && !user_logged_in()) {
        header("Location: ../");
    }
    ?>
    
    <div class="container">
        <div class="jumbotron">
            
            <?php
            try {
              $db = new PDO("sqlite:../database/blog.sqlite3");
              $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              
              $email = NULL;
              if(isset($_GET["email"])) {
                  $email = $_GET["email"];
              }
              else {
                  $email = $_SESSION["username"];
              }
            
            ?>
            
            <h2><?php echo $email; ?>'s saved posts:</h2>
            
            <?php
            
            $page = NULL;
            if(isset($_GET["page"])) {
                $page = $_GET["page"];
            }
            else {
                $page = 0;
            }
            
            // query to select all posts favorited by user with given email
            $query_string = "select * from faves where email=\"$email\"";
            $query = $db->prepare($query_string);
            $query->execute();
            
            // get favorited posts and store in an array
            $result = $query->fetchAll();
            
            foreach($result as $tuple) {
                $title_query = "select title from Post natural join Faves where id=\"".$tuple['id']."\"";
                $query2 = $db->prepare($title_query);
                $query2->execute();
                $title_result = $query2->fetchAll();
                
                echo "<h2><a href=\"/posts/show.php?id=".$tuple['id']."\">".$title_result."</a>";
                
            }
            
        }
            catch(PDOException $e) {
                print 'Exception: ' . $e->getMessage();
            }
            ?>
            
        </div>
    </div>