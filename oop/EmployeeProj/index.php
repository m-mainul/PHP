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
        <form action="index.php" method="GET">
            Id: <input type="text" name = "idText"/><br/>
            Name: <input type="text" name = "nameText"/><br/>
            Salary: <input type="text" name = "salaryText"/><br/>
            <input type ="submit" name="showButton" value="Show Below"/>
        </form>
        <?php
        require 'officeemployee.php';
        if (isset($_GET['showButton'])) 
        {
            $an_employee = new OfficeEmployee();
            $an_employee->id = $_GET['idText'];
            $an_employee->name = $_GET['nameText'];
            $an_employee->salary= $_GET['salaryText'];
            
            $salary_with_bonus = $an_employee->get_salary_with_bonus();
            
            echo $an_employee->id, ' ', $an_employee->name, ' ', $an_employee->salary, ' ','Salary with bonus ', $salary_with_bonus;
        }
        ?>
    </body>
</html>
