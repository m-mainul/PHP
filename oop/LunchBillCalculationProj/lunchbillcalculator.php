<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LunchBillCalculator
 *
 * @author Mainul Hasan
 */
class LunchBillCalculator {
    public $unit_of_rice;
    public $unit_of_vegetable;
    public $unit_of_fish;
    public $unit_of_meat;
    public $surprising_offer_referred_as_VAT;
    
    public function get_amount_of_taking_rice()
    {
        if($this->unit_of_rice>0)
        {
            $total_price_of_rice = 20*$this->unit_of_rice;
            return $total_price_of_rice;
        }
        else
        {
            return 0;
        }
    }
    
    public function get_amount_of_taking_vegetable()
    {
        if($this->unit_of_vegetable>0)
        {
            $total_price_of_vegetable = 30*$this->unit_of_vegetable;
            return $total_price_of_vegetable;
        }
        else
        {
            return 0;
        }
    }
    
    public function get_amount_of_taking_fish()
    {
        if($this->unit_of_fish>0)
        {
            $total_price_of_fish = 80*$this->unit_of_fish;
            return $total_price_of_fish;
        }
        else
        {
            return 0;
        }
    }
    
    public function get_amount_of_taking_meat()
    {
        if($this->unit_of_meat>0)
        {
            $total_price_of_meat = 120*$this->unit_of_meat;
            return $total_price_of_meat;
        }
        else
        {
            return 0;
        }
    }
    
    public function get_gross_total()
    {
        $gross_total = $this->get_amount_of_taking_rice()+$this->get_amount_of_taking_vegetable()+$this->get_amount_of_taking_fish()+$this->get_amount_of_taking_meat();
        return $gross_total;
    }
    public function get_payable_amount()
    {
        $surprising_offer_value = $this->get_gross_total()*($this->surprising_offer_referred_as_VAT/100);
        $payable_amount_with_surprising_offer = $this->get_gross_total()-$surprising_offer_value;
        return $payable_amount_with_surprising_offer;
    }
}
