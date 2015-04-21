<html>
<?php
require("../util/assets.php");
?>

<body>
    <?php
    require("../util/header.php");
//var_dump($_SESSION);
    ?>
    <div class="container">
	<div class=jumbotron">
	    <form action="create.php" method="post">
		<div class="form-group">
		    <input type="text" name="title" class="form-control" placeholder="Post Title">
		</div>
		<textarea name="content"></textarea>
		<input type="submit" class="btn btn-primary btn-lg btn-block">
	    </form>
	</div>
    </div>
</body>
</html>