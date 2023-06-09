<?php

class SistemaVoo
{

    static function cadastrarVooSimples()
    {
        $frequencia = (string)readline("Digite a frequencia do voo (1 - D, 2 - S, 3 - T, 4 - Q, 5 - Q, 6 - S, 7 - S) (e.g. 2,3,4): ");

        $frequencia = explode(",", $frequencia);

        // print_r("Freq: ");
        // print_r($frequencia);

        $aeroportos = Aeroporto::getRecords();

        SistemaAeroporto::mostraAeroportos($aeroportos);

        $indexAeroportoOrigem = (int)readline("Digite o index do aeroporto de origem: ");
        $indexAeroportoDestino = (int)readline("Digite o index do aeroporto de destino: ");

        $aeroportoOrigem = $aeroportos[$indexAeroportoOrigem - 1]->getIndex();
        $aeroportoDestino = $aeroportos[$indexAeroportoDestino - 1]->getIndex();

        // print_r("Aeroporto Origem: " . $aeroportoOrigem . "\r\n");
        // print_r("Aeroporto Destino: " . $aeroportoDestino . "\r\n");

        $dataHoraPartida = (string)readline("Digite a data e hora de previsao partida (hh:mm): ");

        $dataHoraPartida = DateTime::createFromFormat("H:i", $dataHoraPartida);

        // print_r("Data Hora Partida: ");
        // print_r($dataHoraPartida->format("d/m/Y H:i"));
        // print_r("\n");

        // $dataHoraChegada = (string)readline("Digite a data e hora de previsao chegada (hh:mm): ");

        // $dataHoraChegada = DateTime::createFromFormat("H:i", $dataHoraChegada);

        // print_r("Data Hora Chegada: ");
        // print_r($dataHoraChegada->format("d/m/Y H:i"));
        // print_r("\n");

        $novoVoo = new Voo($frequencia, $aeroportoOrigem, $aeroportoDestino, $dataHoraPartida);

        return $novoVoo;
    }

    static function sis_cadastrarVooSimples()
    {
        $voo = SistemaVoo::cadastrarVooSimples();

        $voo->save();

        print_r("Voo cadastrado com sucesso!\r\n");

        print_r("\n\n");
    }

    static function cadastrarVooCompleto()
    {
        $frequencia = (string)readline("Digite a frequencia do voo (1 - D, 2 - S, 3 - T, 4 - Q, 5 - Q, 6 - S, 7 - S)(e.g. 2,3,4): ");

        $frequencia = explode(",", $frequencia);

        $aeroportos = Aeroporto::getRecords();

        SistemaAeroporto::mostraAeroportos($aeroportos);

        $indexAeroportoOrigem = (int)readline("Digite o index do aeroporto de origem: ");

        $indexAeroportoDestino = (int)readline("Digite o index do aeroporto de destino: ");

        $aeroportoOrigem = $aeroportos[$indexAeroportoOrigem - 1];

        $aeroportoDestino = $aeroportos[$indexAeroportoDestino - 1];

        $indexAeroportoOrigem = $aeroportoOrigem->getIndex();
        $indexAeroportoDestino = $aeroportoDestino->getIndex();

        $previsaoPartida = (string)readline("Digite a hora de previsao partida (hh:mm): ");

        $previsaoPartida = DateTime::createFromFormat("H:i", $previsaoPartida);

        // print_r("Aeroporto Origem: " . $indexAeroportoOrigem . "\r\n");

        // print_r("Aeroporto Destino: " . $indexAeroportoDestino . "\r\n");

        $indexCompanhiasAereasAeroportoOrigem = $aeroportoOrigem->getListaCompanhiasAereasArray();

        // print_r("Companhias Aereas Aeroporto Origem: \r\n");
        // print_r($indexCompanhiasAereasAeroportoOrigem);

        $companhiasAereas = array();

        foreach ($indexCompanhiasAereasAeroportoOrigem as $companhiaAerea) {
            // $companhiasAereas[] = $companhiaAerea->getNome();
            $compAerea = CompanhiaAerea::getRecordsByField('index', $companhiaAerea);
            array_push($companhiasAereas, $compAerea[0]);
        }

        SistemaCompAerea::mostraCompanhiasAereas($companhiasAereas);

        $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

        // $companhiaAerea = $companhiasAereas[$indexCompanhiaAerea - 1];

        $aeronaves = Aeronave::getRecordsByField('compAereaPertencente', $indexCompanhiaAerea);

        SistemaAeronave::mostraAeronaves($aeronaves);

        $indexAeronave = (int)readline("Digite o index da aeronave: ");

        // $aeronave = $aeronaves[$indexAeronave - 1];

        if ($indexAeronave != null) {
            $aeronave = Aeronave::getRecordsByField('index', $indexAeronave);

            $aeronave = $aeronave[0];
        } else {
            $aeronave = null;
        }

        $pilotos = Piloto::getRecordsByField('companhiaAerea', $indexCompanhiaAerea);

        SistemaTripulante::mostraPilotos($pilotos);

        $indexPiloto = (int)readline("Digite o index do piloto: ");

        // $piloto = $piloto[$indexPiloto - 1];

        $copilotos = Piloto::getRecordsByField('companhiaAerea', $indexCompanhiaAerea);

        // foreach ($copilotos as &$copiloto) {
        //     if ($copiloto->getIndex() == $indexPiloto) {
        //         unset($copiloto);
        //     }
        // }

        SistemaTripulante::mostraPilotos($copilotos);

        $indexCopiloto = (int)readline("Digite o index do copiloto: ");

        // $copiloto = $copiloto[$indexCopiloto - 1];

        $comissario = Comissario::getRecordsByField('companhiaAerea', $indexCompanhiaAerea);

        SistemaTripulante::mostraComissarios($comissario);

        $indexComissario = (int)readline("Digite o index dos comissarios: ");

        $listaIndexComissario = explode(",", $indexComissario);

        // $listaComissarios = [];

        // foreach ($listaIndexComissario as $index) {
        //     // $comissarios[] = $comissario[$index - 1];
        //     array_push($listaComissarios, $comissario[$index - 1]);
        // }

        // $previsaoChegada = (string)readline("Digite a hora de previsao chegada (hh:mm): ");

        // $previsaoChegada = DateTime::createFromFormat("H:i", $previsaoChegada);

        $codigoVoo = (string)readline("Digite o codigo do voo: ");

        // $novoVoo = Voo::criarVooCompleto($frequencia, $aeroportoOrigem, $aeroportoDestino, $aeronave, $piloto, $copiloto, $listaComissarios, $dataHoraPartida, $dataHoraChegada, $codigo);

        $novoVoo = Voo::criarVooCompleto($frequencia, $indexAeroportoOrigem, $indexAeroportoDestino, $previsaoPartida, $indexCompanhiaAerea, $aeronave, $indexPiloto, $indexCopiloto, $listaIndexComissario, $codigoVoo);

        return $novoVoo;
    }

    static function sis_cadastrarVooCompleto()
    {
        $voo = SistemaVoo::cadastrarVooCompleto();

        if ($voo == null) {
            print_r("Voo não pode ser criado!!\r\n");
            return;
        } else {

            $voo->save();

            print_r("Voo criado com sucesso!\r\n");
        }

        print_r("\n\n");
    }

    static function sis_verVoos()
    {
        $voos = Voo::getRecords();

        if (count($voos) == 0) {
            print_r("Nenhum voo cadastrado!\r\n");
            print_r("\n\n");
            return;
        }

        SistemaVoo::mostraVoos($voos);

        print_r("\n\n");
    }

    static function mostraVoos(array $voos)
    {
        print_r("Voos cadastrados:\r\n");
        print_r("Index - Frequencia - Aeroporto Origem - Aeroporto Destino - Comp Aerea - Registro Aeronave - Piloto - Copiloto - Comissarios - Previsao Partida - Codigo Voo\r\n");

        foreach ($voos as $voo) {

            $compAereaVoo = "";
            $aeronaveVoo = "";
            $pilotoVoo = "";
            $copilotoVoo = "";
            $comissariosVoo = "";
            $codigoVoo = "";

            if ($voo->getCompanhiaAerea() == null) {
                $compAereaVoo = "null";
            } else {
                $compAereaVoo = $voo->getCompanhiaAerea();
            }

            if ($voo->getAeronave() == null) {
                $aeronaveVoo = "null";
            } else {
                $aeronaveVoo = $voo->getAeronave()->getRegistro();
            }

            if ($voo->getPiloto() == null) {
                $pilotoVoo = "null";
            } else {
                $pilotoVoo = $voo->getPiloto();
            }

            if ($voo->getCopiloto() == null) {
                $copilotoVoo = "null";
            } else {
                $copilotoVoo = $voo->getCopiloto();
            }

            if ($voo->getListaComissariosArray() == null) {
                $comissariosVoo = "null";
            } else {
                $comissariosVoo = $voo->getListaComissariosString();
            }

            if ($voo->getCodigoVoo() == null) {
                $codigoVoo = "null";
            } else {
                $codigoVoo = $voo->getCodigoVoo();
            }

            print_r($voo->getIndex() . " - " . $voo->getFrequenciaString() . " - " . $voo->getAeroportoOrigem() . " - " . $voo->getAeroportoDestino() . " - " . $compAereaVoo . " - " . $aeronaveVoo  . " - " . $pilotoVoo . " - " . $copilotoVoo . " - " . $comissariosVoo . " - " . $voo->getPrevisaoPartida()->format("H:i") . " - " . $codigoVoo . "\r\n");
            // print_r($voo->getIndex() . " - " . $voo->getFrequenciaString() . " - " . $voo->getAeroportoOrigem() . " - " . $voo->getAeroportoDestino() . " - " . $voo->getPrevisaoPartida()->format("d/m/Y H:i") . " - " . $voo->getPrevisaoChegada()->format("d/m/Y H:i")  . " - " . $voo->getPrevisaoDuracao()->format("%H:%I:%S") . "\r\n");
        }
    }

    static function sis_editarVoo()
    {
        $voos = Voo::getRecords();

        if (count($voos) == 0) {
            print_r("Nenhum voo cadastrado!\r\n");
            print_r("\n\n");
            return;
        }

        SistemaVoo::mostraVoos($voos);

        $index = (int)readline("Digite o index do voo: ");

        $voo = $voos[$index - 1];

        $novoVoo = SistemaVoo::cadastrarVooCompleto();

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

    static function sis_conectarCompanhiaAereaEmVoo()
    {
        $voos = Voo::getRecordsByField("companhiaAerea", null);

        if (count($voos) == 0) {
            print_r("Não há voos cadastrados!\r\n");
            return;
        }

        SistemaVoo::mostraVoos($voos);

        $indexVoo = (int)readline("Digite o index do voo: ");

        $voo = $voos[$indexVoo - 1];

        $aeroportoOrigemVoo = $voo->getAeroportoOrigem();

        $aeroportoVoo = Aeroporto::getRecordsByField('index', $aeroportoOrigemVoo);

        $aeroportoVoo = $aeroportoVoo[0];

        $listaDeIndexDasCompanihasAereasDoAeroporto = $aeroportoVoo->getListaCompanhiasAereas();

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

        SistemaCompAerea::mostraCompanhiasAereas($companhiasAereasDoAeroporto);

        $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

        // $companhiaAerea = CompanhiaAerea::getRecordsByField('index', $indexCompanhiaAerea);

        // $companhiaAerea = $companhiaAerea[0];

        $aeronaves = Aeronave::getRecordsByField('compAereaPertencente', $indexCompanhiaAerea);

        SistemaAeronave::mostraAeronaves($aeronaves);

        $indexAeronave = (int)readline("Digite o index da aeronave: ");

        // $aeronave = $aeronaves[$indexAeronave - 1];

        $aeronave = Aeronave::getRecordsByField('index', $indexAeronave);

        $aeronave = $aeronave[0];

        $pilotos = Piloto::getRecordsByField('companhiaAerea', $indexCompanhiaAerea);

        SistemaTripulante::mostraPilotos($pilotos);

        $indexPiloto = (int)readline("Digite o index do piloto: ");

        // $piloto = $piloto[$indexPiloto - 1];

        $copilotos = Piloto::getRecordsByField('companhiaAerea', $indexCompanhiaAerea);

        // foreach ($copilotos as &$copiloto) {
        //     if ($copiloto->getIndex() == $indexPiloto) {
        //         unset($copiloto);
        //     }
        // }

        SistemaTripulante::mostraPilotos($copilotos);

        $indexCopiloto = (int)readline("Digite o index do copiloto: ");

        // $copiloto = $copiloto[$indexCopiloto - 1];

        $comissario = Comissario::getRecordsByField('companhiaAerea', $indexCompanhiaAerea);

        SistemaTripulante::mostraComissarios($comissario);

        $indexComissario = (int)readline("Digite o index dos comissarios: ");

        $listaIndexComissario = explode(",", $indexComissario);

        $codigoVoo = (string)readline("Digite o codigo do voo: ");

        $novoVooCompleto = Voo::criarVooCompleto($voo->getFrequenciaArray(), $voo->getAeroportoOrigem(), $voo->getAeroportoDestino(), $voo->getPrevisaoPartida(), $indexCompanhiaAerea, $aeronave, $indexPiloto, $indexCopiloto, $listaIndexComissario, $codigoVoo);

        if ($novoVooCompleto == null) {
            print_r("Não foi possivel realizar conectar a Comp aerea!!\r\n");
            return;
        } else {

            $voo->alterarVoo($novoVooCompleto);

            $voo->save();
        }

        print_r("Conexão de Comp Aerea com voo realizada com sucesso!\r\n");

        print_r("\n\n");
    }
}
