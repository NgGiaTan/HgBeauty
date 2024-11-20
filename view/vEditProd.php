<?php
    $ProdID = $_REQUEST['EditID'];
    //lấy dữ liệu từ form
    include("controller/cProduct.php");
    $q = new ControllerProd();
    $tbl = $q->getProdByID($ProdID);
    $r = mysqli_fetch_assoc($tbl);

?>

<div class="w-50">
<h3 class="font-weight-bold">CẬP NHẬT SẢN PHẨM</h3></h3>
<form class="border p-4" action="#" method ="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" class="form-control" placeholder="Enter Name" id="" name="ProdName" value="<?php echo $r['ProdName'] ?>" required>
    </div>
    <div class="form-group">
        <label for="">Giá sản phẩm</label>
        <input type="number" class="form-control" placeholder="Enter Price" id="" name="ProdPrice" value="<?php echo $r['ProdPrice'] ?>" required>
    </div>
    <div class="form-group">
        <label for="">Hình ảnh</label>
        <input type="file" class="form-control-file border" name="ProdFile">
    </div>
    <div class="form-group">
        <label for="">Mô tả</label>
        <textarea type="text" class="form-control" rows="5"  placeholder="Enter Description" id="" name="ProdDes" required><?php echo $r['ProdDescription'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="">Công ty cung cấp</label>
        <select class="form-control" name="CboCompID">
            <?php
                include("Controller/cCompany.php");
                    $c = new ControllerCompany();
                    $table = $c->getAllComp();
                    if(mysqli_num_rows($table)){
                        while($row = mysqli_fetch_assoc($table)){
                            if($r["CompanyID"] == $row["CompID"]){
                                echo "<option selected value='".$row["CompID"]."'>".$row["CompName"]."</option>";
                            }else{
                                echo "<option value='".$row["CompID"]."'>".$row["CompName"]."</option>";
                            }
                        }
                    }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary" name="btnEdit">EDIT</button>
    
</form>
</div>

<?php
        if(isset($_REQUEST["btnEdit"])){
            //lấy dữ liệu từ form
            $ProdName = $_REQUEST["ProdName"];
            $ProdPrice = $_REQUEST["ProdPrice"];
            $ProdDes = $_REQUEST["ProdDes"];
            $CompID = $_REQUEST["CboCompID"];
            if($_FILES["ProdFile"]["name"] == ""){
                $ImgName = $r["ProdImage"];
            }else{
                $ProdFile = $_FILES["ProdFile"]["tmp_name"];
                $ImgType = $_FILES["ProdFile"]["type"];
                $ImgName = $_FILES["ProdFile"]["name"];
                $ImgSize = $_FILES["ProdFile"]["size"];
            }
            
            $ProdID = $_REQUEST['EditID'];
            //gọi hàm sửa dữ liệu
            //$p = new ControllerProd();
            $kq = $q->editProd($ProdID, $ProdName, $ProdPrice, $ProdDes, $CompID, $ProdFile, $ImgName, $ImgType, $ImgSize);
            //hiển thị thông báo cần thiết
            if($kq == 1){
                echo "<script>alert('Sửa thành công!')</script>";
                echo "<script> window.location='admin.php?aProd'</script>";
            }elseif($kq == 0){
                echo "<script>alert('Không thể update!')</script>";
                echo "<script> window.location='admin.php?aProd&EditID=$ProdID'</script>";
            }elseif($kq == -1){
                echo "<script>alert('Không thể upload ảnh!')</script>";
                echo "<script> window.location='admin.php?aProd&EditID=$ProdID'</script>";
            }elseif($kq == -2){
                echo "<script>alert('Size quá lớn!')</script>";
                echo "<script> window.location='admin.php?aProd&EditID=$ProdID'</script>";
            }elseif($kq == -3){
                echo "<script>alert('Không đúng định dạng!')</script>";
                echo "<script> window.location='admin.php?aProd&EditID=$ProdID'</script>";
            }else{
                echo "<script>alert('Sửa thất bại!')</script>";
                echo "<script> window.location='admin.php?aProd&EditID=$ProdID'</script>";
            }

        }
    ?>