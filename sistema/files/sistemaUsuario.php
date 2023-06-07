<?php

include_once("../libs/global.php");

class SistemaUsuario
{
    static function sis_CadastrarUsuario()
    {
        $tipoUsuario = (string)readline("Qual o tipo de usuário? (1 - Cliente, 2 - Funcionário): ");
        $login = (string)readline("Qual o login do usuário? ");
        $senha = (string)readline("Qual a senha do usuário? ");
        $email = (string)readline("Qual o email do usuário? ");

        $usuario = new Usuario($tipoUsuario, $login, $senha, $email);

        $usuario->save();

        echo "Usuário cadastrado com sucesso!\n";

        // print_r($usuario);

        print_r("\n\n");
    }

    static function sis_verUsuarios()
    {
        $usuarios = Usuario::getRecords();

        if (count($usuarios) == 0) {
            print_r("Não há usuários cadastrados!\n\n");
            return;
        }

        SistemaUsuario::mostraUsuarios($usuarios);
    }


    static function mostraUsuarios(array $usuarios)
    {
        print_r("Lista de usuários cadastrados:\n\n");
        print_r("Index - Tipo de usuário - Login - Senha - Email\n");

        foreach ($usuarios as $usuario) {
            // print_r($usuario);
            // print_r("\n\n");

            print_r($usuario->getIndex() . " - " . $usuario->getTipoUsuario() . " - " . $usuario->getLogin() . " - " . $usuario->getSenha() . " - " . $usuario->getEmail() . "\n");
        }

        print_r("\n\n");
    }


    static function sis_editarUsuario()
    {
        $usuarios = Usuario::getRecords();

        if (count($usuarios) == 0) {
            print_r("Não há usuários cadastrados!\n\n");
            return;
        }

        SistemaUsuario::mostraUsuarios($usuarios);

        $indexUsuario = (string)readline("Qual o index do usuário que deseja editar? ");

        $usuario = $usuarios[$indexUsuario - 1];

        // print_r($usuario);

        // print_r("\n\n");

        $tipoUsuario = (string)readline("Qual o tipo de usuário? (1 - Cliente, 2 - Funcionário): ");
        $login = (string)readline("Qual o login do usuário? ");
        $senha = (string)readline("Qual a senha do usuário? ");
        $email = (string)readline("Qual o email do usuário? ");

        $novoUsuario = new Usuario($tipoUsuario, $login, $senha, $email);

        $usuario->alterarUsuario($novoUsuario);

        $usuario->save();

        print_r("Usuário editado com sucesso!\n\n");

        print_r($usuario);

        print_r("\n\n");
    }
}
