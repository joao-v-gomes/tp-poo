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

    $novoAeroporto = new Aeroporto($sigla, $cidade, $estado);

    $aeroporto->alterarAeroporto($novoAeroporto);

    $aeroporto->save();

    print_r("Aeroporto editado com sucesso!\r\n");

    print_r("\n\n");
}

function sis_conectarCompanhiaAereaEmAeroporto()
{

    $companhiasAereas = CompanhiaAerea::getRecords();

    if (count($companhiasAereas) == 0) {
        print_r("Nenhuma companhia aerea cadastrada!\r\n");
        // print_r("Cadastre uma companhia aerea antes de conectar com um aeroporto!\r\n");
        // print_r("\n\n");
        return;
    }

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    $aeroportos = Aeroporto::getRecords();

    if (count($aeroportos) == 0) {
        print_r("Nenhum aeroporto cadastrado!\r\n");
        // print_r("Cadastre um aeroporto antes de conectar com uma companhia aerea!\r\n");
        // print_r("\n\n");
        return;
    }

    mostraAeroportos($aeroportos);

    $indexAeroporto = (int)readline("Digite o index do aeroporto: ");

    $aeroporto = $aeroportos[$indexAeroporto - 1];

    // print_r("Aeroporto selecionado: " . $aeroporto);

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

    $listaDeIndexDasCompanihasAereasDoAeroporto = $aeroporto->getListaCompanhiasAereas();

    // print_r("Companhias Aereas cadastradas no aeroporto:\r\n");
    // print_r($indexCompanhiasAereas);

    $companhiasAereasDoAeroporto = array();

    foreach ($listaDeIndexDasCompanihasAereasDoAeroporto as $indexCompanhiaAerea) {
        $compAerea = CompanhiaAerea::getRecordsByField('index', $indexCompanhiaAerea);
        array_push($companhiasAereasDoAeroporto, $compAerea[0]);
    }

    if (count($companhiasAereasDoAeroporto) == 0) {
        print_r("Nenhuma companhia aerea cadastrada no aeroporto!\r\n");
        print_r("\n\n");
        return;
    }

    mostraCompanhiasAereas($companhiasAereasDoAeroporto);

    print_r("\n\n");
}

function sis_verVoosEmAeroporto()
{
    print_r("Em desenvolvimento!\r\n");
    // $aeroportos = Aeroporto::getRecords();

    // mostraAeroportos($aeroportos);

    // $indexAeroporto = (int)readline("Digite o index do aeroporto: ");

    // print_r("\n\n");

    // $aeroporto = $aeroportos[$indexAeroporto - 1];

    // // print_r("Aeroporto selecionado: " . $aeroporto);

    // $listaDeIndexDosVoosDoAeroporto = $aeroporto->getVoos();

    // // print_r("Companhias Aereas cadastradas no aeroporto:\r\n");
    // // print_r($indexCompanhiasAereas);

    // $voosDoAeroporto = array();

    // foreach ($listaDeIndexDosVoosDoAeroporto as $indexVoo) {
    //     $voo = Voo::getRecordsByField('index', $indexVoo);
    //     array_push($voosDoAeroporto, $voo[0]);
    // }

    // mostraVoos($voosDoAeroporto);

    // print_r("\n\n");
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

    $aeroportoOrigem = $aeroportos[$indexAeroportoOrigem - 1]->getIndex();
    $aeroportoDestino = $aeroportos[$indexAeroportoDestino - 1]->getIndex();

    print_r("Aeroporto Origem: " . $aeroportoOrigem . "\r\n");
    print_r("Aeroporto Destino: " . $aeroportoDestino . "\r\n");

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

    $voo = new Voo($frequencia, $aeroportoOrigem, $aeroportoDestino, $dataHoraPartida, $dataHoraChegada);

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
    print_r("Index - Frequencia - Aeroporto Origem - Aeroporto Destino - Registro Aeronave - Piloto - Copiloto - Comissarios - Previsao Partida - Previsao Chegada - Previsao Duracao - Codigo Voo\r\n");

    foreach ($voos as $voo) {

        $aeronaveVoo = "";

        $voo->getAeronave() == null ? $aeronaveVoo = "null" : $aeronaveVoo = $voo->getAeronave()->getRegistro();

        print_r($voo->getIndex() . " - " . $voo->getFrequenciaString() . " - " . $voo->getAeroportoOrigem() . " - " . $voo->getAeroportoDestino() . " - " . $aeronaveVoo  . " - " . $voo->getPiloto() . " - " . $voo->getCopiloto() . " - " . $voo->getListaComissariosString() . " - " . $voo->getPrevisaoPartida()->format("d/m/Y H:i") . " - " . $voo->getPrevisaoChegada()->format("d/m/Y H:i") . " - " . $voo->getPrevisaoDuracao()->format("%H:%I") . " - " . $voo->getCodigoVoo() . "\r\n");
        // print_r($voo->getIndex() . " - " . $voo->getFrequenciaString() . " - " . $voo->getAeroportoOrigem() . " - " . $voo->getAeroportoDestino() . " - " . $voo->getPrevisaoPartida()->format("d/m/Y H:i") . " - " . $voo->getPrevisaoChegada()->format("d/m/Y H:i")  . " - " . $voo->getPrevisaoDuracao()->format("%H:%I:%S") . "\r\n");
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

    $aeroportoOrigem = $aeroportos[$indexAeroportoOrigem - 1];

    $aeroportoDestino = $aeroportos[$indexAeroportoDestino - 1];

    $indexAeroportoOrigem = $aeroportoOrigem->getIndex();
    $indexAeroportoDestino = $aeroportoDestino->getIndex();

    print_r("Aeroporto Origem: " . $indexAeroportoOrigem . "\r\n");

    print_r("Aeroporto Destino: " . $indexAeroportoDestino . "\r\n");

    $indexCompanhiasAereasAeroportoOrigem = $aeroportoOrigem->getListaCompanhiasAereas();

    // print_r("Companhias Aereas Aeroporto Origem: \r\n");
    // print_r($indexCompanhiasAereasAeroportoOrigem);

    $companhiasAereas = array();

    foreach ($indexCompanhiasAereasAeroportoOrigem as $companhiaAerea) {
        // $companhiasAereas[] = $companhiaAerea->getNome();
        $compAerea = CompanhiaAerea::getRecordsByField('index', $companhiaAerea);
        array_push($companhiasAereas, $compAerea[0]);
    }

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    // $companhiaAerea = $companhiasAereas[$indexCompanhiaAerea - 1];

    $aeronaves = Aeronave::getRecordsByField('compAereaPertencente', $indexCompanhiaAerea);

    mostraAeronaves($aeronaves);

    $indexAeronave = (int)readline("Digite o index da aeronave: ");

    // $aeronave = $aeronaves[$indexAeronave - 1];

    $aeronave = Aeronave::getRecordsByField('index', $indexAeronave);

    $aeronave = $aeronave[0];

    $pilotos = Piloto::getRecordsByField('companhiaAerea', $indexCompanhiaAerea);

    mostraPilotos($pilotos);

    $indexPiloto = (int)readline("Digite o index do piloto: ");

    // $piloto = $piloto[$indexPiloto - 1];

    $copilotos = Piloto::getRecordsByField('companhiaAerea', $indexCompanhiaAerea);

    // foreach ($copilotos as &$copiloto) {
    //     if ($copiloto->getIndex() == $indexPiloto) {
    //         unset($copiloto);
    //     }
    // }

    mostraPilotos($copilotos);

    $indexCopiloto = (int)readline("Digite o index do copiloto: ");

    // $copiloto = $copiloto[$indexCopiloto - 1];

    $comissario = Comissario::getRecordsByField('companhiaAerea', $indexCompanhiaAerea);

    mostraComissarios($comissario);

    $indexComissario = (int)readline("Digite o index dos comissarios: ");

    $listaIndexComissario = explode(",", $indexComissario);

    // $listaComissarios = [];

    // foreach ($listaIndexComissario as $index) {
    //     // $comissarios[] = $comissario[$index - 1];
    //     array_push($listaComissarios, $comissario[$index - 1]);
    // }

    $previsaoPartida = (string)readline("Digite a data e hora de previsao partida (dd/mm/aaaa hh:mm): ");

    $previsaoPartida = DateTime::createFromFormat("d/m/Y H:i", $previsaoPartida);

    $previsaoChegada = (string)readline("Digite a data e hora de previsao chegada (dd/mm/aaaa hh:mm): ");

    $previsaoChegada = DateTime::createFromFormat("d/m/Y H:i", $previsaoChegada);

    $codigoVoo = (string)readline("Digite o codigo do voo: ");

    // $novoVoo = Voo::criarVooCompleto($frequencia, $aeroportoOrigem, $aeroportoDestino, $aeronave, $piloto, $copiloto, $listaComissarios, $dataHoraPartida, $dataHoraChegada, $codigo);

    $novoVoo = Voo::criarVooCompleto($frequencia, $indexAeroportoOrigem, $indexAeroportoDestino, $previsaoPartida, $previsaoChegada, $indexCompanhiaAerea, $aeronave, $indexPiloto, $indexCopiloto, $listaIndexComissario, $codigoVoo);

    if ($novoVoo == null) {
        print_r("Voo não pode ser editado!!\r\n");
        return;
    } else {

        $voo->alterarVoo($novoVoo);

        $voo->save();

        print_r("Voo editado com sucesso!\r\n");
    }

    print_r("\n\n");
}
