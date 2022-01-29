<?php
/**
 * Created by PhpStorm.
 * User: Mainul Hasan
 * Date: 9/25/14
 * Time: 3:50 PM
 */

class HelloWorldOOP {

    public function displayValue()
    {
        $myMsg = "Hello World - OOP";
        print $myMsg."<br />";
    }

}

$myHelloWorldOOP = new HelloWorldOOP();
$myHelloWorldOOP1 = new HelloWorldOOP();
$myHelloWorldOOP2 = new HelloWorldOOP();

$myHelloWorldOOP->displayValue();
$myHelloWorldOOP->displayValue();
$myHelloWorldOOP1->displayValue();
$myHelloWorldOOP2->displayValue();