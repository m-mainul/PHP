<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of employee
 *
 * @author Mainul Hasan
 */
class OfficeEmployee {
    public $id;
    public $name;
    public $salary;
    public $minimum_range_of_salary = 10000;
    public $maximum_range_of_salary = 30000;
    public $minimum_range_of_salary_percentage = 0.5;
    public $middle_range_of_salary_percentage = 0.3;
    public $maximum_range_of_salary_percentage = 0.2;
 
    public function get_salary_with_bonus()
    {
        if($this->salary<=$this->minimum_range_of_salary)
        {
            $bonus = $this->salary * $this->minimum_range_of_salary_percentage;
            $total_salry = $this->salary + $bonus;
            return $total_salry;
        }
        elseif ($this->salary>$this->minimum_range_of_salary && $this->salary<=$this->maximum_range_of_salary) {
            $bonus = $this->salary * $this->middle_range_of_salary_percentage;
            $total_salry = $this->salary + $bonus;
            return $total_salry;
    }
    elseif ($this->salary>$this->maximum_range_of_salary) {
       $bonus = $this->salary * $this->maximum_range_of_salary_percentage;
       $total_salry = $this->salary + $bonus;
       return $total_salry;
}
   
        
    }
    
}
