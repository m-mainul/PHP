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
        <h2>You have taken</h2>
        <form action="index.php" method="get">
            Rice<input type ="text" name="riceText"/>Unit.(20 tk/unit).<br/>
            Vegetable<input type ="text" name="vegetableText"/>Unit.(30 tk/unit).<br/>
            Fish<input type ="text" name="fishText"/>Unit.(80 tk/unit).<br/>
            Meat<input type ="text" name="meatText"/>Unit.(120 tk/unit).<br/>
            VAT<input type ="text" name="vatText"/>%<br/>
            <input type="submit" name ="showBillButton" value="Show bill"/>
        </form>
        <?php
        require_once 'lunchbillcalculator.php';
        if(isset($_GET['showBillButton']))
        {
            $lunch_bill_calculator = new LunchBillCalculator();
            $lunch_bill_calculator->unit_of_rice = $_GET['riceText'];
            $lunch_bill_calculator->unit_of_vegetable = $_GET['vegetableText'];
            $lunch_bill_calculator->unit_of_fish = $_GET['fishText'];
            $lunch_bill_calculator->unit_of_meat = $_GET['meatText'];
            $lunch_bill_calculator->surprising_offer_referred_as_VAT = $_GET['vatText'];
            
            $gross_total = $lunch_bill_calculator->get_gross_total();
            $payable_amount = $lunch_bill_calculator->get_payable_amount();
            
            echo "Gross Total is:",$gross_total,' ',"Payable Amount is:",$payable_amount;
        }
        ?>
    </body>
</html>
