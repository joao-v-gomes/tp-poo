<?php
    include_once('../global.php');
    $arr = array(10, 9, 8, 7, 6, 5, 4, 3, 2, 1);
    
    $sorter = new sorter();

    $strateyObject = new bubbleSortStrategy();
    $sorter->setStrategy( $strateyObject );
    print_r( $sorter->sort( $arr ) );

    $strateyObject = new quickSortStrategy();
    $sorter->setStrategy( $strateyObject );
    print_r( $sorter->sort( $arr ) );

    $strateyObject = new heapSortStrategy();
    $sorter->setStrategy( $strateyObject );
    print_r( $sorter->sort( $arr ) );