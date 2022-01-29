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
        <?php
            require_once 'person.php';
            session_start();
            $person = $_SESSION['a_person'];
            echo $person->get_full_name()."<br/>";
            echo $person->get_reverse_name();
        ?>
    </body>
</html>
