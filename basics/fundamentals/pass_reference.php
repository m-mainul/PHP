<?php 
$number1 = 2;
$number2 = 3;

// pass by value
// does not reflect on initial variable
// function multiply($num1,$num2) {
// 	$num1 = 3;
// 	echo ($num1*$num2)."<br />";
// }

// pass by reference reflect on initial variable
// here we pass the reference of number1 when we change the value of num1 it as well as change the value number1
function multiply(&$num1,$num2) {
	$num1 = 3;
	echo ($num1*$num2)."<br />";
}

multiply($number1, $number2);
multiply($number1, $number2);

echo $number1."<br />";

// an array value change inside function is possible by pass by reference
$myArray = [1,2,3];

echo $myArray[0]."<br />";

function setArrayFirstItemTo0(&$myArray){
	$myArray[0] = 0;
}

setArrayFirstItemTo0($myArray);

echo $myArray[0]."<br/>";


function myName(){
	$name = 'Mainul';
	$nick_name = "Mithu";
}

?>