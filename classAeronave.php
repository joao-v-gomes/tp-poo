<?php
class Aeronave
{
	private string $fabricante;
	private string $modelo;
	private int $capacidadePassageiros;
	private float $capacidadeCargaKg;
	private string $registro;
	private bool $disponivel;


	public function __construct(string $fabricante, string $modelo, int $capacidade_passageiros, float $capacidade_carga, string $registro, bool $disponivel)
	{
    $this->fabricante = $fabricante;
    $this->modelo = $modelo;
    $this->capacidadePassageiros = $capacidade_passageiros;
    $this->capacidadeCargaKg = $capacidade_carga;
    $this->registro = $registro;
    $this->disponivel = $disponivel;
	}
  
}
