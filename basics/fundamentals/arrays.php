<?php $mixed = array('Num'=>'a6',"my","fox","dog",array("x","y","z")); ?>
<br>
Print the array:
<br>
<?php print_r ($mixed); ?>
<?php echo $mixed[2]; ?><br/>
<?php //echo $mixed[3]; ?><br/>
<?php //echo $mixed; ?><br/>

<pre>
	<?php print_r($mixed);//print_r is a nice way for debugging ?>
</pre>
<?php echo $mixed[3][1]; ?>
<br/>