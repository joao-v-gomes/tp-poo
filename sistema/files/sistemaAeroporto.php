<?php

include_once("../libs/global.php");

function sis_cadastrarAeroporto()
{
    $sigla = (string)readline("Digite a sigla do aeroporto: ");
    $cidade = (string)readline("Digite a cidade do aeroporto: ");
    $estado = (string)readline("Digite o estado do aeroporto: ");

    $aeroporto = new Aeroporto($sigla, $cidade, $estado);

    $aeroporto->save();

    print_r("Aeroporto cadastrado com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verAeroportos()
{
    $aeroportos = Aeroporto::getRecords();

    // print_r($aeroportos);

    mostraAeroportos($aeroportos);

    print_r("\n\n");
}

function mostraAeroportos(array $aeroportos)
{
    print_r("Aeroportos cadastrados:\r\n");
    print_r("Index - Sigla - Cidade - Estado\r\n");

    foreach ($aeroportos as $aeroporto) {
        print_r($aeroporto->getIndex() . " - " . $aeroporto->getSigla() . " - " . $aeroporto->getCidade() . " - " . $aeroporto->getEstado() . "\r\n");
    }
}

function sis_editarAeroporto()
{
    $aeroportos = Aeroporto::getRecords();

    mostraAeroportos($aeroportos);

    $index = (int)readline("Digite o index do aeroporto que deseja editar: ");

    $aeroporto = $aeroportos[$index - 1];

    $sigla = (string)readline("Digite a sigla do aeroporto: ");
    $cidade = (string)readline("Digite a cidade do aeroporto: ");
    $estado = (string)readline("Digite o estado do aeroporto: ");

    $aeroporto->setSigla($sigla);
    $aeroporto->setCidade($cidade);
    $aeroporto->setEstado($estado);

    $aeroporto->save();

    print_r("Aeroporto editado com sucesso!\r\n");

    print_r("\n\n");
}

function sis_conectarCompanhiaAereaEmAeroporto()
{
    $aeroportos = Aeroporto::getRecords();

    mostraAeroportos($aeroportos);

    $indexAeroporto = (int)readline("Digite o index do aeroporto: ");

    $aeroporto = $aeroportos[$indexAeroporto - 1];

    // print_r("Aeroporto selecionado: " . $aeroporto);

    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    // $companhiaAerea = $companhiasAereas[$indexCompanhiaAerea];

    $aeroporto->cadastraNovaCompanhiaAerea($indexCompanhiaAerea);

    $aeroporto->save();

    print_r("Conexao realizada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verCompanhiasAereasEmAeroporto()
{
    $aeroportos = Aeroporto::getRecords();

    mostraAeroportos($aeroportos);

    $indexAeroporto = (int)readline("Digite o index do aeroporto: ");

    print_r("\n\n");

    $aeroporto = $aeroportos[$indexAeroporto - 1];

    // print_r("Aeroporto selecionado: " . $aeroporto);

    $indexCompanhiasAereas = $aeroporto->getCompanhiasAereas();

    // print_r("Companhias Aereas cadastradas no aeroporto:\r\n");
    // print_r($indexCompanhiasAereas);

    $companhiasAereasDoAeroporto = array();

    foreach ($indexCompanhiasAereas as $indexCompanhiaAerea) {
        $compAerea = CompanhiaAerea::getRecordsByField('index', $indexCompanhiaAerea);
        array_push($companhiasAereasDoAeroporto, $compAerea[0]);
    }

    mostraCompanhiasAereas($companhiasAereasDoAeroporto);

    print_r("\n\n");
}

function sis_cadastrarVoo()
{
    $frequencia = (string)readline("Digite a frequencia do voo (1 - D, 2 - S, 3 - T, 4 - Q, 5 - Q, 6 - S, 7 - S): ");

    $frequencia = explode(",", $frequencia);

    print_r("Freq: ");
    print_r($frequencia);

    $aeroportos = Aeroporto::getRecords();

    mostraAeroportos($aeroportos);

    $indexAeroportoOrigem = (int)readline("Digite o index do aeroporto de origem: ");
    $indexAeroportoDestino = (int)readline("Digite o index do aeroporto de destino: ");

    // $aeroportoOrigem = $aeroportos[$indexAeroportoOrigem - 1]->getSigla();
    // $aeroportoDestino = $aeroportos[$indexAeroportoDestino - 1]->getSigla();

    $aeroportoOrigem = $aeroportos[$indexAeroportoOrigem - 1]->getIndex();
    $aeroportoDestino = $aeroportos[$indexAeroportoDestino - 1]->getIndex();

    print_r("Aeroporto Origem: " . $aeroportoOrigem . "\r\n");
    print_r("Aeroporto Destino: " . $aeroportoDestino . "\r\n");

    // $aeronaves = Aeronave::getRecords();

    // mostraAeronaves($aeronaves);

    // $indexAeronave = (int)readline("Digite o index da aeronave: ");

    // $aeronave = $aeronaves[$indexAeronave - 1];

    // $piloto = Piloto::getRecords();

    // mostraPilotos($piloto);

    // $indexPiloto = (int)readline("Digite o index do piloto: ");

    // $piloto = $piloto[$indexPiloto - 1];

    // $copiloto = Piloto::getRecords();

    // mostraPilotos($copiloto);

    // $indexCopiloto = (int)readline("Digite o index do copiloto: ");

    // $copiloto = $copiloto[$indexCopiloto - 1];

    // $comissario = Comissario::getRecordsByField("companhiaAerea", $copiloto->getCompanhiaAerea());

    // mostraComissarios($comissario);

    // $indexComissario = (int)readline("Digite o index dos comissarios: ");

    // $listaIndexComissario = explode(",", $indexComissario);

    // $listaComissarios = [];

    // foreach ($listaIndexComissario as $index) {
    //     // $comissarios[] = $comissario[$index - 1];
    //     array_push($listaComissarios, $comissario[$index - 1]);
    // }

    // print_r("Comissarios: ");
    // print_r($listaComissarios);

    $dataHoraPartida = (string)readline("Digite a data e hora de previsao partida (dd/mm/aaaa hh:mm): ");

    $dataHoraPartida = DateTime::createFromFormat("d/m/Y H:i", $dataHoraPartida);

    print_r("Data Hora Partida: ");
    print_r($dataHoraPartida->format("d/m/Y H:i"));
    print_r("\n");

    $dataHoraChegada = (string)readline("Digite a data e hora de previsao chegada (dd/mm/aaaa hh:mm): ");

    $dataHoraChegada = DateTime::createFromFormat("d/m/Y H:i", $dataHoraChegada);

    print_r("Data Hora Chegada: ");
    print_r($dataHoraChegada->format("d/m/Y H:i"));
    print_r("\n");

    // $codigo = (string)readline("Digite o codigo do voo: ");

    // // $voo = new Voo($aeroportoOrigem, $aeroportoDestino, $companhiaAerea, $aeronave, $dataHoraPartida, $dataHoraChegada, $valor);

    // $voo = new Voo($frequencia, $aeroportoOrigem, $aeroportoDestino, $aeronave, $piloto, $copiloto, $listaComissarios, $dataHoraPartida, $dataHoraChegada, $codigo);

    $voo = new Voo($frequencia, $aeroportoOrigem, $aeroportoDestino, $dataHoraPartida, $dataHoraChegada);

    // print_r($voo);

    $voo->save();

    print_r("Voo cadastrado com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verVoos()
{
    $voos = Voo::getRecords();

    mostraVoos($voos);

    print_r("\n\n");
}

function mostraVoos(array $voos)
{
    print_r("Voos cadastrados:\r\n");
    print_r("Index - Frequencia - Aeroporto Origem - Aeroporto Destino - Aeronave - Piloto - Copiloto - Comissarios - Data Hora Partida - Data Hora Chegada - Codigo\r\n");

    foreach ($voos as $voo) {
        // print_r($voo->getIndex() . " - " . $voo->getFrequencia() . " - " . $voo->getAeroportoOrigem() . " - " . $voo->getAeroportoDestino() . " - " . $voo->getAeronave() . " - " . $voo->getPiloto() . " - " . $voo->getCopiloto() . " - " . $voo->getComissarios() . " - " . $voo->getDataHoraPartida() . " - " . $voo->getDataHoraChegada() . " - " . $voo->getCodigo() . "\r\n");
        print_r($voo->getIndex() . " - " . $voo->getFrequencia() . " - " . $voo->getAeroportoOrigem() . " - " . $voo->getAeroportoDestino() . " - " . $voo->getPrevisaoPartida()->format("d/m/Y H:i") . " - " . $voo->getPrevisaoChegada()->format("d/m/Y H:i")  . " - " . $voo->getPrevisaoDuracao()->format("%H:%I:%S") . "\r\n");
    }
}

function sis_editarVoo()
{
    $voos = Voo::getRecords();

    mostraVoos($voos);

    $index = (int)readline("Digite o index do voo: ");

    $voo = $voos[$index - 1];

    $frequencia = (string)readline("Digite a frequencia do voo (1 - D, 2 - S, 3 - T, 4 - Q, 5 - Q, 6 - S, 7 - S): ");

    $frequencia = explode(",", $frequencia);

    $aeroportos = Aeroporto::getRecords();

    mostraAeroportos($aeroportos);

    $indexAeroportoOrigem = (int)readline("Digite o index do aeroporto de origem: ");

    $indexAeroportoDestino = (int)readline("Digite o index do aeroporto de destino: ");

    $aeroportoOrigem = $aeroportos[$indexAeroportoOrigem - 1]->getSigla();

    $aeroportoDestino = $aeroportos[$indexAeroportoDestino - 1]->getSigla();

    print_r("Aeroporto Origem: " . $aeroportoOrigem . "\r\n");

    print_r("Aeroporto Destino: " . $aeroportoDestino . "\r\n");

    $aeronaves = Aeronave::getRecords();

    mostraAeronaves($aeronaves);

    $indexAeronave = (int)readline("Digite o index da aeronave: ");

    $aeronave = $aeronaves[$indexAeronave - 1];

    $piloto = Piloto::getRecords();

    mostraPilotos($piloto);

    $indexPiloto = (int)readline("Digite o index do piloto: ");

    $piloto = $piloto[$indexPiloto - 1];

    $copiloto = Piloto::getRecords();

    mostraPilotos($copiloto);

    $indexCopiloto = (int)readline("Digite o index do copiloto: ");

    $copiloto = $copiloto[$indexCopiloto - 1];

    $comissario = Comissario::getRecords();

    mostraComissarios($comissario);

    $indexComissario = (int)readline("Digite o index dos comissarios: ");

    $listaIndexComissario = explode(",", $indexComissario);

    $listaComissarios = [];

    foreach ($listaIndexComissario as $index) {
        // $comissarios[] = $comissario[$index - 1];
        array_push($listaComissarios, $comissario[$index - 1]);
    }

    $dataHoraPartida = (string)readline("Digite a data e hora de previsao partida (dd/mm/aaaa hh:mm): ");

    $dataHoraPartida = DateTime::createFromFormat("d-m-Y H:i", $dataHoraPartida);

    $dataHoraChegada = (string)readline("Digite a data e hora de previsao chegada (dd/mm/aaaa hh:mm): ");

    $dataHoraChegada = DateTime::createFromFormat("d-m-Y H:i", $dataHoraChegada);

    $codigo = (string)readline("Digite o codigo do voo: ");

    $voo->setFrequencia($frequencia);

    $voo->setAeroportoOrigem($aeroportoOrigem);

    $voo->setAeroportoDestino($aeroportoDestino);

    $voo->setAeronave($aeronave);

    $voo->setPiloto($piloto);

    $voo->setCopiloto($copiloto);

    $voo->setComissarios($listaComissarios);

    $voo->setDataHoraPartida($dataHoraPartida);

    $voo->setDataHoraChegada($dataHoraChegada);

    $voo->setCodigo($codigo);

    $voo->save();

    print_r("Voo editado com sucesso!\r\n");

    print_r("\n\n");
}
