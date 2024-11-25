<?php
class ConnectDB {
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct() {
        // Lấy thông tin từ biến môi trường
        $this->host = getenv('DB_HOST') ?: 'localhost';
        $this->username = getenv('DB_USERNAME') ?: 'root';
        $this->password = getenv('DB_PASSWORD') ?: '';
        $this->dbname = getenv('DB_DATABASE') ?: 'hgbeauty';
    }

    public function open() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            return false;
        }
        $this->conn->set_charset("utf8");
        return true;
    }

    public function close() {
        $this->conn->close();
    }

    public function getConn() {
        return $this->conn;
    }
}
?>
