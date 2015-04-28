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
            $query_string = "select * from faves natural join post where email=\"$email\"";
            $query = $db->prepare($query_string);
            $query->execute();
            
            // get favorited posts and store in an array
            $result = $query->fetchAll();
            
            foreach($result as $tuple) {
                
                echo "<h3><a href=\"/posts/show.php?id=".$tuple['id']."\">".$tuple['title']."</a></h3>";
                
            }
            
            $pg_query = "SELECT COUNT(*) from Faves where email=\"$email\"";
            $pg_stmnt = $db->prepare($pg_query);
            $pg_stmnt->execute();
            $pg_result = $pg_stmnt->fetchAll();
            
            $num_rows = intval($pg_result[0][0]);
            
            $db = NULL;
            
            }
            
           
            catch(PDOException $e) {
                print 'Exception: ' . $e->getMessage();
            }
            
            ?>
            
            <nav>
                <ul class="pagination pagination-lg">
                    <?php
                    if($page == 0) {
                    ?>
                    <li class="disabled"><a href="#" aria-label="Previous">
                        <span aria-hidden="true">Previous</span>
                    </li>
                    <?php
                    }
                    else {
                    ?>
                    <li>
                        <?php
                        $prev_page = $page - 1;
                        echo "<a href=\"show.php?page=$prev_page\" aria-label=\"Previous\">";
                        ?>
                        <span aria-hidden="true">Previous</span>
                        </a>
                    </li>
                    <?php
                    }
                    for($i = 0; $i <= $num_rows/10; $i++) {
                        if($i == $page) {
                    ?>
                    <li class="active">
                        <?php
                        echo "<a href=\"show.php?page=$i\">" . ($i + 1) . "</a>";
                        ?>
                    </li>
                    <?php
                    }
                    else {
                    ?>
                    <li>
                        <?php
                        echo "<a href=\"show.php?page=$i\">" . ($i + 1) . "</a>";
                        ?>
                    </li>
                    <?php
                        }
                    }
                    if($page == (int)($num_rows / 10)) {
                    ?>
                    <li class="disabled">
                        <a href="#" aria-label"Next">
                            <span aria-hidden="true">Next</span>
                        </a>
                    </li>
                    <?php
                    }
                    else {
                    ?>
                    <li>
                        <?php
                        $next_page = $page + 1;
                        echo "<a href=\"show.php?page=$next_page\" aria-label=\"Next\">";
                        ?>
                        <span aria-hidden="true">Next</span>
                        </a>
                    </li>
                    <?php
                    }
                    ?>
            </nav>
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    