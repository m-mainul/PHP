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
        Employee Name:<input type="text" name="employeeNameText"/><br/>
        Basic Amount:<input type="text" name="basicAmountText"/><br/>
        House Rent:<input type="text" name="houseRentPercentageText"/>%of Basic<br/>
        Medical Allowance:<input type="text" name="medicalAllowancePercentageText"/>%of Basic<br/>
        <input type="submit" name="showMeSalaryButton" value="Show Me Salary"/>
        </form>
        <?php
        require_once 'salary.php';
        if(isset($_GET['showMeSalaryButton']))
        {
            $salary = new Salary();
            
            $salary->employee_name=$_GET['employeeNameText'];
            $salary->basic_amount=$_GET['basicAmountText'];
            $salary->house_rent_percentage=$_GET['houseRentPercentageText'];
            $salary->medical_allowance_percentage=$_GET['medicalAllowancePercentageText'];
            
            $total=$salary->get_total_salary();
            
            echo $salary->employee_name,',your salary is:',$total;
        }
        ?>
    </body>
</html>
