<div>
	<form method="post">
		Please give a number to check it is palindrome or not? <br>
		<input type="number" name="palindrome"></input>
		<input type="submit" name="submit" value="submit"></input>
	</form>
</div>

<?php 
	if(isset($_POST['submit'])) {
	    // echo "Please give a number to check it is palindrome or not?";
	    $n = $original_value = $_POST['palindrome'];
	    $result = [];
	    $i = 0;
	    while($n>9) {
	        $result[$i] = $n%10;
	        $n = (int)$n/10;
	        $i++;
	    }
	    $result[$i] = (int)$n;

	    $new_number = implode($result);

	    if($original_value == $new_number) {
	    	echo "The number is palindrome.";
	    } else {
	    	echo "The number is not palindrome.";
	    }

}
