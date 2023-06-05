<?php
    include_once("class.pontoOnline.php");
    $dataAgora = new DateTime("now");   
    //print_r($dataAgora);
    
    $po = new pontoOnline( $dataAgora );
    var_dump($po);
    //$ponto1 = new pontoOnline();


    $po->setTipo(tipoPonto::FIM);
    