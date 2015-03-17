function validatePost() 
{
    var title = document.forms["newpost"]["title"].value;
    var text = document.forms["newpost"]["text"].value;
    
    if (title == null || title == "") 
    {
        alert("Post Title Can't Be Empty");
        return false;
    }
    if (text == null || text == "") 
    {
        alert("You Can't Create An Empty Post");
        return false;
    }
}