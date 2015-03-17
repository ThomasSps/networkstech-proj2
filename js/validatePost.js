var title = document.forms["newpost"]["title"].value;
var text = document.forms["newpost"]["text"].value;
var button  = document.getElementsByTagName("li");

button[1].addEventListener("click", validatePost);

function validatePost() 
{
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