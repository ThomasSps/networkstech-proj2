var auto_refresh = setInterval(
		function ()
		{ $('#posts-array').load('fill-posts.php').fadeIn("slow");}, 2000);