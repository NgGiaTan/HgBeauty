<?php
echo("<div class='col-12'><h3 class='font-weight-bold'>DANH SÁCH CÔNG TY</h3></div>");

include_once("controller/cCompany.php");

$p = new ControllerCompany();
$tblP = $p->getAllComp();

if (!$tblP) {
    echo("Error retrieving company data.");
} else {
    // Kiểm tra nếu có kết quả trả về
    if (mysqli_num_rows($tblP) > 0) {
        echo("<table class='table table-striped table-bordered'>");
        echo("<tr><td>Mã công ty</td><td>Tên công ty</td><td>Địa chỉ</td><td>Phone</td><td>Email</td><td>Tùy chỉnh</td></tr>");
        
        // Lặp qua các bản ghi để hiển thị dữ liệu
        while ($row = mysqli_fetch_assoc($tblP)) {
            echo("<tr>");
            echo("<td style='text-align: center;'><b>" . $row['CompID'] . "</b></td>");
            echo("<td style='text-align: center;'><b>" . $row['CompName'] . "</b></td>");
            echo("<td style='text-align: center;'><b>" . $row['CompAddress'] . "</b></td>");
            echo("<td style='text-align: center;'><b>" . $row['CompPhone'] . "</b></td>");
            echo("<td style='text-align: center;'><b>" . $row['Email'] . "</b></td>");
            echo("<td class='font-weight-bold h5'><a href='view/EditProd.php?ProdID=" . $row['CompID'] . "'>Sửa</a> &nbsp;|&nbsp; <a href='view/admin.php?ProdID=" . $row['CompID'] . "'>Xóa</a></td>");
            echo("</tr>");
        }
        echo("</table>");
    } else {
        echo("0 result found.");
    }
}
?>
