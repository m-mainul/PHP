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
    <form>
       Enter first no:<input type="text" name="firstNoText"/><br/>
       Enter second no: <input type="text" name="secondNoText"/><br/>
       <input type="submit" name="addButton" value="Add"/>
       <input type="submit" name="subtractButton" value="Subtract"/>
       <input type="submit" name="multiplyButton" value="Multiply"/>
       <input type="submit" name="divideButton" value="Divide"/>
    </form>
    <body>
        <?php
        require_once 'calculator.php';
        $calculator = new Calculator();
        
        if(isset($_GET['firstNoText']) && isset($_GET['secondNoText']))
        {
            $first_no = $_GET['firstNoText'];
            $second_no = $_GET['secondNoText'];
        }
        if(isset($_GET['addButton']))
        {
            echo $calculator->add($first_no, $second_no);
        }
        
        if(isset($_GET['subtractButton']))
        {
            echo $calculator->subtract($first_no, $second_no);
        }
        
        if(isset($_GET['multiplyButton']))
        {
            echo $calculator->multiply($first_no, $second_no);
        }
        
        if(isset($_GET['divideButton']))
        {
            echo $calculator->divide($first_no, $second_no);
        }
        ?>
    </body>
</html>
