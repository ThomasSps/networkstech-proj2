<?php include ('access_control.php'); ?>

<!DOCTYPE html>
<html>
<head>
 	  <meta charset="UTF-8">
	  <title>Asanz - Profile</title>

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
          <div id="prof_pic">
              <img style="width: 100%; height: 100%; border:1px solid black;" src="img/no-profile.gif">
          </div>
          <div id="tables">
              <?php include ('fill-user-details.php'); ?>
            <div id="user">
              <table id="user_tb" style="width:100%">
                <tr>
                  <th colspan="2">User</th>
                </tr>
                <tr>
                  <td>Username</td>
                  <td style="text-align:right; font-style: italic;"><?php getUname(); ?></td>
                </tr>
                <tr>
                  <td>Since</td>
                  <td style="text-align:right; font-style: italic;"><?php getSince(); ?></td>
                </tr>
              </table>
            </div>
            <div id="user_stats">
              <table id="user_stats_tb" style="width:100%">
                <tr>
                  <th colspan="2">User statistics</th>
                </tr>
                <tr>
                  <tr>
                    <td>Posts</td>
                    <td style="text-align:right;"><?php getnumPosts(); ?></td>
                  </tr>
                  <tr>
                    <td>Comments</td>
                    <td style="text-align:right;">_____</td>
                  </tr>
                <tr>
                  <td>Likes</td>
                  <td style="text-align:right;">_____</td>
                </tr>
              </table>
            </div>
            <div id="posts_stats">
              <table id="posts_stats_tb" style="width:100%">
                <tr>
                  <th colspan="2">Posts statistics</th>
                </tr>
                <tr>
                  <tr>
                    <td>Comments</td>
                    <td style="text-align:right;">_____</td>
                  </tr>
                <tr>
                  <td>Likes</td>
                  <td style="text-align:right;">_____</td>
                </tr>
              </table>
            </div>
          </div>
		    </div>
        <div id="midcolumn">
    		    <h1>My recent blog posts</h1>
    		    <dl id="my-posts-array"> <?php include 'fill-user-posts.php'; ?> </dl>
		    </div>
		    <div id="rightcolumn">
		    	  <h1>Comments</h1>
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
