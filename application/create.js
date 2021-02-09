function validate(){
	var name = document.getElementById("name").value;
	var email = document.getElementById("email").value;
	var phno = document.getElementById("phno").value;
    var title= document.getElementById("title").value;


	var flag =0;
	if (name == ""){
		//alert("This is required");
		document.getElementById("nameErr").textContent="* Please enter name";
		flag=1;
	}
	if (email == ""){
		document.getElementById("emailErr").textContent="* Please enter email";
		flag=1;
	}
	if (phno == ""){
		document.getElementById("phnoErr").textContent="* Please enter phno";
		flag=1;
	}
    if (title == ""){
		document.getElementById("titleErr").textContent="* Please enter title";
		flag=1;
	}
    if(flag==1){
        return false;
    }
    









}