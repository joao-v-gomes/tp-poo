<?php

    include_once("class.pontoOffline.php");
   include_once("class.funcionario.php");


   
    $dataAgora = new DateTime("now");   
    $po = new pontoOnline( $dataAgora );
    print_r($po);

    $data = new DateTime();
    $data->setDate( 2023, 03, 27 );
    $data->setTime( 8, 5, 0);
    $poff = new pontoOffline( $data );
    $poff->setTipo( TipoPonto::INICIO );
    print_r( $poff );

    $data2 = new DateTime();
    $data2->setDate( 2023, 03, 27 );
    $data2->setTime( 11, 33, 2);
    $poff2 = new pontoOffline( $data2 );
    $poff2->setTipo( TipoPonto::FIM );
    print_r( $poff2 );

    $func = new funcionario( 'João da Silva', '12345678900' );
    $func->addPonto( $po );
    $func->addPonto( $poff );
    $func->addPonto( $poff2 );
    $func->printPontos();
    
    date_diff()