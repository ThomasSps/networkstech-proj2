function validateLogIn() 
{

    var uname = document.forms["LogInForm"]["uname"].value;
    var pass = document.forms["LogInForm"]["pass"].value;
    if (uname == null || uname == "") 
    {
        alert("Username is required");
        return false;
    }
    if (uname.length < 4 || uname.length > 20)
    {
        alert("Invalid Username or Password");
        return false;
    }
    if (!(/^[0-9A-Za-z]+$/.test(uname)))
    {
        alert("Invalid Username or Password");
        return false;
    }
    if (pass == null || pass == "") 
    {
        alert("Password is required");
        return false;
    }
    if (pass.length < 4 || pass.length > 16)
    {
        alert("Invalid Username or Password");
        return false;
    }
}