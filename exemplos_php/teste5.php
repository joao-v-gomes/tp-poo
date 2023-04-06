<?php
    print("Exemplo WHILE");
	$i = 1;
	while ($i <= 10) {
		echo "\n".$i++; 	
	}
	
    print("\n\nExemplo DO-WHILE");
	$i = 1;
	do {
		echo "\n".$i;
        $i++; 
	} while ($i <= 10);

    print("\n\nExemplo FOR");
	for ($i = 1; ; $i++) {
		if ($i > 10) {
			break;
		}
		echo "\n".$i;
	}