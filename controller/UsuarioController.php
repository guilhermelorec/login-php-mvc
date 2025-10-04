<?php
require_once "models/Usuario.php";
require_once "config/Database.php";

class UsuarioController {
    private $usuario;

    public function __construct() {

        $db = (new Database())->getConnection();
        $this->usuario = new Usuario($db);
    }

    public function cadastro() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome'  => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => $_POST['senha']
            ];

            if ($this->usuario->cadastrar($dados)) {
                echo "Usuário cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar usuário!";
            }
        }

        require "view/Cadastro.php";
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'email' => $_POST['email'],
                'senha' => $_POST['senha']
            ];

            if ($this->usuario->login($dados)) {
                header("Location: Index.php?controller=usuario&action=home");
                exit();
            } else {
                echo "E-mail ou senha inválidos!";
            }
        }

        require "view/Login.php";
    }
    
    public function home() {
        require "view/Home.php";
    }
}