<?php

include_once("../libs/global.php");

class SistemaVeiculo
{

    static function sis_CadastrarVeiculo()
    {
        $codigo = (string)readline("Digite o codigo do veiculo: ");
        $placa = (string)readline("Digite a placa do veiculo: ");
        $qtdeAssentos = (int)readline("Digite a quantidade de assentos do veiculo: ");

        $veiculo = new Veiculo($codigo, $placa, $qtdeAssentos);

        $veiculo->save();

        print_r("Veiculo cadastrado com sucesso!\r\n");

        print_r("\n\n");
    }

    static function sis_verVeiculos()
    {
        $veiculos = Veiculo::getRecords();

        if (count($veiculos) == 0) {
            print_r("Nenhum veiculo cadastrado!\r\n");
            print_r("\n\n");
            return;
        } else {
            SistemaVeiculo::mostraVeiculos($veiculos);

            print_r("\n\n");
        }
    }

    static function mostraVeiculos(array $veiculos)
    {
        print_r("Veiculos cadastrados:\r\n");
        print_r("Index - Codigo - Placa - Quantidade de assentos - Horario Previsto Embarque - Comp. Aerea\r\n");

        foreach ($veiculos as $veiculo) {

            $companhiasAereaVeiculo = "";
            $horarioEmbarquePrevisto = "";

            if ($veiculo->getCompAereaPertencente() == null)
                $companhiasAereaVeiculo = "null";
            else {
                $companhiasAereaVeiculo = $veiculo->getCompAereaPertencente();
            }

            if ($veiculo->getHorarioEmbarquePrevisto() == null)
                $horarioEmbarquePrevisto = "null";
            else {
                $horarioEmbarquePrevisto = $veiculo->getHorarioEmbarquePrevisto()->format("d/m/Y H:i");
            }



            print_r($veiculo->getIndex() . " - " . $veiculo->getCodigo() . " - " . $veiculo->getPlaca() . " - " . $veiculo->getQtdeAssentos() . " - " . $horarioEmbarquePrevisto . " - " . $companhiasAereaVeiculo . "\r\n");
        }
    }

    static function sis_editarVeiculo()
    {
        $veiculos = Veiculo::getRecords();

        if (count($veiculos) == 0) {
            print_r("Nenhum veiculo cadastrado!\r\n");
            print_r("\n\n");
            return;
        }

        SistemaVeiculo::mostraVeiculos($veiculos);

        $indexVeiculo = (int)readline("Digite o index do veiculo: ");

        $veiculo = $veiculos[$indexVeiculo - 1];

        $codigo = (string)readline("Digite o codigo do veiculo: ");
        $placa = (string)readline("Digite a placa do veiculo: ");
        $qtdeAssentos = (int)readline("Digite a quantidade de assentos do veiculo: ");

        $dataHoraEmbarque = (string)readline("Digite a data e hora previstas para o embarque (dd/mm/aaaa hh:mm): ");

        if ($dataHoraEmbarque != null) {
            $dataHoraEmbarque = DateTime::createFromFormat("d/m/Y H:i", $dataHoraEmbarque);
        } else {
            $dataHoraEmbarque = null;
        }

        $companhiasAereas = CompanhiaAerea::getRecords();

        SistemaCompAerea::mostraCompanhiasAereas($companhiasAereas);

        $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea a qual pertence esse veiculo: ");

        $veiculoNovo = new Veiculo($codigo, $placa, $qtdeAssentos);

        $veiculo->alteraVeiculo($veiculoNovo);
        $veiculo->setHorarioEmbarquePrevisto($dataHoraEmbarque);
        $veiculo->setCompAereaPertencente($indexCompanhiaAerea);

        $veiculo->save();

        print_r("Veiculo editado com sucesso!\r\n");

        print_r("\n\n");
    }

    static function sis_conectarVeiculoAViagem()
    {
        $viagens = Viagem::getRecords();

        if (count($viagens) == 0) {
            print_r("Nenhuma viagem cadastrada!\r\n");
            print_r("\n\n");
            return;
        }

        mostra_Viagem($viagens);

        $indexViagem = (int)readline("Digite o index da viagem: ");

        $viagem = $viagens[$indexViagem - 1];



        $veiculos = Veiculo::getRecords();

        if (count($veiculos) == 0) {
            print_r("Nenhum veiculo cadastrado!\r\n");
            print_r("\n\n");
            return;
        }

        SistemaVeiculo::mostraVeiculos($veiculos);

        $indexVeiculo = (int)readline("Digite o index do veiculo: ");

        $veiculo = $veiculos[$indexVeiculo - 1];



        $indexVooDaViagem = $viagem->getVoo();

        // print_r("Voo da viagem: " . $indexVooDaViagem . "\r\n");

        $vooDaViagem = Voo::getRecordsByField("index", $indexVooDaViagem);

        $vooDaViagem = $vooDaViagem[0];



        $indexAeroportoOrigem = $vooDaViagem->getAeroportoOrigem();

        $aeroportoOrigem = Aeroporto::getRecordsByField("index", $indexAeroportoOrigem);

        $aeroportoOrigem = $aeroportoOrigem[0];

        $enderecoAeroportoOrigem = $aeroportoOrigem->getEndereco();



        $indexTripulantesViagem = $vooDaViagem->getListaTripulantesDoVoo();

        // print_r("Tripulantes da viagem:\r\n");

        // print_r($indexTripulantesViagem);

        $indexPilotoCopiloto = $indexTripulantesViagem[0];

        $indexComissarios = $indexTripulantesViagem[1];

        // print_r("Pilotos: \r\n");

        // print_r($indexPilotoCopiloto);

        // print_r("Comissarios: \r\n");

        // print_r($indexComissarios);

        $listaEnderecoAeroportoETripulantes = array();

        $listaEnderecoAeroportoETripulantes[] = $enderecoAeroportoOrigem;

        foreach ($indexPilotoCopiloto as $index) {
            $pilotoCopiloto = Piloto::getRecordsByField("index", $index);

            $pilotoCopiloto = $pilotoCopiloto[0];

            print_r($pilotoCopiloto);

            $listaEnderecoAeroportoETripulantes[] = $pilotoCopiloto->getEndereco();
        }

        foreach ($indexComissarios as $index) {
            $comissario = Comissario::getRecordsByField("index", $index);

            $comissario = $comissario[0];

            print_r($comissario);

            $listaEnderecoAeroportoETripulantes[] = $comissario->getEndereco();
        }

        print_r($listaEnderecoAeroportoETripulantes);

        // foreach ($tripulantesViagem as $tripulante) {
        //     print_r($tripulante->getNome() . "\r\n");
        // }
    }
}
