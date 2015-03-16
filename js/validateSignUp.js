function validateSignUp() 
{

    var uname = document.forms["SignUpForm"]["uname"].value;
    var pass = document.forms["SignUpForm"]["pass"].value;
    var repass = document.forms["SignUpForm"]["repass"].value;
    
    if (uname == null || uname == "") 
    {
        alert("Username is required");
        return false;
    }
    if (uname.length < 4 || uname.length > 20)
    {
        alert("Username must be between 4 and 20 characters");
        return false;
    }
    if (!(/^[0-9A-Za-z]+$/.test(uname)))
    {
        alert("Username must contain only letters And numbers");
        return false;
    }
    if (pass == null || pass == "") 
    {
        alert("Password is required");
        return false;
    }
    if (pass.length < 4 || pass.length > 16)
    {
        alert("Password must be between 4 and 16 characters");
        return false;
    }
    if (repass == null || repass == "") 
    {
        alert("Please re-enter the Password");
        return false;
    }
    if (pass != repass)
    {
        alert("Passwords do not match");
        return false;
    }
}