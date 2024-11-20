<?php
include_once("ConnectDB.php");

class ModelCompany {
    public function selectAllComp() {
        $db = new ConnectDB();
        if ($db->open()) {
            $conn = $db->getConn();
            $sql = "SELECT * FROM company";
            $result = $conn->query($sql);
            $db->close();
            return $result;
        }
        return false;
    }
}
?>
