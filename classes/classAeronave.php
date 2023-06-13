<?php
include_once("../libs/global.php");

// define("TAMANHO_REGISTRO", 6);
// define("SEM_COMPANHIA_AEREA", -1);

class Aeronave extends persist
{
	private string $fabricante;
	private string $modelo;
	private int $capacidadePassageiros;
	private float $capacidadeCargaKg;
	private string $registro;
	private bool $disponivel;

	protected ?int $compAereaPertencente; // protected para acessar na busca pelo index

	private array $listaAssentos;
	//preencher com letras x
	// x = disponivel
	// e = escolhido 
	// v = apareceu e viajou 

	static $local_filename = "aeronaves.txt";

	public function __construct(string $fabricante, string $modelo, int $capacidadePassageiros, float $capacidadeCarga, string $registro, ?int $indexCompAerea)
	{

		$this->setRegistro($registro);
		$this->setFabricante($fabricante);
		$this->setModelo($modelo);
		$this->setCapacidadePassageiros($capacidadePassageiros);
		$this->setCapacidadeCargaKg($capacidadeCarga);

		//Deixa a aeronave disponível por padrão
		$this->setDisponibilidadeAeronave(true);

		// Prepara a todos os assentos($listaAssentos) com 0 (assento vazio)
		$this->preecheListaAssentos();

		// sempre cadastramos uma nova Aeronave com -1, pois ela não pertence a nenhuma companhia aérea ainda
		// quando definimos a companhia aérea, alteramos esse valor
		$this->setCompAereaPertencente($indexCompAerea);
	}

	static public function criarAeronave(string $fabricante, string $modelo, int $capacidadePassageiros, float $capacidadeCarga, string $registro, ?int $indexCompAerea)
	{
		try {
			$validaRegistro = Validacoes::validaRegistroAeronave($registro);

			if ($validaRegistro == 1) {
				$aeronave = new Aeronave($fabricante, $modelo, $capacidadePassageiros, $capacidadeCarga, $registro, $indexCompAerea);

				// $aeronave->setCompAereaPertencente($indexCompAerea);

				return $aeronave;
			}
		} catch (Exception $e) {
			print_r("Erro ao criar aeronave: " . $e->getMessage() . "\n");
			return NULL;
		}
	}

	public function alteraAeronave(Aeronave $novaAeronave)
	{
		$this->setFabricante($novaAeronave->getFabricante());
		$this->setModelo($novaAeronave->getModelo());
		$this->setCapacidadePassageiros($novaAeronave->getCapacidadePassageiros());
		$this->setCapacidadeCargaKg($novaAeronave->getCapacidadeCarga());
		$this->setCompAereaPertencente($novaAeronave->getCompAereaPertencente());
		$this->setRegistro($novaAeronave->getRegistro());

		// nao precisamos alterar a disponibilidade da aeronave desse jeito
		// $this->setDisponibilidadeAeronave($novaAeronave->getDisponibilidadeAeronave());

	}

	public function getFabricante()
	{
		return $this->fabricante;
	}

	public function setFabricante(string $fabricante)
	{
		$this->fabricante = $fabricante;
	}

	public function getModelo()
	{
		return $this->modelo;
	}

	public function setModelo(string $modelo)
	{
		$this->modelo = $modelo;
	}

	public function getCapacidadePassageiros()
	{
		return $this->capacidadePassageiros;
	}

	public function setCapacidadePassageiros(int $capacidadePassageiros)
	{
		$this->capacidadePassageiros = $capacidadePassageiros;
	}

	public function getCapacidadeCarga()
	{
		return $this->capacidadeCargaKg;
	}

	public function setCapacidadeCargaKg(float $capacidadeCargaKg)
	{
		$this->capacidadeCargaKg = $capacidadeCargaKg;
	}

	public function getRegistro()
	{
		return $this->registro;
	}

	public function setRegistro(string $registro)
	{
		if (Validacoes::validaRegistroAeronave($registro) == 1) {
			$registro = strtoupper($registro);
			$this->registro = $registro;
		} else {
			throw new Exception("Registro inválido");
		}
	}

	public function setDisponibilidadeAeronave(bool $disponibilidade)
	{
		if ($disponibilidade == true) {
			$this->setAeronaveDisponivel();
		} else {
			$this->setAeronaveIndisponivel();
		}
	}

	public function getDisponibilidadeAeronave()
	{
		return $this->disponivel;
	}

	public function setAeronaveDisponivel()
	{
		$this->disponivel = true;
	}

	public function setAeronaveIndisponivel()
	{
		$this->disponivel = false;
	}

	public function getCompAereaPertencente()
	{
		return $this->compAereaPertencente;
	}

	public function setCompAereaPertencente(?int $compAereaPertencente)
	{
		$this->compAereaPertencente = $compAereaPertencente;
	}

	public function getListaAssentos()
	{
		return $this->listaAssentos;
	}

	public function preecheListaAssentos()
	{
		$listaAssentos = array();

		for ($i = 1; $i <= $this->getCapacidadePassageiros(); $i++) {
			$listaAssentos[$i] = 0;
		}

		$this->listaAssentos = $listaAssentos;

		// print_r($this->listaAssentos);
	}

	static public function getFilename()
	{
		return get_called_class()::$local_filename;
	}
}
