<?php 
    include_once("model/mProduct.php");

    class ControllerProd {
        function editProd($ProdID, $ProdName, $ProdPrice, $ProdDes, $CompID, $ProdFile, $ImgName, $ImgType, $ImgSize) {
            if ($ProdFile == "") {
                $p = new ModelProduct();
                $update = $p->updateProdByID($ProdID, $ProdName, $ProdPrice, $ImgName, $ProdDes, $CompID);

                if ($update) {
                    return 1;
                } else {
                    return 0; // không thể update
                }
            } else {
                if ($ImgType == "image/png" || $ImgType == "image/jpg" || $ImgType == "image/jpeg") {
                    if ($ImgSize <= 2 * 1024 * 1024) {
                        if (move_uploaded_file($ProdFile, "assets/img/" . $ImgName)) {
                            $p = new ModelProduct();
                            $update = $p->updateProdByID($ProdID, $ProdName, $ProdPrice, $ImgName, $ProdDes, $CompID);

                            if ($update) {
                                return 1;
                            } else {
                                return 0; // không thể update
                            }
                        } else {
                            return -1; // không thể upload ảnh
                        }
                    } else {
                        return -2; // kích thước quá lớn
                    }
                } else {
                    return -3; // không đúng loại ảnh
                }
            }
        }

        function addProd($ProdName, $ProdPrice, $ProdDes, $CompID, $ProdFile, $ImgName, $ImgType, $ImgSize) {
            if ($ImgType == "image/png" || $ImgType == "image/jpg" || $ImgType == "image/jpeg") {
                if ($ImgSize <= 2 * 1024 * 1024) {
                    if (move_uploaded_file($ProdFile, "assets/img/" . $ImgName)) {
                        $p = new ModelProduct();
                        $ins = $p->insertProd($ProdName, $ProdPrice, $ImgName, $ProdDes, $CompID);

                        if ($ins) {
                            return 1;
                        } else {
                            return 0; // không thể insert
                        }
                    } else {
                        return -1; // không thể upload
                    }
                } else {
                    return -2; // kích thước quá lớn
                }
            } else {
                return -3; // không đúng loại ảnh
            }
        }

        function delProdByID($ProdID) {
            $p = new ModelProduct();
            $kq = $p->deleteProdByID($ProdID);
            return $kq;
        }

        function getProdByPrice($min, $max) {
            $p = new ModelProduct();
            $tbl = $p->selectProdByPrice($min, $max);
            return $tbl;
        }

        function getProdByPage($page, $prodperpage) {
            $p = new ModelProduct();
            $tblProdByPage = $p->selectProdByPage(($page - 1) * $prodperpage, $prodperpage);
            return $tblProdByPage;
        }

        function countProd() {
            $p = new ModelProduct();
            $tbl = $p->selectAllProd();
            return $tbl->num_rows; // sử dụng num_rows thay vì mysql_num_rows
        }

        function getAllProdBySearch($search) {
            $p = new ModelProduct();
            $tblProd = $p->selectAllProdBySearch($search);

            if (!$tblProd) {
                return false;
            } else {
                // Sử dụng mysqli_num_rows thay cho mysql_num_rows
                if ($tblProd->num_rows > 0) {
                    return $tblProd;
                } else {
                    return false;
                }
            }
        }

        function getAllProdByComp($comp) {
            $p = new ModelProduct();
            $tblProd = $p->selectAllProdByComp($comp);

            if (!$tblProd) {
                return false;
            } else {
                // Sử dụng mysqli_num_rows thay cho mysql_num_rows
                if ($tblProd->num_rows > 0) {
                    return $tblProd;
                } else {
                    return false;
                }
            }
        }

        function getProdByID($ProdID) {
            $p = new ModelProduct();
            $tblP = $p->selectProdByID($ProdID);

            if (!$tblP) {
                return false;
            } else {
                // Sử dụng mysqli_num_rows thay cho mysql_num_rows
                if ($tblP->num_rows > 0) {
                    return $tblP;
                } else {
                    return false;
                }
            }
        }

        function getAllProd() {
            $p = new ModelProduct();
            $tblP = $p->selectAllProd();

            if (!$tblP) {
                return false;
            } else {
                // Sử dụng mysqli_num_rows thay cho mysql_num_rows
                if ($tblP->num_rows > 0) {
                    return $tblP;
                } else {
                    return false;
                }
            }
        }
    }
?>