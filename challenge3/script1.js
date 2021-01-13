/*************************************************************
 Coding challenge 3
 */

//store values in the array named bill.Values are in dollar

var bill=[124,48,268]; var tipAmt=[]; var finalAmt=[];
//create a function named calcTip
function calcTip(amt)
{
        if(amt<=50)
        {
            return amt*0.2;
        }
        else if(amt>50 && amt<=200)
        {
            return amt*0.15;
        }
        else
        {
            return amt*0.1;
        }     
}
//using for loop for calculating the tip of each value present in the array
for(var i=0;i<bill.length;i++)
{
    tipAmt[i]=calcTip(bill[i]);
    finalAmt[i]=bill[i]+tipAmt[i];
    console.log('tip:' + tipAmt[i]);
}
console.log('\nAll three tips:' + tipAmt);
console.log('\nFinal Amount:' + finalAmt);