<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="index.php" method="get">
            Principle Amount<input type="text" name="principleAmountText"/><br/>
            Annual Interest Rate<input type="text" name="annualInterestRateText"/>%<br/>
            Compound Interval<select name="compoundInterval">
                <option value="1">Monthly</option>
                <option value="3">Quarterly</option>
                <option value="6">Half Yearly</option>
                <option value="12">Yearly</option>
            </select></br>
            Time period's<input type="text" name="timePeriodText"/>Year<br/>
            <input type="submit" name="calculateButton" value="Calculate"/><br/>
        </form>
        <?php
        require_once 'CompoundInterestCalculator.php';
        $interest_calculator = new SimpleInterestCalculator();

        if (isset($_GET['calculateButton'])) {
            $interest_calculator->principle_amount = $_GET['principleAmountText'];
            $interest_calculator->annual_interest_rate = $_GET['annualInterestRateText'];
            $interest_calculator->compound_interval = $_GET['compoundInterval'];
            $interest_calculator->time_period = $_GET['timePeriodText'];

            $total_amount = $interest_calculator->get_total_amount();
            
            echo $total_amount;
        }
        ?>
    </body>
</html>
