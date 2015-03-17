<?php include ('access_control.php'); ?>

<!DOCTYPE html>
<html>
<head>
 	<meta charset="UTF-8">
	<title>Asanz - Posts</title>

	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/navbar.css">

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/autoUpdate.js"></script>
</head>
<html>
	<body>
	<header id="index-page">
		<nav class="dropdownmenu">
		  <ul>
		    <li><a href="create-post.php">+Post</a></li>
		    <li><a id="go-home" href="index.php">Home</a></li>
		    <li><a href="user-profile.php">Dashboard</a></li>
			    
		    <!-- A sub-list item 
		    <li><a href="">Menu Item</a>
		      <ul id="submenu">
		        <li><a href="">Submenu item</a></li>
		      </ul> 
		    </li> -->

		    <li><a id="logout" href="logout.php">Logout</a></li>
		  </ul>
		</nav>
	</header>
	<article>
		<div id="wrapper">
		    <div id="leftcolumn">
		    	<h1>Recent blog posts</h1>
		    	<dl id="posts-array"> <?php include 'fill-posts.php'; ?> </dl>
		    </div>
		    <div id="rightcolumn">
		    </div>
		</div>
	</article>
	</body>
</html>