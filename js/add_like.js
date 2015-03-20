function addLike (id){
	$.post("commit-like.php", {
				
		liketo: id

		}, function(data) {
				alert(data);
			});
}