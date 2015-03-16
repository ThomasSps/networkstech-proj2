function validateSignUp() 
{

    var uname = document.forms["SignUpForm"]["uname"].value;
    var pass = document.forms["SignUpForm"]["pass"].value;
    var repass = document.forms["SignUpForm"]["repass"].value;
    
    if (uname == null || uname == "") 
    {
        alert("Username is Recquired");
        return false;
    }
    if (uname.length < 4 || uname.length > 20)
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
    if (pass.length < 4 || pass.length > 16)
    {
        alert("Password Must Between 4 and 16 Characters");
        return false;
    }
    if (repass == null || repass == "") 
    {
        alert("Please Re-enter The Password");
        return false;
    }
    if (pass != repass)
    {
        alert("Passwords Do Not Match");
        return false;
    }
}