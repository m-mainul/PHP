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
          $a_person = new Person('Jmaes','Locus', 'Scott');
          
          
//          $a_person->set_first_name('James');
//          $a_person->set_middle_name('Locus');
//          $a_person->set_last_name('Scott');
          
          echo $a_person->get_full_name().'<br/>';
          echo $a_person->get_reverse_name();
        ?>
    </body>
</html>
