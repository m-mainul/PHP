<?php 

$name = array("Mainul",'Mehedi','Mahmudul','Jahid');
echo $name[0]."<br />";
echo $name[2]."<br />";
echo $name[3]."<br />";

	#Associative Arrays
$name = array(
	'mahmudul' => 'sabbir',
	'mehedi'  =>  'tall man',
	'miftahul' => 'girl',
	'jahid' =>  array('age' => 24,
		'nickname'=>'Tarek'
	),
	'Nijum' =>  array('age' => 24,
		'full_name'=>'Tahafful jahan',
		'favorite' => array('color' =>'red',
			'food' => 'fish')
	),
);

echo $name['mahmudul']. "<br />";
echo $name['mehedi']. "<br />";
echo $name['miftahul']. "<br />";
echo $name['jahid']['age']. "<br />";
echo $name['jahid']['nickname']. "<br />";
echo $name['Nijum']['favorite']['color']. "<br />";
?>
<pre>
	<?php var_dump($name); ?>
</pre>
<br>
<?php
$moustaches = array(

	array(
		'name' => 'Mehedi Hasan',
		'age' => 24,
		'class' => 'Honours Accounting'
	),

	array(
		'name' => 'Mahmudul Hasan',
		'age' => 20,
		'class' => 'CSE'
	),

	array(
		'name' => 'Jahid Hasan',
		'age' => 30,
		'class' => 'class nine'
	),

	array(
		'name' => 'Miftahul Jannat',
		'age' => 10,
		'class' => 'class six'
	),
);

?>

<pre>
	<?php var_dump($moustaches); ?>
</pre>
<br>
<pre>
	<?php print_r($moustaches); ?>
	
</pre>
<br>

<?php  
echo $moustaches[0]['name']. "<br />";
echo $moustaches[0]['class']. "<br />";
echo $moustaches[0]['age']. "<br />";
echo $moustaches[1]['name']. "<br />";
echo $moustaches[2]['name']. "<br />";
echo $moustaches[2]['class']. "<br />";
echo $moustaches[3]['class']. "<br />";