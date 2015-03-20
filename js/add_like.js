function addLike (id){
	$.post("commit-like.php", {
				
		liketo: id

		}, function(data) {
				document.getElementById(id).innerHTML = data;
			});
}