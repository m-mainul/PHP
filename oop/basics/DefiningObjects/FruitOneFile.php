<?php


class FruitOneFile {

    public function addFruit($apples, $orange, $bananas)
    {
        $totalFruit = $apples + $orange + $bananas;
        return $totalFruit;
    }

}

//Execute Code using the Class
$myApples = 2;
$myOranges = 3;
$myBananas = 4;
$myFruit = new FruitOneFile();
$rtnVal = $myFruit->addFruit($myApples,$myOranges,$myBananas);
print "You have $rtnVal pieces of fruit";