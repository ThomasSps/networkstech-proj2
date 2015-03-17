function validatePost()
{
	var title = document.forms["newpost"]["title"].value;
	var text = document.forms["newpost"]["text"].value;

	if (title == null || title == "")
	    {
	        alert("Post title cannot be empty");
	        return false
	    }
	if (text == null || text == "")
	    {
	        alert("You cannot create an empty post");
	        return false
	    }
	if( title.length > 65 )
		{
			alert("Title must be 64 characters, or less. Currently: " + title.length ) ;
			return false
		}

	document.getElementById("newpost").submit();
}