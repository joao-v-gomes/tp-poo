<?php
include_once("../libs/global.php");

class Aeronave extends persist
{
	private string $fabricante;
	private string $modelo;
	private int $capacidadePassageiros;
	private float $capacidadeCargaKg;
	private string $registro;
	private bool $disponivel;
	private $listaAssentos = array();


	static $local_filename = "aeronaves.txt";


	public function __construct(string $fabricante, string $modelo, int $capacidade_passageiros, float $capacidade_carga, string $registro, bool $disponivel)
	{
		$this->fabricante = $fabricante;
		$this->modelo = $modelo;
		$this->capacidadePassageiros = $capacidade_passageiros;
		$this->capacidadeCargaKg = $capacidade_carga;
		$this->registro = $registro;
		$this->disponivel = $disponivel;
	}

	static public function getFilename()
	{
		return get_called_class()::$local_filename;
	}
}
