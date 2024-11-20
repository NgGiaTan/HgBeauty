<?php 
    $ProdID = $_REQUEST['ProdID'];
    include_once("Controller/cProduct.php");
    $p = new ControllerProd();

    $kq = $p->delProdByID($ProdID);
    if($kq){
        echo "<script>alert('XÓA THÀNH CÔNG!')</script>";
        echo "<script> window.location.href='admin.php?aProd#allProd' </script>";
        //header("refresh:0; url='admin.php?aProd'");
    }else{
        echo "<script>alert('XÓA THẤT BẠI!')</script>";
        echo "<script> window.location.href='admin.php?aProd#allProd' </script>";
    }
    
?>