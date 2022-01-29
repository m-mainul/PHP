<?php 
$limit = 100000;
for($perfect=1;$perfect<=$limit;$perfect++) {
	if($perfect%2==0) {
		$n = $perfect/2;
		$sum = 3;
		for($j=3;$j<=$n;$j++){
			if($perfect%$j==0){
				$sum += $j;
			}
		}
		if($perfect == $sum) 
			echo $perfect.' ';
	}
}