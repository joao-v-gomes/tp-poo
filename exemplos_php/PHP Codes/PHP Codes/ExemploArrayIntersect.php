<?php   
    $flights = array();
    $flights['CNF']['GRU'] = 1;
    $flights['CNF']['PSP'] = 1;
    $flights['GRU']['GIG'] = 1;
    $flights['GRU']['CNF'] = 1;

    $flights2 = $flights;

    $conections = array_intersect($flights, $flights2);

    print_r($conections);