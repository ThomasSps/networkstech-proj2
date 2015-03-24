function addLike (id){
	$.post("commit-like.php", {
				
		liketo: id

		}, function(data) {
				if (data < 10){
					document.getElementById(id).innerHTML = "&nbsp;&nbsp;" + data;	
				}
				else if (data < 100){
					document.getElementById(id).innerHTML = "&nbsp;" + data;
				}
				else{
					document.getElementById(id).innerHTML = data;
				}
			});
}