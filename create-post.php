<?php include 'access_control.php'; ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Asanz - Create Post</title>
  
  <link rel="stylesheet" href="css/create-post.css">
  <link rel="stylesheet" href="css/navbar.css">
  
  <script src="js/chars_left.js"></script>
  <script src="js/validatePost.js"></script>
</head>
<html>
	<body>
	<header id="create-post-page">
		<nav class="dropdownmenu">
		  <ul>
		    <li><a id="create-post" href="#" onclick="document.forms['newpost'].submit();">+Creating post</a></li>
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
					<textarea name="text" placeholder="Enter text..." required rows="14" cols="40" onKeyDown="textCount( document.newpost.text, document.newpost.left, 160)" onKeyUp="textCount( document.newpost.text, document.newpost.left, 160)"></textarea>
				<div>
				<hr>
			</form>

			<div id="chars"> Characters left: <input name="left" type="text" size="3" maxlength="3" value="160" readonly=""></div>
		</article>
	</body>
</html>