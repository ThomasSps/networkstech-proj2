<?php include ('access_control.php'); ?>

<!DOCTYPE html>
<html>
<head>
 	<meta charset="UTF-8">
	<title>Asanz - Dashboard</title>

	<link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/user-profile.css">

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/autoUpdate.js"></script>
	<script type="text/javascript" src="js/add_comment.js"></script>
    
    </head>
<html>
	<body>
	<header id="user-page">
		<nav class="dropdownmenu">
		  <ul>
		    <li><a href="create-post.php">+Post</a></li>
		    <li><a href="index.php">Home</a></li>
		    <li><a id="user-profile" href="user-profile.php">Dashboard</a></li>
		    <li><a id="logout" href="logout.php">Logout</a></li>
		  </ul>
		</nav>
	</header>
	<article>
		<div id="wrapper">
		    <div id="leftcolumn">
		    	<h1>Statistics</h1>
		    </div>
            <div id="midcolumn">
		    	<h1>My Recent blog posts</h1>
		    	<dl id="posts-array"> <?php include 'fill-posts.php'; ?> </dl>
		    </div>
		    <div id="rightcolumn">
		    	<h1> Comments </h1>
		    	<dl id="comm-array"> <?php include 'fill-comm.php'; ?> </dl>
		  		<div id="create-comm">
		  			<form id="newcomment" name="newcomment" method="POST">
		  				<textarea id="comment" name="comment" type="text"  placeholder="Write a comment..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Write a comment...'" onkeydown="add_comment_listener(event);" autocomplete = off  ></textarea>
		  			</form>
		  		</div>
		    </div>
		</div>
	</article>
	</body>
</html>