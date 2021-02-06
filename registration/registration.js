/*function register(){
    var name=document.getElementById("name").value;
    var email=document.getElementsByName("email").value;
    var password=document.getElementById("password").value;
    var cpassword=document.getElementsByName("cpassword").value;
    var flag=0;

    if(name.trim() == "")
    {
        document.getElementById("nameErr").innerHTML="* Please enter Name";
        flag=1;
    
    }
    if(email.trim() == "")
    {
        document.getElementById("emailErr").innerHTML="* Please enter email";
        flag=1;
    }
}
var flag=0;
function verifyNull()
 {
    if (!document.getElementById('name').value.trim().length) {
        document.getElementById("nameErr").innerHTML="* Please enter name";
        flag=1;
    }
    if (!document.getElementById('password').value.trim().length) {
        document.getElementById("passErr").innerHTML="* Please enter password";
        flag=1;
    }
    if (!document.getElementById('cpassword').value.trim().length) {
        document.getElementById("cpassErr").innerHTML="* Please enter confirm password";
        flag=1;
    }
    if(flag==1){
        console.log("Error");
        flag=0;
        return false;
    }
}

*/
          
  if(localStorage.getItem('adminData') != null) {
    alert("Admin is already Created!");
    document.getElementById("reg_btn").disabled = true;
    document.getElementById("reg_btn").style.visibility = 'hidden';
}
// console.log('call');
function register() 
{
    // console.log('function');
    var name = document.getElementById("name").value;
    console.log(name);
    var email = document.getElementById("email").value;
    var pass = document.getElementById("password").value;
    var cpass = document.getElementById("cPassword").value;
    var city = document.getElementById("city").value;
    var state = document.getElementById("state").value;
    console.log(email);
    console.log(city);
    if(pass != cpass) {
        document.getElementById("msgConfirmPassword").innerHTML = "Password and Confirm password must be same";
        document.getElementById("cPassword").focus();
        return false;
    }
    else if(city == "Select City") {
        document.getElementById("msgCity").innerHTML = "Password and Confirm password must be same";
        document.getElementById("city").focus();
        return false;
    }
    else if(state == "Select State") {
        document.getElementById("msgState").innerHTML = "Password and Confirm password must be same";
        document.getElementById("state").focus();
        return false;
    }
    else {
        adminData = {'name':name, 'email':email, 'password':pass, 'city':city, 'state':state};
        localStorage.setItem('adminData',JSON.stringify(adminData));
        alert("Admin created Successfully!");
        return true;
    }
}
    