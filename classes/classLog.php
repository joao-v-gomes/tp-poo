<?php

include_once("../libs/global.php");

abstract class Log extends persist
{
    protected int $tipoLog; // 1 - criação de nova instância, 2 - alteração de atributo, 3 - visualização de atributo
    protected string $mensagem;
    protected string $data;
    // private string $hora;

    static $local_filename = "logs.txt";

    // public function 



    static public function getFilename()
    {
        return get_called_class()::$local_filename;
    }
}

// class Log extends persist implements Observer
// {
//     private int $tipoLog; // 1 - criação de nova instância, 2 - alteração de atributo, 3 - visualização de atributo
//     private string $mensagem;
//     private string $data;
//     // private string $hora;

//     static $local_filename = "logs.txt";

//     // public function __construct(string $mensagem, string $data, string $hora)
//     // {
//     //     $this->setMensagem($mensagem);
//     //     $this->setData($data);
//     //     $this->setHora($hora);
//     // }

//     public function __construct()
//     {
//         print_r("Criando log...\n\n");
//     }

//     // public function update(SplSubject $subject): void
//     // {
//     //     print_r("Atualizando log...");

//     //     print_r($subject);
//     //     // $this->setSigla($subject->getSigla());
//     //     // $this->setMensagem($subject->getMensagem());
//     //     // $this->setData($subject->getData());
//     //     // $this->setHora($subject->getHora());
//     //     // $this->save();
//     // }

//     public function criaNovaInstancia(Subject $subject)
//     {
//         // print_r("Criando uma nova instancia de " . get_class($subject) . "!\n\n");

//         $logCriacao = new Log();

//         $logCriacao->setTipoLog(NOVA_INSTANCIA);
//         $logCriacao->setMensagem("Uma nova instancia de " . get_class($subject) . " foi criada.");
//         $logCriacao->setData(date("d/m/Y H:i:s"));
//         // $logCriacao->setHora(date("H:i:s"));

//         $logCriacao->save();
//     }

//     public function setAtributo($classe, string $nomeAtributo, $valorAntigo, $valorNovo)
//     {
//         // print_r($this);
//         // print_r("Classe: " . get_class($classe));
//         // print_r("\n\n");
//         // print_r("Nome do Atributo: " . $nomeAtributo);
//         // print_r("\n\n");
//         // print_r("Valor Antigo: ");
//         // print_r($valorAntigo);
//         // print_r("\n\n");
//         // print_r("Valor Novo: ");
//         // print_r($valorNovo);
//         // print_r("\n\n");
//         // print_r($this->getSigla());

//         $logAlteracao = new Log();

//         $logAlteracao->setTipoLog(ALTERACAO_ATRIBUTO);
//         $logAlteracao->setMensagem("Alteração de atributo: " . "Classe: " . get_class($classe) . " Atributo: " . $nomeAtributo . " de " . $valorAntigo . " para " . $valorNovo);
//         $logAlteracao->setData(date("d/m/Y H:i:s"));
//         // $logAlteracao->setHora(date("H:i:s"));

//         $logAlteracao->save();
//     }

//     public function getAtributo($classe, string $nomeAtributo)
//     {
//         $logVisualizacao = new Log();

//         $logVisualizacao->setTipoLog(VISUALIZACAO_ATRIBUTO);
//         $logVisualizacao->setMensagem("Visualização de atributo: " . "Classe: " . get_class($classe) . " Atributo: " . $nomeAtributo . ".");
//         $logVisualizacao->setData(date("d/m/Y H:i:s"));
//         // $logVisualizacao->setHora(date("H:i:s"));

//         $logVisualizacao->save();
//     }

//     public function setTipoLog(int $tipoLog)
//     {
//         $this->tipoLog = $tipoLog;
//     }

//     public function getTipoLog()
//     {
//         return $this->tipoLog;
//     }

//     public function setMensagem(string $mensagem)
//     {
//         $this->mensagem = $mensagem;
//     }

//     public function getMensagem(): string
//     {
//         return $this->mensagem;
//     }

//     public function setData(string $data)
//     {
//         $this->data = $data;
//     }

//     public function getData(): string
//     {
//         return $this->data;
//     }

//     public function setHora(string $hora)
//     {
//         $this->hora = $hora;
//     }

//     public function getHora(): string
//     {
//         return $this->hora;
//     }

//     static public function getFilename()
//     {
//         return get_called_class()::$local_filename;
//     }
// }
