<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of salarycalculator
 *
 * @author Mainul Hasan
 */
class Salary {
    public $employee_name;
    public $basic_amount;
    public $house_rent_percentage;
    public $medical_allowance_percentage;
    
    public function get_total_salary()
    {
        $house_rent_amount = $this->basic_amount*($this->house_rent_percentage/100);
        $medical_allowance_amount = $this->basic_amount*($this->medical_allowance_percentage/100);
        $total_amount = $this->basic_amount+$house_rent_amount+$medical_allowance_amount;
        return $total_amount;
    
    }
}
