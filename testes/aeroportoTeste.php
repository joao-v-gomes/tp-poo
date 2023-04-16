<?php
    include_once('../libs/global.php');

    $hp = new DateTime('now');
    $hc = new DateTime('now');
    $topgun = new Aeronave("russian", "mk-dir", 500, 10000, "a123", true);
    $galera = array("Milton", "Irineu", "Wesley");

    $listaDeVoos = array("voo1", "voo2", "voo3");
    $listaDeLinhas = array("linha A", "linha B", "linha C");
    $listaDeVoosExecutados = array("voo 4", "voo 5", "voo 6");
    $listaDeCompanhiasAereas = array("Azul", "Gol", "Latam");
    $novoVoo = new Voo("NY", "Boston", $hp, $hc, 36, "AirFrance", $topgun, $galera, 7700);

    // Instanciando um novo objeto da classe aeroporto
    if ( 0 ) {
        $aeroporto1 = new Aeroporto("CNF", "Confins", "Minas Gerais", $listaDeVoos, $listaDeLinhas, $listaDeVoosExecutados, $listaDeCompanhiasAereas);
        $aeroporto1->save();
    }
    if ( 0 ) {
        $aeroporto2 = new Aeroporto("CGH", "Congonhas", "Minas Gerais", $listaDeVoos, $listaDeLinhas, $listaDeVoosExecutados, $listaDeCompanhiasAereas);
        $aeroporto2->save();
    }

    // Carregando registros já persistidos da classe aeroporto
    if ( 0 ) {
        $aeroportos = Aeroporto::getRecords();
        //print_r($aeroportos);
    }

    // Procurando pelo aeroporto CGH e cadastrando novo voo
    if ( 1 ) {
        $aeroportos = Aeroporto::getRecordsByField( 'sigla', 'CGH' );
        //print_r($funcionarios);
        $aeroCGH = $aeroportos[0];
        $aeroCGH->cadastraNovoVoo($novoVoo);        
        $aeroCGH->save();
        print_r($aeroportos);
    }