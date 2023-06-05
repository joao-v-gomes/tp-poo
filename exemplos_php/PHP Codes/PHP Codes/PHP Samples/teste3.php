<?php
	include_once("sum2.php");
	
	$a = 1;
	$b = 2;
	//const $c = 8;

	function Sum() {
		global $a, $b;
		$b = $a + $b;
	} 

    
    
	//Sum();
	//echo $b;
    echo "\n";
	echo Sum2($a, $b);
?>