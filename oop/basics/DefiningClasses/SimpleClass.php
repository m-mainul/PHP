<?php


//Define the Class

class SimpleClass {

    public $myMsg = "My Simple Class";

    public function displayMsg()
    {
        print $this->myMsg;
    }

}

//Execute Code Using the Class

$mySimpleClass = new SimpleClass();

$mySimpleClass->displayMsg();