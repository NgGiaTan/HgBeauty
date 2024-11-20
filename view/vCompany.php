<?php
    include_once("controller/cCompany.php");

    $p = new ControllerCompany();

    // Lấy tất cả các công ty từ controller
    $tbl = $p->getAllComp();
    
    if($tbl) {
        if(mysqli_num_rows($tbl) > 0){
            while($row = mysqli_fetch_assoc($tbl)){
                echo "<li class='nav-item'>
                        <a class='nav-link text-uppercase font-weight-bold text-dark' href='index.php?Comp=".$row["CompID"]."'>
                            ".$row["CompName"]."
                        </a>
                      </li>";
            }
        } else {
            echo "Không có kết quả";
        }
    } else {
        echo "Lỗi khi lấy dữ liệu";
    }
?>
