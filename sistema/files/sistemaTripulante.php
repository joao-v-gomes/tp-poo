<?php

include_once("../libs/global.php");

function cadastrarTripulante($tipoTripulante)
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

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea a qual pertence esse " . $tripulanteTexto . ": ");

    // $companhiaAerea = $companhiasAereas[$indexCompanhiaAerea - 1];

    // print_r("Companhia Aerea selecionada: " . $companhiaAerea);

    $aeroportos = Aeroporto::getRecords();

    mostraAeroportos($aeroportos);

    $indexAeroporto = (int)readline("Digite o index do aeroporto a qual pertence esse " . $tripulanteTexto . ": ");

    // $aeroporto = $aeroportos[$indexAeroporto - 1];

    // print_r("Aeroporto selecionado: " . $aeroporto);

    if ($tipoTripulante == PILOTO) {
        $tripulante = new Piloto($tipoTripulante, $nome, $sobrenome, $documentoIdentificacao, $cpf, $nacionalidade, $dataNascimento, $email, $cht, $endereco, $indexCompanhiaAerea, $indexAeroporto);
    } else if ($tipoTripulante == COMISSARIO) {
        $tripulante = new Comissario($tipoTripulante, $nome, $sobrenome, $documentoIdentificacao, $cpf, $nacionalidade, $dataNascimento, $email, $cht, $endereco, $indexCompanhiaAerea, $indexAeroporto);
    } else {
        print_r("Tipo de tripulante invalido!\r\n");
        $tripulante = null;
    }

    return $tripulante;
}

function sis_cadastrarPiloto()
{
    $piloto = cadastrarTripulante(PILOTO);

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

function sis_verPilotos()
{
    $pilotos = Piloto::getRecords();

    // print_r("Pilotos cadastrados: \r\n");
    // print_r($pilotos);

    mostraPilotos($pilotos);

    print_r("\n\n");
}

function mostraPilotos(array $pilotos)
{
    print_r("Pilotos cadastrados: \r\n");
    print_r("Index | Nome | Sobrenome | Documento Identificacao | CPF | Nacionalidade | Data Nascimento | Email | CHT | Endereco | Companhia Aerea | Aeroporto \r\n");

    foreach ($pilotos as $piloto) {
        print_r($piloto->getIndex() . " | " . $piloto->getNome() . " | " . $piloto->getSobrenome() . " | " . $piloto->getDocumentoIdentificacao() . " | " . $piloto->getCpf() . " | " . $piloto->getNacionalidade() . " | " . $piloto->getDataNascimento() . " | " . $piloto->getEmail() . " | " . $piloto->getCht() . " | " . $piloto->getEndereco()->getEndCompleto() . " | " . $piloto->getCompanhiaAerea() . " | " . $piloto->getAeroportoBase() . "\r\n");
    }
}

function sis_editarPiloto()
{
    $pilotos = Piloto::getRecords();

    mostraPilotos($pilotos);

    $indexPiloto = (int)readline("Digite o index do piloto que deseja editar: ");

    $piloto = $pilotos[$indexPiloto - 1];

    // print_r("Piloto selecionado: " . $piloto);

    $nome = (string)readline("Digite o nome do piloto: ");

    $sobrenome = (string)readline("Digite o sobrenome do piloto: ");

    $documentoIdentificacao = (string)readline("Digite o documento de identificacao do piloto: ");

    $cpf = (string)readline("Digite o CPF do piloto: ");

    $nacionalidade = (string)readline("Digite a nacionalidade do piloto: ");

    $dataNascimento = (string)readline("Digite a data de nascimento do piloto: ");

    $email = (string)readline("Digite o email do piloto: ");

    $cht = (string)readline("Digite o CHT do piloto: ");

    $endRua = (string)readline("Digite a rua do endereco do piloto: ");

    $endNumero = (string)readline("Digite o numero do endereco do piloto: ");

    $endComplemento = (string)readline("Digite o complemento do endereco do piloto: ");

    $endCep = (string)readline("Digite o CEP do endereco do piloto: ");

    $endCidade = (string)readline("Digite a cidade do endereco do piloto: ");

    $endEstado = (string)readline("Digite o estado do endereco do piloto: ");

    $endereco = new Endereco($endRua, $endNumero, $endComplemento, $endCep, $endCidade, $endEstado);

    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea a qual pertence esse piloto: ");

    // $companhiaAerea = $companhiasAereas[$indexCompanhiaAerea - 1];

    // print_r("Companhia Aerea selecionada: " . $companhiaAerea);

    $aeroportos = Aeroporto::getRecords();

    mostraAeroportos($aeroportos);

    $indexAeroporto = (int)readline("Digite o index do aeroporto a qual pertence esse piloto: ");

    // $aeroporto = $aeroportos[$indexAeroporto - 1];

    // print_r("Aeroporto selecionado: " . $aeroporto);

    $piloto->setNome($nome);
    $piloto->setSobrenome($sobrenome);
    $piloto->setDocumentoIdentificacao($documentoIdentificacao);
    $piloto->setCpf($cpf);
    $piloto->setNacionalidade($nacionalidade);
    $piloto->setDataNascimento($dataNascimento);
    $piloto->setEmail($email);
    $piloto->setCht($cht);
    $piloto->setEndereco($endereco);
    $piloto->setCompanhiaAerea($indexCompanhiaAerea);
    $piloto->setAeroportoBase($indexAeroporto);

    $piloto->save();

    print_r("Piloto editado com sucesso!\r\n");

    print_r("\n\n");
}

function sis_CadastrarComissario()
{
    $comissario = cadastrarTripulante(COMISSARIO);

    if ($comissario == null) {
        print_r("Comissario nao cadastrado!\r\n");
        return;
    } else {
        $comissario->save();

        print_r("Comissario cadastrado com sucesso!\r\n");

        print_r("\n\n");
    }
}

function sis_verComissarios()
{
    $comissarios = Comissario::getRecords();

    mostraComissarios($comissarios);

    print_r("\n\n");
}

function mostraComissarios(array $comissarios)
{
    print_r("Comissarios cadastrados: \r\n");
    print_r("Index | Nome | Sobrenome | Documento Identificacao | CPF | Nacionalidade | Data Nascimento | Email | Endereco | Companhia Aerea | Aeroporto \r\n");

    foreach ($comissarios as $comissario) {
        print_r($comissario->getIndex() . " | " . $comissario->getNome() . " | " . $comissario->getSobrenome() . " | " . $comissario->getDocumentoIdentificacao() . " | " . $comissario->getCpf() . " | " . $comissario->getNacionalidade() . " | " . $comissario->getDataNascimento() . " | " . $comissario->getEmail() . " | " . $comissario->getEndereco()->getEndCompleto() . " | " . $comissario->getCompanhiaAerea() . " | " . $comissario->getAeroportoBase() . "\r\n");
    }
}

function sis_editarComissario()
{
    $comissarios = Comissario::getRecords();

    mostraPilotos($comissarios);

    $indexComissario = (int)readline("Digite o index do comissario que deseja editar: ");

    $comissario = $comissarios[$indexComissario - 1];

    // print_r("Piloto selecionado: " . $piloto);

    $nome = (string)readline("Digite o nome do comissario: ");

    $sobrenome = (string)readline("Digite o sobrenome do comissario: ");

    $documentoIdentificacao = (string)readline("Digite o documento de identificacao do comissario: ");

    $cpf = (string)readline("Digite o CPF do picomissarioloto: ");

    $nacionalidade = (string)readline("Digite a nacionalidade do comissario: ");

    $dataNascimento = (string)readline("Digite a data de nascimento do comissario: ");

    $email = (string)readline("Digite o email do comissario: ");

    $cht = (string)readline("Digite o CHT do comissario: ");

    $endRua = (string)readline("Digite a rua do endereco do comissario: ");

    $endNumero = (string)readline("Digite o numero do endereco do comissario: ");

    $endComplemento = (string)readline("Digite o complemento do endereco do comissario: ");

    $endCep = (string)readline("Digite o CEP do endereco do comissario: ");

    $endCidade = (string)readline("Digite a cidade do endereco do comissario: ");

    $endEstado = (string)readline("Digite o estado do endereco do comissario: ");

    $endereco = new Endereco($endRua, $endNumero, $endComplemento, $endCep, $endCidade, $endEstado);

    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea a qual pertence esse comissario: ");

    // $companhiaAerea = $companhiasAereas[$indexCompanhiaAerea - 1];

    // print_r("Companhia Aerea selecionada: " . $companhiaAerea);

    $aeroportos = Aeroporto::getRecords();

    mostraAeroportos($aeroportos);

    $indexAeroporto = (int)readline("Digite o index do aeroporto a qual pertence esse comissario: ");

    // $aeroporto = $aeroportos[$indexAeroporto - 1];

    // print_r("Aeroporto selecionado: " . $aeroporto);

    $comissario->setNome($nome);
    $comissario->setSobrenome($sobrenome);
    $comissario->setDocumentoIdentificacao($documentoIdentificacao);
    $comissario->setCpf($cpf);
    $comissario->setNacionalidade($nacionalidade);
    $comissario->setDataNascimento($dataNascimento);
    $comissario->setEmail($email);
    $comissario->setCht($cht);
    $comissario->setEndereco($endereco);
    $comissario->setCompanhiaAerea($indexCompanhiaAerea);
    $comissario->setAeroportoBase($indexAeroporto);

    $comissario->save();

    print_r("Comissario editado com sucesso!\r\n");

    print_r("\n\n");
}
