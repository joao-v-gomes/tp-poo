<?php
include_once("classVoo.php");
include_once("classAeronave.php");

class CompanhiaAerea
{
    private string $nome;
    private string $codigo;
    private string $razaoSocial;
    private string $cnpj;
    private string $sigla;
    private $listaAeronaves = array();


    public function __construct(string $nome, string $codigo, string 				$razaoSocial, string $cnpj, string $sigla)
    {
			$this->nome = $nome;
			$this->codigo = $codigo;
			$this->razaoSocial = $razaoSocial;
			$this->cnpj = $cnpj;
			$this->sigla = $sigla;
    }

		public function exibirCompanhia()
		{
			print_r($this->nome);
			echo "\n";
			print_r($this->codigo);
			echo "\n";
			print_r($this->razaoSocial);
			echo "\n";
			print_r($this->cnpj);
			echo "\n";
			print_r($this->sigla); 	
		}
	
    public function executaVoo(Voo $novoVoo)
    {
    }

    public function cadastrarNovaAeronave(Aeronave $novaAeronave)
    {
        array_push($this->listaAeronaves, $novaAeronave);
    }

		public function exibirListaAeronaves()
		{
				print_r($this->listaAeronaves);
		}
}
