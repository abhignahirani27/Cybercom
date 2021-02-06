
var array = [];

var final = document.getElementById("final");


function add_element_to_array()
{
    var obj={
        name:document.getElementById("name").value,
        email:document.getElementById("email").value,
        password:document.getElementById("password").value,
        dob:document.getElementById("dob").value
        
};
arr.push(obj);
	localStorage.setItem("array",JSON.stringify(array));
	var arrayr = JSON.parse(localStorage.getItem("array"));
	console.log(arrResult);

	var e = "";
	for (var i=0; i<arrayr.length; i++){
		
		e+="Name : "+arrayr[i].name + "Email : "+arrayr[i].email + "Password : "+arraryr[i].password +"D.O.B : "+arrayr[i].dob;
		e+="<br/>";
	}
final.innerHTML = e;

console.log(array);
console.log(arrayr);
}