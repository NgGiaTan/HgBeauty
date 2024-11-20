<?php 
    include_once("model/mCompany.php");

    class ControllerCompany {
        function getAllComp() {
            $p = new ModelCompany();
            $tblSP = $p->selectAllComp();

            if(!$tblSP) {
                return false;
            } else {
                // Sử dụng mysqli_num_rows thay cho mysql_num_rows
                if ($tblSP->num_rows > 0) {
                    return $tblSP;
                } else {
                    return false;
                }
            }
        }
    }
?>
