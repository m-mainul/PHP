<?php 

	for ($count=0; $count <= 10; $count++) { 
		if ($count == 5) {
			continue;		
		}
		echo $count . ", ";
		continue;
	}
	?>
	<br>
	<br>
	<br>
	<?php 

	for ($count=0; $count <=10; $count++) { 
		if ($count % 2 == 0) {
			continue;
		}
		echo $count . "<br>";	
	}
	?>
	<br>
	<br>
	<br>
	<?php // what's wrong with this?		
	$count = 0;
	while ($count <= 10) {
	 	if ($count == 5) {
	 		$count++;
	 		continue;	

	 	}
	 	echo $count. ",";
	 	$count++;
	 } 
	 ?>
	 <br>
	 <br>
	 <br>
	<?php //loop inside a loop with continue

	 for($i=0; $i<=5; $i++){ 
	  	if ($i%2 == 0) {
	  		continue;	
	  	}
	  	for ($k=0; $k <=5; $k++) { 
	  		echo $i. "_". $k . "<br>";
	  	}
	  }