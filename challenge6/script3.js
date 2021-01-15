/**********************
 * Challeng 6 Fibonacci Series
 */

//Prompt display the message that user enter the number

var n=prompt("Enter number you want  Fibonacci series");
console.log("Fibonacci Series:" + "" +n);
var num1=0;
var num2=1;
console.log(num1);
console.log(num2);
//for loop for the looping of the series

for(var i=2;i<=n;i++)
{
    num3=num1+num2;
    console.log(num3);
    num1=num2;
    num2=num3;
    
}