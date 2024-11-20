<?php 
    echo("<div class='col-12'><h3 class='font-weight-bold'>DANH SÁCH SẢN PHẨM</h3></div>");

    include_once("controller/cProduct.php");
    $p = new ControllerProd();
    
    // Số lượng sản phẩm trên mỗi trang
    $prodperpage = 5;
    
    // Xử lý trang hiện tại
    if(isset($_REQUEST['Page'])){
        $page = $_REQUEST['Page'];
        $tbl = $p->getProdByPage($page, $prodperpage);
    } else {
        $page = 1;
        $tbl = $p->getProdByPage($page, $prodperpage);
    }

    if($tbl){
        if(mysqli_num_rows($tbl) > 0){
            echo("<table class='table table-striped table-bordered'>");
            echo("<tr><td>Mã sản phẩm</td><td>Tên sản phẩm</td><td>Giá</td><td>Hình ảnh</td><td>Mô tả</td><td>Mã công ty</td><td>Tùy chỉnh</td></tr>");
            
            // Lặp qua các sản phẩm
            while($row = mysqli_fetch_assoc($tbl)){
                $row['ProdPrice'] = number_format($row['ProdPrice'],0 , ",",".");
                echo("<tr>");
                echo("<td style='text-align: center;'><b>".$row['ProdID']."</b></td>");
                echo("<td style='text-align: center;'><b>".$row['ProdName']."</b></td>");
                echo("<td style='text-align: center;'><b>".$row['ProdPrice']." VNĐ</b></td>");
                echo("<td><img src='assets/img/".$row['ProdImage']."' alt='".$row['ProdName']."' height='120px' width='120px'><br></td>");
                echo("<td style='text-align: center;'><b>".$row['ProdDescription']."</b></td>");
                echo("<td style='text-align: center;'><b>".$row['CompanyID']."</b></td>");
                $ProdID = $row['ProdID'];
                echo("<td class='font-weight-bold h5'> <a href='admin.php?EditProd&&EditID=$ProdID'>Sửa</a>&nbsp;|&nbsp;<a href='admin.php?DelProd&&ProdID=$ProdID' onclick='return confirm(\"Bạn có chắc chắn muốn xóa sản phẩm này!?\")'>Xóa</a></td>");
                echo("</tr>");
            }
            echo("</table>");
        }
    }

    // Tính tổng số trang cho phân trang
    $sumpage = ceil($p->countProd()/$prodperpage);
    echo("<div class='col-12'><div class='pagination d-flex justify-content-center'>");
    for($i = 1; $i <= $sumpage; $i++){
        echo("<a href='admin.php?aProd&&Page=$i#allProd'>$i</a>");
    }
    echo("</div></div>");  
?>
