<?php include 'access_control.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Asanz - Create Post</title>
  
  <link rel="stylesheet" href="css/create-post.css">
  <link rel="stylesheet" href="css/navbar.css">
</head>
<html>
	<body>
	<header>
		<nav class="dropdownmenu">
		  <ul>
		    <li><a href="#" onclick="document.forms['newpost'].submit();">+Creating post</a></li>
		    <li><a href="index.php">Home</a></li>
		    <li><a href="">Dashboard</a></li>
		    
		    <!-- A sub-list item 
		    <li><a href="">Menu Item</a>
		      <ul id="submenu">
		        <li><a href="">Submenu item</a></li>
		      </ul>
		    </li> -->
			
		    <li><a href="logout.php">Logout</a></li>
		  </ul>
		</nav>
	</header>
		<article>
			<form name="newpost" id="newpost" action="commit-post.php" method="post">
				<div id="subject">
					<input type="text" name="title" placeholder="Subject title" required size="80">
				</div>
				<hr>
				<div id="content"> 
					<textarea name="text" placeholder="Enter text..." required rows="14" cols="40"></textarea>
				<div>
				<hr>
			</form>

			<div id="chars"> <i>Characters left: </i> </div>
		</article>
	</body>
</html>