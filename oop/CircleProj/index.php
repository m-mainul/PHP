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
        <form>
            Enter Radius<input type = "text" name="radiusText"><br/>
            <input type ="submit" name="showButton" value="Show"/>
        </form>
        <?php
        require_once 'circle.php';
        if(isset($_GET['showButton']))
        {
            $a_circle = new Circle();
            
            $a_circle->radius_of_a_circle=$_GET['radiusText'];
            
            $diameter_of_a_circle = $a_circle->get_diameter();
            $perimeter_of_a_circle = $a_circle->get_perimeter();
            $area_of_a_circle = $a_circle->get_area();
            
            echo "Diameter:",$diameter_of_a_circle,' ',"Perimeter:",$perimeter_of_a_circle,' ',"Area:",$area_of_a_circle;
        }
        ?>
    </body>
</html>
