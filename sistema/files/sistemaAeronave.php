<?php

include_once("../libs/global.php");

class SistemaAeronave
{
    static function cadastrarAeronave()
    {
        $fabricante = (string)readline("Digite o fabricante da aeronave: ");
        $modelo = (string)readline("Digite o modelo da aeronave: ");
        $capacidadePassageiros = (int)readline("Digite a capacidade de passageiros da aeronave: ");
        $capacidadeCarga = (float)readline("Digite a capacidade de carga da aeronave: ");

        $registro = (string)readline("Digite o registro da aeronave: ");

        $companhiasAereas = CompanhiaAerea::getRecords();

        SistemaCompAerea::mostraCompanhiasAereas($companhiasAereas);

        $indexCompanhiaAerea = (int)readline("Digite o index da companhia aerea a qual pertence essa aeronave: ");

        if ($indexCompanhiaAerea != null) {
            $indexCompanhiaAerea = $companhiasAereas[$indexCompanhiaAerea - 1]->getIndex();
        } else {
            $indexCompanhiaAerea = null;
        }

        $aeronave = Aeronave::criarAeronave($fabricante, $modelo, $capacidadePassageiros, $capacidadeCarga, $registro, $indexCompanhiaAerea);

        return $aeronave;
    }


    static function sis_CadastrarAeronave()
    {

        $aeronave = SistemaAeronave::cadastrarAeronave();

        if ($aeronave != null) {
            $aeronave->save();

            print_r("Aeronave cadastrada com sucesso!\r\n");
        } else {
            print_r("Erro ao cadastrar aeronave!\r\n");
        }

        print_r("\n\n");
    }

    static function sis_verAeronaves()
    {
        $aeronaves = Aeronave::getRecords();

        if (count($aeronaves) == 0) {
            print_r("Nenhuma aeronave cadastrada!\r\n");
            print_r("\n\n");
            return;
        } else {

            SistemaAeronave::mostraAeronaves($aeronaves);

            print_r("\n\n");
        }
    }

    static function mostraAeronaves(array $aeronaves)
    {
        print_r("Aeronaves cadastradas:\r\n");
        print_r("Index - Fabricante - Modelo - Capacidade de Passageiros - Capacidade de Carga - Registro - Comp. Aerea\r\n");

        foreach ($aeronaves as $aeronave) {

            $companhiasAereaAeronave = "";

            if ($aeronave->getCompAereaPertencente() == null)
                $companhiasAereaAeronave = "null";
            else {
                $companhiasAereaAeronave = $aeronave->getCompAereaPertencente();
            }

            print_r($aeronave->getIndex() . " - " . $aeronave->getFabricante() . " - " . $aeronave->getModelo() . " - " . $aeronave->getCapacidadePassageiros() . " - " . $aeronave->getCapacidadeCarga() . " - " . $aeronave->getRegistro() . " - " . $companhiasAereaAeronave . "\r\n");
        }
    }

    static function sis_editarAeronave()
    {

        $aeronaves = Aeronave::getRecords();

        if (count($aeronaves) == 0) {
            print_r("Nenhuma aeronave cadastrada!\r\n");
            print_r("\n\n");
            return;
        }

        SistemaAeronave::mostraAeronaves($aeronaves);

        $indexAeronave = (int)readline("Digite o index da aeronave: ");

        $aeronave = $aeronaves[$indexAeronave - 1];

        $aeronaveNova = SistemaAeronave::cadastrarAeronave();

        if ($aeronaveNova == null) {
            print_r("Aeronave não pode ser editada!\r\n");
            return;
        } else {
            $aeronave->alteraAeronave($aeronaveNova);

            $aeronave->save();

            print_r("Aeronave editada com sucesso!\r\n");
        }

        print_r("\n\n");
    }
}
