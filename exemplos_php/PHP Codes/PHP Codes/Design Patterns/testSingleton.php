<?php
    include_once('../global.php');

    $log1 = new log(); // Error

    $log1 = log::getInstance();
    $log1->addLog("Login realizado pelo usuário Steve Jobs.");
    var_dump($log1);

    echo "\n\n";

    $log2 = log::getInstance();
    $log2->addLog("Login realizado pelo usuário Bill Gates.");
    var_dump($log2);

    $log2->save();

    unset($log1);
    unset($log2);

    print_r( log::getRecords() );