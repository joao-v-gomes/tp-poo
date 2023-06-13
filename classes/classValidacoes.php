<?php

class Validacoes
{
    static function validaCPF(string $cpf)
    {
        // Extrai somente os números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);

        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            throw new Exception("CPF inválido");
        }

        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            throw new Exception("CPF inválido");
        }

        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                throw new Exception("CPF inválido");
            }
        }

        return 1;
    }

    static public function validarDataDeNascimento(string $dataDeNascimento)
    {
        $data = explode('/', $dataDeNascimento);
        $d = $data[0];
        $m = $data[1];
        $y = $data[2];

        // verifica se a data é válida!
        // 1 = true (válida)
        // 0 = false (inválida)
        $res = checkdate($m, $d, $y);

        if ($res == 1) {
            return 1;
        } else {
            throw new Exception("Data de Nascimento Inválida");
        }
    }

    static public function validarEmail(string $email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 1;
        } else {
            throw new Exception("Email inválido");
        }
    }

    static public function validaRegistroAeronave(string $registro)
    {

        // Coloca tudo maiusculo
        $registro = strtoupper($registro);

        // Verifica o tamanho da string
        if (strlen($registro) != TAMANHO_REGISTRO) {
            throw new Exception("Tamanho do registro errado \r\n");
        };

        // Verifica a primeira letra
        if (($registro[0] != 'P')) {
            // return "Registro nao comeca com 'P' \r\n";
            throw new Exception("Registro nao comeca com 'P' \r\n");
        };

        // Verifica a segunda letra
        if (
            $registro[1] != 'T' and
            $registro[1] != 'R' and
            $registro[1] != 'P' and
            $registro[1] != 'S'
        ) {
            // return "Segunda letra do registro nao e 'T', 'P', 'P' ou 'S' \r\n";
            throw new Exception("Segunda letra do registro nao e 'T', 'P', 'P' ou 'S' \r\n");
        }

        // Verifica a posicao do hifen	
        if ($registro[2] != '-') {
            // return "O hifen nao esta na posicao correta \r\n";
            throw new Exception("O hifen nao esta na posicao correta \r\n");
        }

        // Verifica se os tres ultimos chars nao sao numericos
        if (is_numeric($registro[3]) or is_numeric($registro[4]) or is_numeric($registro[5])) {
            // return "Os tres ultimos digitos nao sao numericos \r\n";
            throw new Exception("Os tres ultimos digitos nao sao numericos \r\n");
        }

        // Retorna true se der tudo certo
        return 1;
    }

    static public function validaCodigoVoo(?int $indexCompanhiaAerea, ?string $codigoVoo)
    {
        if ($indexCompanhiaAerea == null) {
            // return "Index Compahia Aerea nulo";
            throw new Exception("Index Compahia Aerea nulo");
        }

        if ($codigoVoo == null) {
            // return "Codigo Voo nulo";
            throw new Exception("Codigo Voo nulo");
        }

        if (strlen($codigoVoo) != 6) {
            // return "Tamanho do Codigo Voo invalido";
            throw new Exception("Tamanho do Codigo Voo invalido");
        }

        $codigoVoo = strtoupper($codigoVoo);

        $letra = substr($codigoVoo, 0, 2);
        $numero = substr($codigoVoo, 2, 5);

        // print_r("Letra: " . $letra . "\n");
        // print_r("Numero: " . $numero . "\n");

        $companhiaAerea = CompanhiaAerea::getRecordsByField('index', $indexCompanhiaAerea);

        if ($companhiaAerea == null) {
            // return "Index Companhia Aerea nao encontrado";
            throw new Exception("Index Companhia Aerea nao encontrado");
        }

        $companhiaAerea = $companhiaAerea[0];

        if ($companhiaAerea->getSigla() != $letra) {
            // return "Sigla da Companhia Aerea nao confere com o Codigo Voo";
            throw new Exception("Sigla da Companhia Aerea nao confere com o Codigo Voo");
        }

        if (!is_numeric($numero)) {
            // return "O numero do Codigo Voo nao e numerico";
            throw new Exception("O numero do Codigo Voo nao e numerico");
        }

        return 1;
    }
}
