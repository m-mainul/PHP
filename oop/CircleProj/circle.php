<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of circle
 *
 * @author Mainul Hasan
 */
class Circle {
    public $radius_of_a_circle;
    
    public function get_diameter()
    {
        if($this->radius_of_a_circle>0)
        {
            $diameter_of_a_circle = 2 * $this->radius_of_a_circle;
            return $diameter_of_a_circle;
        }
        else
        {
            return "The radius of the circle is 0 as a result diameter is also 0.<br/>";
        }
    }
    
     public function get_perimeter()
    {
        if($this->radius_of_a_circle>0)
        {
            $perimeter_of_a_circle = 2 *pi()* $this->radius_of_a_circle;
            return $perimeter_of_a_circle;
        }
        else
        {
            return "The radius of the circle is 0 as a result perimeter is also 0.<br/>";
        }
    }
    
     public function get_area()
    {
        if($this->radius_of_a_circle>0)
        {
            $area_of_a_circle= pi()*  $this->radius_of_a_circle* $this->radius_of_a_circle;
            return $area_of_a_circle;
        }
        else
        {
            return "The radius of the circle is 0 as a result area is also 0.";
        }
    }
}

