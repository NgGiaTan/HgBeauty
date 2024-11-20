<div class="w-50">
<h3 class="font-weight-bold">THÊM SẢN PHẨM</h3></h3>
<form class="border p-4" action="#" method ="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="">Tên sản phẩm</label>
        <input type="text" class="form-control" placeholder="Enter Name" id="" name="ProdName" required>
    </div>
    <div class="form-group">
        <label for="">Giá sản phẩm</label>
        <input type="number" class="form-control" placeholder="Enter Price" id="" name="ProdPrice" required>
    </div>
    <div class="form-group">
        <label for="">Hình ảnh</label>
        <input type="file" class="form-control-file border" name="ProdFile" required>
    </div>
    <div class="form-group">
        <label for="">Mô tả</label>
        <textarea type="text" class="form-control" rows="5"  placeholder="Enter Description" id="" name="ProdDes" required></textarea>
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
                            echo "<option value='".$row["CompID"]."'>".$row["CompName"]."</option>";
                        }
                    }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary" name="btnAdd">ADD</button>
</form>
</div>

<?php
        include("controller/cProduct.php");
        if(isset($_REQUEST["btnAdd"])){
            //lấy dữ liệu từ form
            $ProdName = $_REQUEST["ProdName"];
            $ProdPrice = $_REQUEST["ProdPrice"];
            $ProdDes = $_REQUEST["ProdDes"];
            $CompID = $_REQUEST["CboCompID"];
            $ProdFile = $_FILES["ProdFile"]["tmp_name"];
            $ImgType = $_FILES["ProdFile"]["type"];
            $ImgName = $_FILES["ProdFile"]["name"];
            $ImgSize = $_FILES["ProdFile"]["size"];

            $p = new ControllerProd();
            //gọi hàm thêm dữ liệu
            $kq = $p->addProd($ProdName, $ProdPrice, $ProdDes, $CompID, $ProdFile, $ImgName, $ImgType, $ImgSize);
            //hiển thị thông báo cần thiết
            if($kq == 1){
                echo "<script>alert('Thêm thành công!')</script>";
                header("refresh:0;url='admin.php?addProd'");
            }elseif($kq == 0){
                echo "<script>alert('Không thể insert!')</script>";
            }elseif($kq == -1){
                echo "<script>alert('Không thể upload ảnh!')</script>";
            }elseif($kq == -2){
                echo "<script>alert('Size quá lớn!' Size phải nhỏ hơn 2MB)</script>";
            }elseif($kq == -3){
                echo "<script>alert('Không đúng định dạng! Ảnh phải thuộc loại PNG hoặc JPG!')</script>";
            }else{
                echo "<script>alert('Lỗi gì đó!')</script>";
            }
        }
    ?>