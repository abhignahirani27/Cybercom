<?php

//echo
echo "<input type =\"text\" value =\"Abhigna\" name =\"name\"><br>";
echo '<input type ="text" value ="Abhigna" name ="name"><br>';

//variable creation
$text="Abhigna Hirani";
$number=100.5;
echo $text ,"<br>";
echo $number,"<br>";

//concatenation
$day="Monday";
$date=31;
$year=2021;
echo "The date is $day $date $year <br>";
echo 'The date is '.$day.' '.$date.' '.$year.'<br>';

//if-if else
$text="Hello Again";
if($text=="Again")
{
    echo "True <br>";
}
else
{
    echo "False <br>";
}

//if-else if
$num=13;
if($num==10)
{
    echo "Equal to 10 <br>";
}
else if ($num==11)
{
    echo "Eual to 11 <br>";
}
else
{
    echo "Not matches any number <br>";
}

//operator
$num1=10;
$num2=15;
$num1+=2;
echo $num1,'<br>';
$num1-=2;
echo $num1,'<br>';
$num1*=2;
echo $num1,'<br>';
$num1/=2;
echo $num1,'<br>';
$num1%=2;
echo $num1,'<br>';
if($num1==$num2)
{
    echo "Equal";
}
if($num1>$num2)
{
    echo "Num1 is greater<br>";
}
if($num1<$num2)
{
    echo "Num2 is greater<br>";
}

//triple equal
$num1='1';
$num2=1;
if($num1===$num2)
{
    echo "Equal<br>";
}
else{
    echo "Not equal<br>";
}

//while loop
$counter=1;
while($counter<=10){
    echo $counter. "Hello Again<br>";
    $counter++;
}

//do while loop
$counter=11;
do{
    echo $counter. "Hello Again<br>";
    $counter++;
}
while($counter<=10)
?>
<?php 
//for loop
for ($i=1; $i<=10; $i++)
{
    echo $i.'<br>';
}

//expression matching
$string="This is a srting";
if(preg_match('/what/',$string))
{
    echo 'Match found <br>';
}
    else
{
    echo 'No match found <br>';
}
?>
<?php
function displayDate($day , $date , $year)
{
    echo $day .' '.$date .' '. $year.'<br>';
}
displayDate('Monday',31,2021);
?>

<?php
//array
$food=array('fruits','salad','sweets');
$food[3]='vegetables';
echo $food[0].'<br>';
print_r($food)
?>

