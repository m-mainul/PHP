<?php

//Define the Class

Class SimpleClass
{
    public $myMsg = "My Simple Class with Return";

    public function displayMsg()
    {
        return $this->myMsg;
    }
}

//Execute Code Using the Class

$mySimpleClass = new SimpleClass();

$rtnVal = $mySimpleClass->displayMsg();

print $rtnVal;