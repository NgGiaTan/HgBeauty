<?php 
    include_once("controller/cProduct.php");
    $p = new ControllerProd();
    $prodperpage = 6;
    if(isset($_REQUEST['Comp'])){
        $tbl = $p->getAllProdByComp($_REQUEST['Comp']);
    }elseif(isset($_REQUEST['txtSearch'])){
        $tbl = $p->getAllProdBySearch($_REQUEST['txtSearch']);
    }elseif(isset($_REQUEST['Page'])){
        $page = $_REQUEST['Page'];
        $tbl = $p->getProdByPage($page, $prodperpage);
    }elseif(isset($_REQUEST['price-min']) && isset($_REQUEST['price-max'])){
        $min = $_REQUEST['price-min'];
        $max = $_REQUEST['price-max'];
        $tbl = $p->getProdByPrice($min, $max);
    }
    else{
        $page = 1;
        $tbl = $p->getProdByPage($page, $prodperpage);
    }
    if($tbl){
        if(mysqli_num_rows($tbl) > 0){
            
            while($row = mysqli_fetch_assoc($tbl)){
                $row['ProdPrice'] = number_format($row['ProdPrice'],0 , ",",".");
                echo("<div class='col-4 mt-4'>");
                echo("<a href='#' class='content-item'><img src='./assets/img/".$row["ProdImage"]."' width='100%'><p class='title'>".$row['ProdName']."</p><p class='price'>".$row['ProdPrice']." ₫</p></a>");
                echo("</div>");
            }
        
        }else{
            echo "0 result";
        }
    }else{
        echo "không có giá trị";
    }
    // Print ra phần phân trang
    $sumpage = ceil($p->countProd()/$prodperpage);
    echo("<div class='col-12'><div class='pagination d-flex justify-content-center'>");
    for($i = 1;$i <= $sumpage;$i++){
        echo("<a href='index.php?Page=$i#allProd'>$i</a>");
    }
    echo("</div></div>");  
?>