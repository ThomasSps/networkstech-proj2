<?php include 'access_control.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Asanz - Posts</title>

  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/navbar.css">

</head>
<html>
	<body>
	<header id="index-page">
		<nav class="dropdownmenu">
		  <ul>
		    <li><a href="create-post.php">+Post</a></li>
		    <li><a id="go-home" href="index.php">Home</a></li>
		    <li><a href="">Dashboard</a></li>
			    
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
		        <?php include 'fill-posts.php' ?>
		    </div>
		    <div id="rightcolumn">
		       
		    </div>
		</div>
	</article>
	</body>
</html>