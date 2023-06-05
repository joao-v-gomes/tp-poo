<?php
	$array = array(
		"f" => "bar",
		"bar" => "f",
		100 => -100,
		-100 => 100,
	);

	//print_r( $array );
	//print_r(array_keys($array));

	$array2 = array("f", "bar", "hello", "world");
	print_r($array2);

    $tamanhoArray2 = count($array2);
	echo "Tamanho do array 2: ".$tamanhoArray2 . "\n";

	if (is_array($array))
		echo '\nÉ um array!';
	else
		echo '\nNão é um array';

	if ( in_array('hello', $array2 ) )
		echo '\nSim, tem HELLO';

	for ( $i=0; $i < count($array2); $i++ ) {
		echo "\t".$array2[$i];
	}

	$array3 = [
		0 => 'UFMG',
		'course' => "POO",
	];
	$array4 = array("We", "love", "PHP!");
	//$array4['course'] = 'Engenharia de Software';

	$array5 = array_merge($array4, $array3);
	
	
	//print_r( $array5 );

	array_pop($array5); 
	var_dump($array5);

	array_push($array5, "Java");
	print_r($array5);

?>