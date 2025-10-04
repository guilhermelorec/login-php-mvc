<?php
    class Usuario {
        private $conn = null;
        private $table = "usuarios";
        
        public $id;
        public $nome;
        public $email;
        public $senha;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function cadastrar($dados) {
            $query = "INSERT INTO ". $this->table . "(nome, email, senha) 
            VALUES (:nome, :email, :senha)";
            $stmt = $this->conn->prepare($query);
            
            $this->nome = htmlspecialchars(strip_tags($dados['nome']));
            $this->email = htmlspecialchars(strip_tags($dados['email']));
            $senha_limpa = strip_tags($dados['senha']);

            $this->senha = password_hash($senha_limpa, PASSWORD_BCRYPT);

            $stmt->bindParam(":nome", $this->nome);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":senha", $this->senha);

            return $stmt->execute();
        }

        public function login($dados) {
            $this->email = $dados['email'];
            $this->senha = $dados['senha'];
            
            $query = "SELECT * FROM " . $this->table . " WHERE email = :email LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":email", $this->email);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($usuario && password_verify($this->senha, $usuario['senha'])) {
                return $usuario;
            }
            return false;
        }
    }
?>