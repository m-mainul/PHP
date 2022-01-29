<?php 
	
	for($i=0;$i<5; $i++){
		for($j=0;$j<4;$j++){
			for($k=0;$k<3;$k++){
				if($k>=1)
					break;
				echo "Inside Loop of K".'<br>';
			}

			echo "Inside Loop of J".'<br>';
		}

		echo "Inside Loop of I".'<br>';
	}
?>