<?php
	$name="Rajeev";
	$$name="Sanjeev";
	echo $name."<br/>";
	echo $$name."<br/>";
	echo $Rajeev;

?>

<?php exit; ?>


<?php
		
	function test_me()
	{
	    // static $a = 0;
	    $a = 0;
	    echo $a."<br/>";
	    $a++;
	}

	test_me();
	test_me();
	test_me();

	exit;

	



	static $count;

	$count++;
	echo $count;
	exit;

	function test()
	{
	    static $count = 0;

	    $count++;
	    echo $count;
	    echo $count."<br/>";
	    if ($count < 10) {
	        test();
	    }
	    $count--;

	    echo "Last value of count".$count;
	}

	test(); 

	die();
	



		$a = "<li";
		$b = "class=\"selected\"";
		$c = ">";


		echo $a.$b.$c;

		

		$name="Rajeev";
		$$name="Sanjeev";
		echo $name."<br/>";
		echo $$name."<br/>";
		echo $Rajeev;

		$a = @(57/0);
		$a = (57/0);

		echo $a;

		$out = `dir c:`;
		echo '<pre>'.$out.'</pre>';

		echo '<br/>';
		echo '<br/>';
		echo '<br/>';
		
		echo ucwords(strtolower('RANGPUR'));
	
?>

<pre>
	<?php echo $a.$b.$c; ?>
</pre>
