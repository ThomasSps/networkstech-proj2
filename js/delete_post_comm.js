function DeletePost(id)
{
    var x = confirm("Are you sure yoy want to delete this post?");
    if (x == true) {
        $.post("delete-post.php",{postid: id}, function(data) 
        {return data;});
    }
}

function DeleteComm(id)
{
var y = confirm("Are you sure yoy want to delete this comment?");
if (y == true) {
    $.post("delete-comment.php",{commid: id}, function(data) 
{   return data;});
}
else {}
}