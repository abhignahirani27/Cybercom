//For validation

function verifyNull()
 {
     if (!document.getElementById('password').value.trim().length) {
        document.getElementById("passErr").innerHTML="* Please enter password";
        return false;
    }
}
function verifyEmail()

 {
    var x = document.getElementById('email').value;
    var atpos = x.indexOf("@");
    var dotpos = x.lastIndexOf(".");
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        document.getElementById("emailErr").innerHTML="* Please enter valid email";
        document.myform.name.value;
        return false;
    }
}
