function validation(){
    var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;
    var flag=0;

    if(email.trim()=="")
    {

        document.getElementById("emailErr").innerHTML="* Please enter Email";
        flag=1;
    }

    if(password.trim()=="")
    {

        document.getElementById("passwordErr").innerHTML="* Please enter Password";
        flag=1;
    }
    if(password.length <=4)
    {
        document.getElementById("passwordErr").innerHTML="* Length must be greater than 4 characters";
        flag=1;
    }
    if(flag==1){
        return false;
    }
    else{
        document.getElementById("pemail").innerHTML= "Your email is:"  + email;
        return false;
    }
}