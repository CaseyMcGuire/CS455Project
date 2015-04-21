<?php session_start() ?>


    
    <nav class="navbar navbar-default"> 
	<div class="container-fluid">
	    <div class="navbar-header">
		<a class="navbar-brand" href="/"> Blogz</a>
	    </div>
	    <ul class="nav navbar-nav">


		<?php if(user_logged_in()){ ?>
		    <li><a href="#">Followed</a></li>
		    <li><a href="#">Followers</a></li>
		    <li><a href="/users/show.php">My Blog</a></li>
		<?php } ?>
		<li><a href="#">Random Blog</a></li>
	    
	    </ul>
	</div>
	
    </nav>
    
<?php 

    if(!ini_get('date.timezone')){
      date_default_timezone_set('GMT');
    }

function user_logged_in(){
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
	return true;
    } else {
	return false;
    }
}

?>
