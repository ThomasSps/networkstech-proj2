var vid;

function add_comment_listener(e) {
    

    // If the user has pressed enter
    if ((window.event ? event.keyCode : e.which) == 13 && !e.shiftKey) {

		var text = $("#comment").val();

		if (text.length < 1){
			
			text = "I am a douchebag and I posted an empty comment";
		}

		// Returns successful data submission message when the entered information is stored in database.
		$.post("commit-comment.php", {
				
		comment: text

		}, function(data) {
				$('#newcomment')[0].reset();
				$('#comment').blur(); // To reset form fields
				displaySelected( window.vid );
			});
    }
    else {
        return true;
    }
}

//TODO: Visualize replies!!!!!!!!!!!
function add_reply (id){
	
	var myid = id;
	
	$.post("commit-reply.php", {
		
		//TO DO: Replies text box
		comment_id: myid
		//reply: text
		
	}, function(data) {
		
		$('#newcomment')[0].reset();
		$('#comment').blur(); // To reset form fields
		
		displaySelected( window.vid );

	});
}


function displaySelected (id){
	window.vid = id;

	$.post("fill-comm.php", {
			
		postid: id

		}, function(data) {
				document.getElementById("comm-array").innerHTML = data;
				//TODO: Refresh Right column with comments
				document.getElementById("comm-array").scrollTo(0,document.getElementById("comm-array").scrollHeight);
			});


}