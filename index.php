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
	<script type="text/javascript" src="js/add_comment.js"></script>
	<script type="text/javascript" src="js/add_like.js"></script>
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
		    <div id="navigationright" style="float: right; cursor:default;">
					<li><a> Active User: &nbsp; <?php include "active_user.php"; ?></a></li>
						
			</div>
		  </ul>
		</nav>
	</header>
	<article>
		<div id="wrapper">
		    <div id="leftcolumn">
		    	<h1>Recent blog posts</h1>
		    	<dl id="posts-array"><?php include 'fill-posts.php'; ?> </dl>
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