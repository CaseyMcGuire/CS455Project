<?php session_start() ?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
    <link rel="stylesheet" href="../assets/styling.css">
</head>
<body>
    
    <nav class="navbar navbar-default"> 
	<div class="container-fluid">
	    <div class="navbar-header">
		<a class="navbar-brand" href="/"> Blogz</a>
	    </div>
	    <ul class="nav navbar-nav">


		<?php if(user_logged_in()){ ?>
		    <li><a href="#">Followed</a></li>
		    <li><a href="#">Followers</a></li>
		    <li><a href="#">My Blog</a></li>
		<?php } ?>
		<li><a href="#">Random Blog</a></li>
	    
	    </ul>
	</div>
	
    </nav>
    
<?php 
function user_logged_in(){
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
	return true;
    } else {
	return false;
    }
}

?>
