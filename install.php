<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Asanz - Install</title>
  <script src="js/validateLogIn.js"></script>
  <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
  <link rel="stylesheet" href="css/install.css">
  <link rel="stylesheet" href="css/animations.css">
</head>
<body>
	<div class="wrap">
		<div id="object" class="slideUp"> 
			<a href="run-install.php"><p>Install now</p></a>
		</div>
		<div class="avatar pulse">
      		<img src="img/login/avatar.png">
		</div>
	</div>

	<!-- when scrolls
	<script>
		$(window).scroll(function() {
			$('#animatedElement').each(function(){
			var imagePos = $(this).offset().top;

			var topOfWindow = $(window).scrollTop();
				if (imagePos < topOfWindow+400) {
					$(this).addClass("slideUp");
				}
			});
		});
	</script>	
	-->
	<!-- when clicks
	<script>
		$('#animatedElement').click(function() {
			$(this).addClass("slideUp");
		});
	</script>
	-->
</body>
</html>