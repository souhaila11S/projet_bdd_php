<?php
class Database {
    private $host = "127.0.0.1";
    private $port = 3307;
    private $dbname = "nouvelle_db";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try{
            $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }

        return $this->conn;
    }
}
?>