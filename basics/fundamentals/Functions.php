<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Functions: Return values from a function.</title>
</head>
<body>
	<?php 
	
		function chinese_zodiac($year)
		{
			switch (($year - 4) % 12) {
				case 0: return 'Rat';
				case 1: return 'Ox';
				case 2: return 'Tiger';
				case 3: return 'Rabbit';
				case 4: return 'Dragon';
				case 5: return 'Snake';
				case 6: return 'Horse';
				case 7: return 'Goat';
				case 8: return 'Horse';
			}
		}

		$zodiac = chinese_zodiac(2013);
		echo "2013 is the year of the {$zodiac}.<br/>";

	 ?>
</body>
</html>