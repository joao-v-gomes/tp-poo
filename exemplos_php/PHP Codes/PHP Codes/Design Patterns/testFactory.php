<?php
    include_once('../global.php');

    $f1 = flightFactory::getFlight(1);
    echo $f1->getNumberOfTrips();

    $f2 = flightFactory::getFlight(2);
    echo "\n".$f2->getNumberOfTrips();

    echo "\n\n";

    var_dump($f1);
    echo "\n";
    var_dump($f2);