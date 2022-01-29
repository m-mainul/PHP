<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Floating Point Numbers</title>
</head>
<body>
<?php $float = 3.14; ?>
Round:	<?php echo round($float,1);//round the number with 1 decimel number after floating point ?><br/>
Ceiling:<?php echo ceil($float);//ceiling always round up ?><br/>
Foor:	<?php echo floor($float);//floor always round low ?><br/>
<br/>

<?php $integer = 3; ?>

<?php echo "Is {$integer} integer? " .is_int($integer); ?><br/>
<?php echo "Is {$float} integer? " .is_int($float); ?><br/>

<br/>

<?php echo "Is {$integer} float? " .is_float($integer); ?><br/>
<?php echo "Is {$float} float? " .is_float($float); ?><br/>

<br/>

<?php echo "Is {$integer} numeric? " .is_numeric($integer); ?><br/>
<?php echo "Is {$float} numeric? " .is_numeric($float); ?><br/>


</body>
</html>