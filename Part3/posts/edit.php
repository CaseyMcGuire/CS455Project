<html>
<?php
require('../util/assets.php');

?>
<body>

<?php
include('../util/header.php');

if(!user_logged_in() || !isset($_GET['post_id'])){
    header("Location: /");
    exit;
}

try{
    
    $post_id = $_GET['post_id'];
    $db = new PDO('sqlite:../database/blog.sqlite3');

    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->prepare('SELECT * from Post where id=:post_id');
    $stmt->bindValue(':post_id', $post_id, SQLITE3_INTEGER);

    $stmt->execute();

    $result = $stmt->fetch();

    if(strcmp($result['user_email'], $_SESSION['username']) != 0){
	header("Location: /");
	exit;
    }
    
    $title = $result['title'];
    $content = $result['content'];

    
}catch(PDOException $e){
    print "Exception " . $e->getMessage();
    header("Location: /");
    exit;
}

?>

<?php
if(isset($_GET['error'])){
  echo "<p class=\"bg-danger\"> Every post must have content and title </p>";
}
    ?>
    <div class="container">
        <div class=jumbotron">
            
            <form action="update.php" method="post">
                                                      
                <div class="form-group">
                                                                  
                    <input id="post-title" type="text" name="title" class="form-control" placeholder="Post Title">
		    
                </div>
                                                                                    
                <textarea name="content" id="editor"></textarea>
		<?php
		echo "<input type=\"hidden\" name=\"post_id\" value=\"" . $_GET['post_id'] . "\">";
		?>
                <input type="submit" class="btn btn-primary btn-lg btn-block">
                            
            </form>                                                                                       
        </div>                                                                                            
    </div> 

    <?php 
    
    echo "<input type=\"hidden\" id=\"content\" value=\"" . $content . "\">";
    echo "<input type=\"hidden\" id=\"title\" value=\"" . $title . "\">";

    ?>

<script>
 'use strict';


 function init(){

     var content = document.getElementById('content').value;
     var title = document.getElementById('title').value;

     //a hack so that the text editor can be initialized first
     setTimeout(function(){
	 tinyMCE.get('editor').setContent(content);
     }, 100);

     document.getElementById('post-title').value = title;
 }

 window.onload = init;
</script>

</body>
</html>