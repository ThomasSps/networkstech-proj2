var vid;

function add_comment_listener(e) {
    // If the user has pressed enter
    if ((window.event ? event.keyCode : e.which) == 13 && !e.shiftKey) {

		var text = $("#comment").val();

		if (text.length < 1)
			text = "I am a douchebag and I posted an empty comment";

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


function add_reply (e, id){
	
	var myid = id;

	if ((window.event ? event.keyCode : e.which) == 13 && !e.shiftKey) {

		var text = $("#reply"+id).val();

		if (text.length < 1)
			text = "I am a douchebag and I posted an empty reply";

		// Returns successful data submission message when the entered information is stored in database.
		$.post("commit-reply.php", {
		
		comment_id: myid,
		reply: text

		}, function(data) {
				$('#newreply')[0].reset();
				$('#reply').blur(); // To reset form fields
				displaySelected( window.vid );
			});
    }
    else {
        return true;
    }


}


function displaySelected (id){
    
    if (window.vid != null){
        document.getElementById("sec"+window.vid).style.display = 'none';
    }

	window.vid = id;
    
    document.getElementById("sec"+id).style.display = 'block';

	$.post("fill-comm.php", {
		postid: id
		}, function(data) {
				document.getElementById("comm-array").innerHTML = data;
				document.getElementById("comm-array").scrollTo(0,document.getElementById("comm-array").scrollHeight);
			});
}

function makeVisible( id ) {
	if (document.getElementById("com"+id).style.display == "block")
		document.getElementById("com"+id).style.display = "none";
	else
		document.getElementById("com"+id).style.display = "block";
}