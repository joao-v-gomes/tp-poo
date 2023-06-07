<?php

include_once("../libs/global.php");

class SistemaTripulante
{

    static function cadastrarTripulante($tipoTripulante)
    {
        if ($tipoTripulante == PILOTO) {
            $tripulanteTexto = "piloto";
        } else if ($tipoTripulante == COMISSARIO) {
            $tripulanteTexto = "comissario";
        }

        $nome = (string)readline("Digite o nome do " . $tripulanteTexto . ": ");

        $sobrenome = (string)readline("Digite o sobrenome do " . $tripulanteTexto . ": ");

        $documentoIdentificacao = (string)readline("Digite o documento de identificacao do " . $tripulanteTexto . ": ");

        $cpf = (string)readline("Digite o CPF do " . $tripulanteTexto . ": ");

        $nacionalidade = (string)readline("Digite a nacionalidade do " . $tripulanteTexto . ": ");

        $dataNascimento = (string)readline("Digite a data de nascimento do " . $tripulanteTexto . ": ");

        $email = (string)readline("Digite o email do " . $tripulanteTexto . ": ");

        $cht = (string)readline("Digite o CHT do " . $tripulanteTexto . ": ");

        $endRua = (string)readline("Digite a rua do endereco do " . $tripulanteTexto . ": ");

        $endNumero = (string)readline("Digite o numero do endereco do " . $tripulanteTexto . ": ");

        $endComplemento = (string)readline("Digite o complemento do endereco do " . $tripulanteTexto . ": ");

        $endCep = (string)readline("Digite o CEP do endereco do " . $tripulanteTexto . ": ");

        $endCidade = (string)readline("Digite a cidade do endereco do " . $tripulanteTexto . ": ");

        $endEstado = (string)readline("Digite o estado do endereco do " . $tripulanteTexto . ": ");

        $endereco = new Endereco($endRua, $endNumero, $endComplemento, $endCep, $endCidade, $endEstado);

        $companhiasAereas = CompanhiaAerea::getRecords();

        SistemaCompAerea::mostraCompanhiasAereas($companhiasAereas);

        $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea a qual pertence esse " . $tripulanteTexto . ": ");

        $aeroportos = Aeroporto::getRecords();

        SistemaAeroporto::mostraAeroportos($aeroportos);

        $indexAeroporto = (int)readline("Digite o index do aeroporto a qual pertence esse " . $tripulanteTexto . ": ");

        if ($tipoTripulante == PILOTO) {
            $tripulante = new Piloto($nome, $sobrenome, $documentoIdentificacao, $cpf, $nacionalidade, $dataNascimento, $email, $cht, $endereco, $indexCompanhiaAerea, $indexAeroporto);
            $tripulante->setTipoTripulante(PILOTO);
        } else if ($tipoTripulante == COMISSARIO) {
            $tripulante = new Comissario($nome, $sobrenome, $documentoIdentificacao, $cpf, $nacionalidade, $dataNascimento, $email, $cht, $endereco, $indexCompanhiaAerea, $indexAeroporto);
            $tripulante->setTipoTripulante(COMISSARIO);
        } else {
            print_r("Tipo de tripulante invalido!\r\n");
            $tripulante = null;
        }

        return $tripulante;
    }

    static function sis_cadastrarPiloto()
    {
        $piloto = SistemaTripulante::cadastrarTripulante(PILOTO);

        if ($piloto == null) {
            print_r("Piloto nao cadastrado!\r\n");
            return;
        } else {
            // print_r("Piloto criado: \r\n");

            // print_r($piloto);

            $piloto->save();

            print_r("Piloto cadastrado com sucesso!\r\n");

            print_r("\n\n");
        }
    }

    static function sis_verPilotos()
    {
        $pilotos = Piloto::getRecords();

        // print_r("Pilotos cadastrados: \r\n");
        // print_r($pilotos);

        if (count($pilotos) == 0) {
            print_r("Nenhum piloto cadastrado!\r\n");
            return;
        }

        SistemaTripulante::mostraPilotos($pilotos);

        print_r("\n\n");
    }

    static function mostraPilotos(array $pilotos)
    {
        print_r("Pilotos cadastrados: \r\n");
        print_r("Index | Nome | Sobrenome | Documento Identificacao | CPF | Nacionalidade | Data Nascimento | Email | CHT | Endereco | Companhia Aerea | Aeroporto \r\n");

        foreach ($pilotos as $piloto) {

            $companhiaAereaPiloto = "";
            $aeroportoBasePiloto = "";

            if ($piloto->getCompanhiaAerea() == null) {
                $companhiaAereaPiloto = "null";
            } else {
                $companhiaAereaPiloto = $piloto->getCompanhiaAerea();
            }

            if ($piloto->getAeroportoBase() == null) {
                $aeroportoBasePiloto = "null";
            } else {
                $aeroportoBasePiloto = $piloto->getAeroportoBase();
            }

            print_r($piloto->getIndex() . " | " . $piloto->getNome() . " | " . $piloto->getSobrenome() . " | " . $piloto->getDocumentoIdentificacao() . " | " . $piloto->getCpf() . " | " . $piloto->getNacionalidade() . " | " . $piloto->getDataNascimento() . " | " . $piloto->getEmail() . " | " . $piloto->getCht() . " | " . $piloto->getEndereco()->getEndCompleto() . " | " . $companhiaAereaPiloto . " | " . $aeroportoBasePiloto . "\r\n");
        }
    }

    static function sis_editarPiloto()
    {
        $pilotos = Piloto::getRecords();

        if (count($pilotos) == 0) {
            print_r("Nenhum piloto cadastrado!\r\n");
            return;
        }

        SistemaTripulante::mostraPilotos($pilotos);

        $indexPiloto = (int)readline("Digite o index do piloto que deseja editar: ");

        $piloto = $pilotos[$indexPiloto - 1];

        $novoPiloto = SistemaTripulante::cadastrarTripulante(PILOTO);

        if ($novoPiloto == null) {
            print_r("Piloto nao editado!\r\n");
            return;
        } else {
            $piloto->alterarTripulante($novoPiloto);
        }

        $piloto->save();

        print_r("Piloto editado com sucesso!\r\n");

        print_r("\n\n");
    }

    static function sis_CadastrarComissario()
    {
        $comissario = SistemaTripulante::cadastrarTripulante(COMISSARIO);

        if ($comissario == null) {
            print_r("Comissario nao cadastrado!\r\n");
            return;
        } else {
            $comissario->save();

            print_r("Comissario cadastrado com sucesso!\r\n");

            print_r("\n\n");
        }
    }

    static function sis_verComissarios()
    {
        $comissarios = Comissario::getRecords();

        if (count($comissarios) == 0) {
            print_r("Nenhum comissario cadastrado!\r\n");
            return;
        }

        SistemaTripulante::mostraComissarios($comissarios);

        print_r("\n\n");
    }

    static function mostraComissarios(array $comissarios)
    {
        print_r("Comissarios cadastrados: \r\n");
        print_r("Index | Nome | Sobrenome | Documento Identificacao | CPF | Nacionalidade | Data Nascimento | Email | Endereco | Companhia Aerea | Aeroporto \r\n");

        foreach ($comissarios as $comissario) {

            $companhiaAereaComissario = "";
            $aeroportoBaseComissario = "";

            if ($comissario->getCompanhiaAerea() == null) {
                $companhiaAereaComissario = "null";
            } else {
                $companhiaAereaComissario = $comissario->getCompanhiaAerea();
            }

            if ($comissario->getAeroportoBase() == null) {
                $aeroportoBaseComissario = "null";
            } else {
                $aeroportoBaseComissario = $comissario->getAeroportoBase();
            }


            print_r($comissario->getIndex() . " | " . $comissario->getNome() . " | " . $comissario->getSobrenome() . " | " . $comissario->getDocumentoIdentificacao() . " | " . $comissario->getCpf() . " | " . $comissario->getNacionalidade() . " | " . $comissario->getDataNascimento() . " | " . $comissario->getEmail() . " | " . $comissario->getEndereco()->getEndCompleto() . " | " . $companhiaAereaComissario . " | " . $aeroportoBaseComissario . "\r\n");
        }
    }

    static function sis_editarComissario()
    {
        $comissarios = Comissario::getRecords();

        if (count($comissarios) == 0) {
            print_r("Nenhum comissario cadastrado!\r\n");
            return;
        }

        SistemaTripulante::mostraPilotos($comissarios);

        $indexComissario = (int)readline("Digite o index do comissario que deseja editar: ");

        $comissario = $comissarios[$indexComissario - 1];

        $novoComissario = SistemaTripulante::cadastrarTripulante(COMISSARIO);

        if ($novoComissario == null) {
            print_r("Comissario nao editado!\r\n");
            return;
        } else {
            $comissario->alterarTripulante($novoComissario);
        }

        $comissario->save();

        print_r("Comissario editado com sucesso!\r\n");

        print_r("\n\n");
    }
}
