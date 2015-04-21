<html>
<?php
require("../util/assets.php");
?>

<body>
    <?php
    require("../util/header.php");
    ?>
    <div class="container">
	<div class=jumbotron">
	    <form action="create.php" method="post">
		<textarea name="content"></textarea>
		<input type="submit" class="btn btn-large">
	    </form>
	</div>
    </div>
</body>
</html>