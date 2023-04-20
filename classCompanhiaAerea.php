<?php
include_once("classViagem.php");
include_once("classAeronave.php");

class CompanhiaAerea extends persist
{
    private string $nome;
    private string $codigo;
    private string $razaoSocial;
    private string $cnpj;
    private string $sigla;
    private $listaAeronaves = array();

		static $local_filename = "companhiaAerea.txt";

    public function __construct(string $nome, string $codigo, string $razaoSocial, string $cnpj, string $sigla)
    {
			$this->nome = $nome;
			$this->codigo = $codigo;
			$this->razaoSocial = $razaoSocial;
			$this->cnpj = $cnpj;
			$this->sigla = $sigla;
    }

		static public function getFilename(){
			return get_called_class()::$local_filename;
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
	
    public function executaViagem(Viagem $novaViagem)
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
