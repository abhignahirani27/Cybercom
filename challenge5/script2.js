/******************************
 * Challenge 6
 */

//create a function mouseover and call it by getelement by id
function mouseOver(){
    document.getElementById("demo").addEventListener("mouseOver",popup());
//create a function popup for the alert message
function popup(){
    alert("Welcome to my Webpage!!!");
}
}
