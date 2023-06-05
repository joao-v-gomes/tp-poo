<?php

include_once("../libs/global.php");

class Usuario extends persist
{
    private int $tipoUsuario; // 1 - Cliente, 2 - Funcionario
    private string $login;
    private string $senha;
    private string $email;


    static $local_filename = "usuarios.txt";


    public function __construct(int $tipoUsuario, string $login, string $senha, string $email)
    {
        $this->setTipoUsuario($tipoUsuario);
        $this->setLogin($login);
        $this->setSenha($senha);
        $this->setEmail($email);
    }

    public function alterarUsuario(Usuario $novoUsuario)
    {
        $this->setTipoUsuario($novoUsuario->getTipoUsuario());
        $this->setLogin($novoUsuario->getLogin());
        $this->setSenha($novoUsuario->getSenha());
        $this->setEmail($novoUsuario->getEmail());
    }

    public function getTipoUsuario()
    {
        return $this->tipoUsuario;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setTipoUsuario(int $tipoUsuario)
    {
        $this->tipoUsuario = $tipoUsuario;
    }

    public function setLogin(string $login)
    {
        $this->login = $login;
    }

    public function setSenha(string $senha)
    {
        $this->senha = $senha;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    static public function getFilename()
    {
        return get_called_class()::$local_filename;
    }
}
