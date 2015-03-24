function DeletePost(id)
{
    var x = confirm("Are you sure you want to delete this post?");
    if (x == true) {
        $.post("delete-post.php",{postid: id}, function(data) 
        {return data;});
    }
}

function DeleteComm(id)
{
	var y = confirm("Are you sure you want to delete this comment?");
	if (y == true) {
    	$.post("delete-comment.php",{commid: id}, function(data) 
		{
			$('#newcomment')[0].reset();
			$('#comment').blur(); // To reset form fields
			displaySelected( window.vid );});
	}
}

function DeleteReply(id)
{
	var z = confirm("Are you sure you want to delete this reply?");
	if (z == true) {
        $.post("delete-reply.php",{replyid: id}, function(data) 
        {return data;});
    }
}