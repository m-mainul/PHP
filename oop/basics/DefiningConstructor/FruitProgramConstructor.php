<?php
include "FruitConstructor.php";

$myApples = 3;
$myOranges = 4;
$myBananas = 5;

$myFruit = new FruitConstructor($myApples,$myOranges,$myBananas);

$rtnVal = $myFruit->addFruit();

print "Yor have $rtnVal pieces of fruit";
print "<br />";

$myFruit = new FruitConstructor(8,3,4);
$rtnVal = $myFruit ->addFruit();
print "Now You have $rtnVal pieces of fruit";
print "<br />";