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
/*
function register(){
    var email=document.myform.email.value;
    var password=document.myform.password.value;
    var flag=0;

    if(email==null || email==""){
        document.getElementById("emailErr").innerhtml="Please enter Email";
        flag=1;
    }

    if(password==null ||  password.length<2){
        document.getElementById("emailErr").innerhtml="Please enter valid Password";
        flag=1;
    }
    if (flag==1){
        console.log("Error");
        flag=0;
        return false;
    }
    else{
        var result=JSON.parse(localStorage.getItems("admin"));
        if()
    }

}*/

/*function validate()
{
return (verifyNull() && verifyEmail());
}


function verifyNull(){
        var isValid = true;
        if(!document.getElementById('username').value.trim().length){
            isValid = false;
            alert('Please enter username');
        }
        else if(!document.getElementById('password').value.trim().length){
        isValid = false;
            alert('Please enter password');
        }
      return isValid;
    }
    function verifyEmail(){
        var x = document.getElementById('email').value;
        var atpos = x.indexOf("@");
        var dotpos = x.lastIndexOf(".");
        if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
            alert("Not a valid e-mail address");
        return false;
        }
       return true;
    }
﻿*/