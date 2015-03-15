function validateLogIn() 
{

    var uname = document.forms["LogInForm"]["uname"].value;
    var pass = document.forms["LogInForm"]["pass"].value;
    if (uname == null || uname == "") 
    {
        alert("Username is Recquired");
        return false;
    }
    if (uname.length <= 4 || uname.length >= 20)
    {
        alert("Username Must Between 4 and 20 Characters");
        return false;
    }
    if (!(/^[0-9A-Za-z]+$/.test(uname)))
    {
        alert("Username Must Contain Only Letters And Numbers");
        return false;
    }
    if (pass == null || pass == "") 
    {
        alert("Password is Recquired");
        return false;
    }
    if (uname.length <= 4 || uname.length >= 16)
    {
        alert("Password Must Between 4 and 16 Characters");
        return false;
    }
}