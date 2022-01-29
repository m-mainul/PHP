<?php
/**
 * Created by PhpStorm.
 * User: Mainul Hasan
 * Date: 9/25/14
 * Time: 6:46 PM
 */

//Define the class

class ClassProperties {

    public static $myRadius = 5.5;
    const MYPI = 3.14159;

    public function calcCircum()
    {
        $circum = 2 * self::MYPI * $this->myRadius;
        return $circum;
    }

}

//Execute code using the class

$myClassProperties = new ClassProperties();

$rtnVal = $myClassProperties->calcCircum();

print "The circumference of a circle with a radius ";
print "of $myClassProperties->myRadius is $rtnVal";