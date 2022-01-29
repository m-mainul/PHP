<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InterestCalculator
 *
 * @author Mainul Hasan
 */
class CompoundInterestCalculator {

    public $principle_amount;
    public $annual_interest_rate;
    public $compound_interval;
    public $time_period;

    public function get_total_amount() {
        $annual_compound_interest = 1;
        $annual_interest_rate_with_compound_interval = 1 + (($this->annual_interest_rate / 100) / $this->compound_interval);
        $counter = ($this->compound_interval * $this->time_period);

        for ($i = 1; $i <= $counter; $i++) {
            $annual_compound_interest*= $annual_interest_rate_with_compound_interval;
        }

        $total_amount = $this->principle_amount * $annual_compound_interest;
        return $total_amount;
    }

}
