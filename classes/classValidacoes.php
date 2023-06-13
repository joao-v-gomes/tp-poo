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
}
