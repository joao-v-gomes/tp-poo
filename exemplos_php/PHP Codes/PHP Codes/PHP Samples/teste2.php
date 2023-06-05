<?php
	$f = 'Bob';		            // Assign the value 'Bob' to $f
	$bar = &$f; 		        // Reference $f via $bar.
	$bar = "My name is ".$bar; 	// Alter $bar...
	echo $bar;
    echo "\n";
	echo $f; 			        // $f is altered too.
?>