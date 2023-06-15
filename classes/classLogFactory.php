<?php

class LogFactory extends Log
{
    public function salvaLog(int $tipoLog, $classe, $atributo, $objetoAntigo, $objetoNovo)
    {
        // $log = new Log();
        // $log->setTipoLog($tipoLog);
        // $log->setMensagem($mensagem);
        // $log->setData($data);
        // $log->save();

        switch ($tipoLog) {
            case ESCRITA_ATRIBUTO:
                $log = new LogEscrita($classe, $atributo, $objetoAntigo, $objetoNovo);
                $log->save();
                print_r("Criou log escrita\n\n");
                break;
            case LEITURA_ATRIBUTO:
                $log = new LogLeitura($classe, $atributo);
                $log->save();
                print_r("Criou log leitura\n\n");
                break;
            default:
                break;
        }
    }

    public function criaNovaInstancia($novaInstancia)
    {
        print_r("Notificando observers da criacao... Observer\n\n");
        $this->salvaLog(NOVA_INSTANCIA, $novaInstancia, null, null, null);
        // print_r("Criando uma nova instancia de " . get_class($subject) . "!\n\n");

        // $logCriacao = new Log();

        // $logCriacao->setTipoLog(NOVA_INSTANCIA);
        // $logCriacao->setMensagem("Uma nova instancia de " . get_class($subject) . " foi criada.");
        // $logCriacao->setData(date("d/m/Y H:i:s"));
        // // $logCriacao->setHora(date("H:i:s"));

        // $logCriacao->save();
    }

    public function setAtributo($classe, string $nomeAtributo, $valorAntigo, $valorNovo)
    {

        print_r("Notificando observers da alteracao... Observer\n\n");
        $this->salvaLog(ESCRITA_ATRIBUTO, $classe, $nomeAtributo, $valorAntigo, $valorNovo);

        // print_r($this);
        // print_r("Classe: " . get_class($classe));
        // print_r("\n\n");
        // print_r("Nome do Atributo: " . $nomeAtributo);
        // print_r("\n\n");
        // print_r("Valor Antigo: ");
        // print_r($valorAntigo);
        // print_r("\n\n");
        // print_r("Valor Novo: ");
        // print_r($valorNovo);
        // print_r("\n\n");
        // print_r($this->getSigla());

        // $logAlteracao = new Log();

        // $logAlteracao->setTipoLog(ALTERACAO_ATRIBUTO);
        // $logAlteracao->setMensagem("Alteração de atributo: " . "Classe: " . get_class($classe) . " Atributo: " . $nomeAtributo . " de " . $valorAntigo . " para " . $valorNovo);
        // $logAlteracao->setData(date("d/m/Y H:i:s"));
        // // $logAlteracao->setHora(date("H:i:s"));

        // $logAlteracao->save();
    }

    public function getAtributo($classe, string $nomeAtributo)
    {
        print_r("Notificando observers da visualizacao... Observer\n\n");
        $this->salvaLog(LEITURA_ATRIBUTO, $classe, $nomeAtributo, null, null);

        // $logVisualizacao = new Log();

        // $logVisualizacao->setTipoLog(VISUALIZACAO_ATRIBUTO);
        // $logVisualizacao->setMensagem("Visualização de atributo: " . "Classe: " . get_class($classe) . " Atributo: " . $nomeAtributo . ".");
        // $logVisualizacao->setData(date("d/m/Y H:i:s"));
        // // $logVisualizacao->setHora(date("H:i:s"));

        // $logVisualizacao->save();
    }
}
