function validate(){
    var fname=document.getElementById("fname").value;
    var password=document.getElementById("password").value;
    var gen=document.getElementsByName("gender");
    var add=document.getElementById("add").value;
    var flag=0;

    if(fname.trim() == "")
    {
        document.getElementById("fnameErr").innerHTML="* Please enter Name";
        flag=1;
    
    }
    if((fname.length <= 2) || (fname.length >=20))
    {
        document.getElementById("fnameErr").innerHTML="* User length must be between 2 and 20";
        flag=1;
    }
    if(!isNaN(fname))
    {
        document.getElementById("fnameErr").innerHTML="* Only characters are allowed";
        flag=1;
    }
    if(password.trim() == "")
    {
        document.getElementById("passErr").innerHTML="* Please enter Password";
        flag=1;
    
    }
    if(!(gen[0].checked || gen[1].checked))
    {
        document.getElementById("genderErr").textContent="* Please enter Gender";
        flag=1;
    }
    if(add.trim() == "")
    {
        document.getElementById("addErr").innerHTML="* Please enter Address";
        flag=1;
    
    }
    
    if(flag==1){
        return false;
    }
    else{
        document.getElementById("pname").innerHTML= "Your name is:"  + fname;
        document.getElementById("pgender").innerHTML= "Your gender is:" + gen;
        var game=document.getElementsByClassName("game1");
        var a="";
        for(var i=0;game[i];i++)
        {
            if(game[i].checked){
                a=a + ""+ game[i].value;
            }
        }
        document.getElementById("pgame").innerHTML= "Your selected game is:" + a;
        document.getElementById("padd").innerHTML= "Your Address is:" + add;
        return false;
    }
}       

