<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of calculator
 *
 * @author Mainul Hasan
 */
class Calculator {  
    public function add($first_no,$second_no)
    {
        return $first_no + $second_no;
    }
    
    public function subtract($first_no,$second_no)
    {
        return $first_no-$second_no;
    }
    
    public function multiply($first_no,$second_no)
    {
        return $first_no*$second_no;
    }
    
    public function divide($first_no,$second_no)
    {
        return $first_no/$second_no;
    }

}
