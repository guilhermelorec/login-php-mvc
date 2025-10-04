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

        public function cadastrar($db) {
            $query = "INSERT INTO ". $this->table . "(nome, email, senha) 
            VALUES (:nome, :email, :senha)";
            $stmt = $this->conn->prepare($query);

            $this->nome = htmlspecialchars(strip_tags($this->nome));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->senha = password_hash(strip_tags($this->senha,PASSWORD_BCRYPT));

            return $stmt->execute();
        }

        public function login() {
            $query = "SELECT * FROM " . $this->table . " WHERE email = :email LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":email", $this->email);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if($usuario && password_verify($this->senha, $usuario['senha'])) {
                return usuario;
            }
            return false;
        }
    }
?>