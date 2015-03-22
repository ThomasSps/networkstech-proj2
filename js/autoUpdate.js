var auto_refresh = setInterval(
		function ()
		{ $('#posts-array').load('fill-posts.php').fadeIn("slow"); $('#my-posts-array').load('fill-user-posts.php').fadeIn("slow");}, 5000);