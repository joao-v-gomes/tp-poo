<?php

include_once("../libs/global.php");

define("PILOTO", 1);
define("COMISSARIO", 2);

$sair = 0;

while ($sair == 0) {
    $opcMenu = 0;

    print_r("------ MENU SISTEMA ------\r\n");


    print_r("\n--- AEROPORTOS ---\r\n");
    print_r(++$opcMenu . " - Cadastrar Aeroporto\r\n");
    print_r(++$opcMenu . " - Ver Aeroportos\r\n");
    print_r(++$opcMenu . " - Editar Aeroportos\r\n");
    print_r(++$opcMenu . " - Adicionar uma Companhia Aerea a um Aeroporto\r\n");
    print_r(++$opcMenu . " - Ver Companhias Aereas de um Aeroporto\r\n");
    print_r(++$opcMenu . " - Cadastrar Voos\r\n");
    print_r(++$opcMenu . " - Ver Voos\r\n");
    print_r(++$opcMenu . " - Editar Voos\r\n");


    print_r("\n--- COMPANHIAS AEREAS ---\r\n");
    print_r(++$opcMenu . " - Cadastrar Companhia Aerea\r\n");
    print_r(++$opcMenu . " - Ver Companhias Aereas\r\n");
    print_r(++$opcMenu . " - Editar Companhia Aerea\r\n");
    print_r(++$opcMenu . " - Ver Aeronaves da Comp Aerea\r\n");
    print_r(++$opcMenu . " - Cadastrar Piloto\r\n");
    print_r(++$opcMenu . " - Ver Pilotos\r\n");
    print_r(++$opcMenu . " - Editar Piloto\r\n");
    print_r(++$opcMenu . " - Cadastrar Comissario\r\n");
    print_r(++$opcMenu . " - Ver Comissarios\r\n");
    print_r(++$opcMenu . " - Editar Comissario\r\n");


    print_r("\n--- AERONAVES ---\r\n");
    print_r(++$opcMenu . " - Cadastrar Aeronave\r\n");
    print_r(++$opcMenu . " - Ver Aeronaves\r\n");
    print_r(++$opcMenu . " - Editar Aeronave\r\n");

    print_r("\r\n-1 para sair do sistema\r\n");

    $opcao = (string)readline("Digite uma opcao: ");

    $opcMenu = 0;

    switch ($opcao) {

        case ++$opcMenu:
            print_r("Cadastramento de Aeroporto\r\n");
            print_r("\n\n");
            sis_cadastrarAeroporto();
            break;

        case ++$opcMenu:
            print_r("Ver aeroportos\r\n");
            print_r("\n\n");
            sis_verAeroportos();
            break;

        case ++$opcMenu:
            print_r("Editar Aeroporto\r\n");
            print_r("\n\n");
            sis_editarAeroporto();
            break;

        case ++$opcMenu:
            print_r("Conexao Comp. Aerea em Aeroporto\r\n");
            print_r("\n\n");
            sis_conectarCompanhiaAereaEmAeroporto();
            break;

        case ++$opcMenu:
            print_r("Ver Comp. Aerea em Aeroporto\r\n");
            print_r("\n\n");
            sis_verCompanhiasAereasEmAeroporto();
            break;

        case ++$opcMenu:
            print_r("Cadastramento de Voo\r\n");
            print_r("\n\n");
            sis_CadastrarVoo();
            break;

        case ++$opcMenu:
            print_r("Ver Voos\r\n");
            print_r("\n\n");
            sis_verVoos();
            break;

        case ++$opcMenu:
            print_r("Editar Voo\r\n");
            print_r("\n\n");
            sis_editarVoo();
            break;

        case ++$opcMenu:
            print_r("Cadastramento de Companhia Aerea\r\n");
            print_r("\n\n");
            sis_CadastrarCompanhiaAerea();
            break;

        case ++$opcMenu:
            print_r("Ver Companhia Aerea\r\n");
            print_r("\n\n");
            sis_verCompanhiasAereas();
            break;

        case ++$opcMenu:
            print_r("Editar Companhia Aerea\r\n");
            print_r("\n\n");
            sis_editarCompanhiaAerea();
            break;

        case ++$opcMenu:
            print_r("Ver Aeronaves da Comp Aerea\r\n");
            print_r("\n\n");
            sis_verAeronavesDaCompanhiaAerea();
            break;

        case ++$opcMenu:
            print_r("Cadastramento de Piloto\r\n");
            print_r("\n\n");
            sis_CadastrarPiloto();
            break;

        case ++$opcMenu:
            print_r("Ver Pilotos\r\n");
            print_r("\n\n");
            sis_verPilotos();
            break;

        case ++$opcMenu:
            print_r("Editar Piloto\r\n");
            print_r("\n\n");
            sis_editarPiloto();
            break;

        case ++$opcMenu:
            print_r("Cadastramento de Comissario\r\n");
            print_r("\n\n");
            sis_CadastrarComissario();
            break;

        case ++$opcMenu:
            print_r("Ver Comissarios\r\n");
            print_r("\n\n");
            sis_verComissarios();
            break;

        case ++$opcMenu:
            print_r("Editar Comissario\r\n");
            print_r("\n\n");
            sis_editarComissario();
            break;

        case ++$opcMenu:
            print_r("Cadastramento de Aeronave\r\n");
            print_r("\n\n");
            sis_CadastrarAeronave();
            break;

        case ++$opcMenu:
            print_r("Ver Aeronaves\r\n");
            print_r("\n\n");
            sis_verAeronaves();
            break;

        case ++$opcMenu:
            print_r("Editar Aeronave\r\n");
            print_r("\n\n");
            sis_editarAeronave();
            break;

        case -1:
            print_r("Saindo do sistema...\r\n");
            $sair = 1;
            break;

        default:
            print_r("Opcao errada!!\r\n");
            print_r("\n\n");
            break;
    }
}

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

function sis_CadastrarCompanhiaAerea()
{
    $nome = (string)readline("Digite o nome da companhia aerea: ");
    $codigo = (string)readline("Digite o codigo da companhia aerea: ");
    $razaoSocial = (string)readline("Digite a razao social da companhia aerea: ");
    $cnpj = (string)readline("Digite o CNPJ da companhia aerea: ");
    $sigla = (string)readline("Digite a sigla da companhia aerea: ");

    $companhiaAerea = new CompanhiaAerea($nome, $codigo, $razaoSocial, $cnpj, $sigla);

    $companhiaAerea->save();

    print_r("Companhia Aerea cadastrada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verCompanhiasAereas()
{
    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    print_r("\n\n");
}

function mostraCompanhiasAereas(array $companhiasAereas)
{
    print_r("Companhias Aereas cadastradas:\r\n");
    print_r("Index - Nome - Codigo - Razao Social - CNPJ - Sigla\r\n");

    foreach ($companhiasAereas as $companhiaAerea) {
        print_r($companhiaAerea->getIndex() . " - " . $companhiaAerea->getNome() . " - " . $companhiaAerea->getCodigo() . " - " . $companhiaAerea->getRazaoSocial() . " - " . $companhiaAerea->getCnpj() . " - " . $companhiaAerea->getSigla() . "\r\n");
    }
}

function sis_editarCompanhiaAerea()
{
    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $index = (int)readline("Digite o index da companhia aerea que deseja editar: ");

    $companhiaAerea = $companhiasAereas[$index - 1];

    $nome = (string)readline("Digite o nome da companhia aerea: ");
    $codigo = (string)readline("Digite o codigo da companhia aerea: ");
    $razaoSocial = (string)readline("Digite a razao social da companhia aerea: ");
    $cnpj = (string)readline("Digite o CNPJ da companhia aerea: ");
    $sigla = (string)readline("Digite a sigla da companhia aerea: ");

    $companhiaAerea->setNome($nome);
    $companhiaAerea->setCodigo($codigo);
    $companhiaAerea->setRazaoSocial($razaoSocial);
    $companhiaAerea->setCnpj($cnpj);
    $companhiaAerea->setSigla($sigla);

    $companhiaAerea->save();

    print_r("Companhia Aerea editada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verAeronavesDaCompanhiaAerea()
{
    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea: ");

    $companhiaAerea = $companhiasAereas[$indexCompanhiaAerea - 1];

    // print_r("Companhia Aerea selecionada: " . $companhiaAerea);

    $siglaCompAereaSelecionada = $companhiaAerea->getSigla();

    // print_r("Sigla da Companhia Aerea selecionada: " . $siglaCompAereaSelecionada . "\r\n");

    $aeronaves = Aeronave::getRecordsByField('compAereaPertencente', $siglaCompAereaSelecionada);

    mostraAeronaves($aeronaves);

    print_r("\n\n");
}

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
    } else {
        $tripulante = new Comissario($tipoTripulante, $nome, $sobrenome, $documentoIdentificacao, $cpf, $nacionalidade, $dataNascimento, $email, $cht, $endereco, $indexCompanhiaAerea, $indexAeroporto);
    }

    return $tripulante;
}

function sis_cadastrarPiloto()
{
    $piloto = cadastrarTripulante(PILOTO);

    // print_r("Piloto criado: \r\n");

    // print_r($piloto);

    $piloto->save();

    print_r("Piloto cadastrado com sucesso!\r\n");

    print_r("\n\n");
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

    $comissario->save();

    print_r("Comissario cadastrado com sucesso!\r\n");

    print_r("\n\n");
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

function sis_CadastrarAeronave()
{
    $fabricante = (string)readline("Digite o fabricante da aeronave: ");
    $modelo = (string)readline("Digite o modelo da aeronave: ");
    $capacidadePassageiros = (int)readline("Digite a capacidade de passageiros da aeronave: ");
    $capacidadeCarga = (float)readline("Digite a capacidade de carga da aeronave: ");

    $companhiasAereas = CompanhiaAerea::getRecords();

    mostraCompanhiasAereas($companhiasAereas);

    $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea a qual pertence essa aeronave: ");

    $companhiaAerea = $companhiasAereas[$indexCompanhiaAerea - 1];

    // print_r("Companhia Aerea selecionada: " . $companhiaAerea);

    $siglaCompAereaSelecionada = $companhiaAerea->getSigla();

    // $aeronave = new Aeronave($fabricante, $modelo, $capacidadePassageiros, $capacidadeCarga, $registro, $siglaCompAereaSelecionada);

    do {

        $registro = (string)readline("Digite o registro da aeronave: ");

        $aeronave = Aeronave::criarAeronave($fabricante, $modelo, $capacidadePassageiros, $capacidadeCarga, $registro, $siglaCompAereaSelecionada);
    } while ($aeronave == null);

    $aeronave->save();

    print_r("Aeronave cadastrada com sucesso!\r\n");

    print_r("\n\n");
}

function sis_verAeronaves()
{
    $aeronaves = Aeronave::getRecords();

    mostraAeronaves($aeronaves);

    print_r("\n\n");
}

function mostraAeronaves(array $aeronaves)
{
    print_r("Aeronaves cadastradas:\r\n");
    print_r("Index - Fabricante - Modelo - Capacidade de Passageiros - Capacidade de Carga - Registro - Comp. Aerea\r\n");

    foreach ($aeronaves as $aeronave) {
        print_r($aeronave->getIndex() . " - " . $aeronave->getFabricante() . " - " . $aeronave->getModelo() . " - " . $aeronave->getCapacidadePassageiros() . " - " . $aeronave->getCapacidadeCarga() . " - " . $aeronave->getRegistro() . " - " . $aeronave->getCompAereaPertencente() . "\r\n");
    }
}

function sis_editarAeronave()
{
    $aeronaves = Aeronave::getRecords();

    mostraAeronaves($aeronaves);

    $indexAeronave = (int)readline("Digite o index da aeronave: ");

    $aeronave = $aeronaves[$indexAeronave - 1];

    $fabricante = (string)readline("Digite o fabricante da aeronave: ");
    $modelo = (string)readline("Digite o modelo da aeronave: ");
    $capacidadePassageiros = (int)readline("Digite a capacidade de passageiros da aeronave: ");
    $capacidadeCarga = (float)readline("Digite a capacidade de carga da aeronave: ");
    $registro = (string)readline("Digite o registro da aeronave: ");

    $aeronave->setFabricante($fabricante);
    $aeronave->setModelo($modelo);
    $aeronave->setCapacidadePassageiros($capacidadePassageiros);
    $aeronave->setCapacidadeCargaKg($capacidadeCarga);
    $aeronave->setRegistro($registro);

    $aeronave->save();

    print_r("Aeronave editada com sucesso!\r\n");

    print_r("\n\n");
}
