<?php
include_once("ConnectDB.php");

class ModelProduct {
    public function updateProdByID($ProdID, $ProdName, $ProdPrice, $ProdImg, $ProdDes, $CompID) {
        $db = new ConnectDB();
        if ($db->open()) {
            $conn = $db->getConn();
            $sqlUpdate = "UPDATE product SET ProdName = ?, ProdPrice = ?, ProdImage = ?, ProdDescription = ?, CompanyID = ? WHERE ProdID = ?";
            $stmt = $conn->prepare($sqlUpdate);
            $stmt->bind_param("sdssii", $ProdName, $ProdPrice, $ProdImg, $ProdDes, $CompID, $ProdID);
            $result = $stmt->execute();
            $stmt->close();
            $db->close();
            return $result;
        }
        return false;
    }

    public function insertProd($ProdName, $ProdPrice, $ProdImg, $ProdDes, $CompID) {
        $db = new ConnectDB();
        if ($db->open()) {
            $conn = $db->getConn();
            $sqlInsert = "INSERT INTO product (ProdName, ProdPrice, ProdImage, ProdDescription, CompanyID) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sqlInsert);
            $stmt->bind_param("sdssi", $ProdName, $ProdPrice, $ProdImg, $ProdDes, $CompID);
            $result = $stmt->execute();
            $stmt->close();
            $db->close();
            return $result;
        }
        return false;
    }

    public function deleteProdByID($ProdID) {
        $db = new ConnectDB();
        if ($db->open()) {
            $conn = $db->getConn();
            $sqlDel = "DELETE FROM product WHERE ProdID = ?";
            $stmt = $conn->prepare($sqlDel);
            $stmt->bind_param("i", $ProdID);
            $result = $stmt->execute();
            $stmt->close();
            $db->close();
            return $result;
        }
        return false;
    }

    public function selectProdByPrice($min, $max) {
        $db = new ConnectDB();
        if ($db->open()) {
            $conn = $db->getConn();
            $sql = "SELECT * FROM product WHERE ProdPrice BETWEEN ? AND ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("dd", $min, $max);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $db->close();
            return $result;
        }
        return false;
    }

    public function selectProdByPage($limit, $count) {
        $db = new ConnectDB();
        if ($db->open()) {
            $conn = $db->getConn();
            $sql = "SELECT * FROM product ORDER BY ProdID LIMIT ?, ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ii", $limit, $count);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $db->close();
            return $result;
        }
        return false;
    }

    public function selectAllProdBySearch($search) {
        $db = new ConnectDB();
        if ($db->open()) {
            $conn = $db->getConn();
            $sql = "SELECT * FROM product WHERE ProdName LIKE ?";
            $stmt = $conn->prepare($sql);
            $searchParam = "%$search%";
            $stmt->bind_param("s", $searchParam);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $db->close();
            return $result;
        }
        return false;
    }

    public function selectAllProdByComp($comp) {
        $db = new ConnectDB();
        if ($db->open()) {
            $conn = $db->getConn();
            $sql = "SELECT * FROM product WHERE CompanyID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $comp);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $db->close();
            return $result;
        }
        return false;
    }

    public function selectProdByID($ProdID) {
        $db = new ConnectDB();
        if ($db->open()) {
            $conn = $db->getConn();
            $sql = "SELECT * FROM product WHERE ProdID = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $ProdID);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            $db->close();
            return $result;
        }
        return false;
    }

    public function selectAllProd() {
        $db = new ConnectDB();
        if ($db->open()) {
            $conn = $db->getConn();
            $sql = "SELECT * FROM product";
            $result = $conn->query($sql);
            $db->close();
            return $result;
        }
        return false;
    }
}
?>
