<?php
include_once("../libs/global.php");

class Veiculo extends persist
{

    private string $codigo;
    private string $placa;

    private int $qtdeAssentos;

    private ?array $listaEnderecos;
    private ?array $rota;

    private ?DateInterval $tempoPercurso;
    private ?DateTime $horarioEmbarquePrevisto;

    protected ?int $compAereaPertencente; // protected para acessar na busca pelo index

    static $local_filename = "veiculos.txt";


    function __construct(string $codigo, string $placa, int $qtdeAssentos)
    {
        $this->setCodigo($codigo);
        $this->setPlaca($placa);
        $this->setQtdeAssentos($qtdeAssentos);

        // $dataInit = DateTime::createFromFormat('d/m/Y H:i', '01/01/1970 00:00');

        $this->setHorarioEmbarquePrevisto(SEM_HORARIO_EMBARQUE_DEFINIDO);
        $this->setTempoPercurso(SEM_DURACAO_PERCURSO_DEFINIDA);

        $this->setCompAereaPertencente(SEM_COMPANHIA_AEREA_DEFINIDA);

        $this->rota = array();
        $this->listaEnderecos = array();
    }

    public function alteraVeiculo(Veiculo $novoVeiculo)
    {
        $this->setCodigo($novoVeiculo->getCodigo());
        $this->setPlaca($novoVeiculo->getPlaca());
        $this->setQtdeAssentos($novoVeiculo->getQtdeAssentos());
        $this->setHorarioEmbarquePrevisto($novoVeiculo->getHorarioEmbarquePrevisto());
        $this->setCompAereaPertencente($novoVeiculo->getCompAereaPertencente());
        $this->setTempoPercurso($novoVeiculo->getTempoPercurso());
        $this->setRota($novoVeiculo->getRota());
        $this->setListaEnderecos($novoVeiculo->getListaEnderecos());
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getPlaca()
    {
        return $this->placa;
    }

    public function setPlaca(string $placa): void
    {
        $this->placa = $placa;
    }

    public function getQtdeAssentos()
    {
        return $this->qtdeAssentos;
    }

    public function setQtdeAssentos(int $qtdeAssentos): void
    {
        $this->qtdeAssentos = $qtdeAssentos;
    }

    public function getRota()
    {
        return $this->rota;
    }

    public function setRota(?array $rota): void
    {
        $this->rota = $rota;
    }

    public function addRota(Endereco $endereco): void
    {
        array_push($this->rota, $endereco);
    }

    public function getListaEnderecos()
    {
        return $this->listaEnderecos;
    }

    public function setListaEnderecos(?array $listaEnderecos): void
    {
        $this->listaEnderecos = $listaEnderecos;
    }

    public function addEndereco(Endereco $endereco): void
    {
        array_push($this->listaEnderecos, $endereco);
    }

    public function getTempoPercurso()
    {
        return $this->tempoPercurso;
    }

    public function setTempoPercurso(?Dateinterval $tempoPercurso): void
    {
        $this->tempoPercurso = $tempoPercurso;
    }

    public function getHorarioEmbarquePrevisto()
    {
        return $this->horarioEmbarquePrevisto;
    }

    public function setHorarioEmbarquePrevisto(?Datetime $horarioEmbarquePrevisto): void
    {
        $this->horarioEmbarquePrevisto = $horarioEmbarquePrevisto;
    }

    public function getCompAereaPertencente()
    {
        return $this->compAereaPertencente;
    }

    public function setCompAereaPertencente(?int $compAereaPertencente): void
    {
        $this->compAereaPertencente = $compAereaPertencente;
    }

    public function calculaDistancia(float $x1, float $y1, float $x2, float $y2): float
    {
        return 110.57 * sqrt(pow($x2 - $x1, 2) + pow($y2 - $y1, 2));
    }

    public function calculaDistanciaTotalRota()
    {
        $distanciaTotal = 0;
        $qtdeEnderecos = count($this->listaEnderecos);

        for ($i = 0; $i < $qtdeEnderecos - 1; $i++) {
            $distanciaTotal += $this->calculaDistancia(
                $this->listaEnderecos[$i]->getCoordenadaX(),
                $this->listaEnderecos[$i]->getCoordenadaY(),
                $this->listaEnderecos[$i + 1]->getCoordenadaX(),
                $this->listaEnderecos[$i + 1]->getCoordenadaY()
            );
        }

        return $distanciaTotal;
    }

    public function calculaTempoPercurso()
    {
        $distanciaTotal = $this->calculaDistanciaTotalRota();
        $tempoPercurso = $distanciaTotal / VELOCIDADE_MEDIA_VEICULO;

        $this->setTempoPercurso(new DateInterval('PT' . $tempoPercurso . 'H'));
    }

    static public function getFilename()
    {
        return get_called_class()::$local_filename;
    }
}
