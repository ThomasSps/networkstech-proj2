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
	<nav class="dropdownmenu">
	  <ul>
	    <li><a href=""><b>Create post...</b></a></li>
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
	<body>
		<form id="newpost">
			<div id="subject">
				<input type="text" placeholder="Subject title" required="" size="80">
			</div>

			<div id="content">
			</div>
		</form>
	</body>
</html>