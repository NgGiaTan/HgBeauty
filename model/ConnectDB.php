<?php
class ConnectDB {
    private $host = "localhost";
    private $username = "root";  // Sử dụng tài khoản root
    private $password = "";      // Không có mật khẩu (hoặc điền mật khẩu nếu có)
    private $dbname = "hgbeauty";
    private $conn;

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
