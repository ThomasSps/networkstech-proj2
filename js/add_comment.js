function add_comment_listener(e) {
    

    // If the user has pressed enter
    if ((window.event ? event.keyCode : e.which) == 13 && !e.shiftKey) {
        //document.getElementById("newcomment").submit();
        

		//$(document).ready(function() {
			//$("#submit").click(function() {
				var text = $("#comment").val();

				// Returns successful data submission message when the entered information is stored in database.
				$.post("commit-comment.php", {
				
				comment: text

				}, function(data) {
						$('#newcomment')[0].reset();
						$('#comment').blur(); // To reset form fields
					});
			//});
		//});
        
    }
    else {
        return true;
    }
}