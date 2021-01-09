var massMark,heightMark,massJohn,heightJohn;
massMark=30;
heightMark=3;
massJohn=40;
heightJohn=4;
var BMIMark=massMark/(heightMark*heightMark);
var BMIJohn=massJohn/(heightJohn*heightJohn);
var greaterBMI=BMIMark>BMIJohn;
console.log("Is Mark's BMI higher than John's?"+""+ greaterBMI);
