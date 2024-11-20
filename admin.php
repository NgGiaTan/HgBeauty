<?php
        session_start();
        if(isset($_REQUEST["btnLogin"])){
            if($_REQUEST["userAdmin"] == "admin" && $_REQUEST["passAdmin"] == "1234"){
                $_SESSION['login'] = true;
            }else{
                $_SESSION['login'] = false;
            }
        } 
        if(isset($_REQUEST['btnExit'])){
            $_SESSION['login'] = false;
        }
        // echo "<script>alert('".$_SESSION['login']."')</script>";
        if(!$_SESSION['login']){
            echo "<script>alert('Sai mật khẩu hoặc tài khoản!')</script>";
            echo header("refresh:0;url='view/vLogin.php'");
        }
       
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HG ADMIN</title>
    <script src="./assets/bootstrap4/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./assets/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div class="main">
        <div class="header d-flex align-items-center fixed-top">
            <div class="container">
                    <nav class="navbar navbar-expand-sm d-flex align-items-center justify-content-between">
                        <ul class="navbar-nav">
                            <li class="nav-item active mr-4">
                            <a class="nav-link text-dark font-weight-bold" href="index.php">TRANG CHỦ</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link text-dark font-weight-bold" href="admin.php">QUẢN LÝ</a>
                            </li>
                        </ul>
                        <a class="navbar-brand" href="#">
                            <img src="./assets/img/logo.png" alt="Logo" style="width:200px;">
                        </a>
                        <form class="form-inline" action="#" method="GET">
                            
                            <button class="btn btn-outline-dark rounded-0" name="btnExit" type="submit"><b>ĐĂNG XUẤT &nbsp;</b><i class="mt-2 ti-close"></i></button>
                        </form>    
                    </nav>
            </div>
        </div>
        <div class="banner  d-flex justify-content-center align-items-center">
            <!-- <img src="./assets/img/banner.jpg" alt="" width="100%" height=""> -->
            <div class="container">
                <h1 class="">TRANG QUẢN LÝ SẢN PHẨM</h1>
                <p><i>Cùng HG Beauty chăm sóc làn da cùng loạt sản phẩm với chất lượng hàng đầu!</i></p>
                <a type="button" class="btn btn-outline-dark rounded-0" href="#allProd">MUA NGAY</a>
            </div>
        </div>
        <div class="content " id="allProd">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <h5 class="border-bottom pb-2 text-uppercase font-weight-bold">QUẢN LÝ</h5>
                        <ul class="nav flex-column nav-comp">
                            <!-- <li class="nav-item">
                                <a class="nav-link text-uppercase font-weight-bold text-dark" href="#">L'Oreal Professionnel</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link text-uppercase font-weight-bold text-dark" href="admin.php?aProd#allProd">Quản lý Sản Phẩm</a>
                                <a class="nav-link text-uppercase font-weight-bold text-dark" href="admin.php?aComp#allProd">Quản lý công ty</a>
                                <a class="nav-link text-uppercase font-weight-bold text-dark" href="admin.php?AddProd">Thêm sản phẩm</a>
                            </li> 
                        </ul>
                    </div>
                    <div class="col-9" >
                        <div class="row">
                            <!-- <div class="col-12">
                                <h3 class="font-weight-bold">SẢN PHẨM</h3></h3>
                            </div> -->
                        </div>
                        <div class="row ">
                            <!--
                            <div class="col-4 mt-4">
                                <a href="#" class="content-item">
                                    <img src="./assets/img/loreal-1.jpg" width="100%" alt="">
                                    <p class="title">Serum L'Oréal Professionnel</p>
                                    <p class="price">1.270.000 ₫</p>
                                </a>
                            </div> -->
                            <?php 
                                if(isset($_REQUEST['aComp'])){
                                    include_once("view/avCompany.php");
                                }
                                elseif(isset($_REQUEST['aProd'])){
                                    include_once("view/avProduct.php");
                                }
                                elseif(isset($_REQUEST['DelProd'])){
                                    include_once("view/vDelProd.php");
                                }
                                elseif(isset($_REQUEST['EditProd'])){
                                    include_once("view/vEditProd.php");
                                }
                                elseif(isset($_REQUEST['AddProd'])){
                                    include_once("view/vAddProd.php");
                                }
                                else{
                                    echo("<div class='col-12'><h3 class='font-weight-bold'>CHÀO MỪNG ĐẾN TRANG ADMIN</h3></h3></div>");
                                }
                            ?>
                            <!-- table here/ table table-striped table-bordered -->

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <img src="./assets/img/footer-logo.png" alt="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 text-left font-italic ">THÔNG TIN LIÊN HỆ <br><br>
                        Tòa nhà GP Invest, 170 Đê La Thành, Ô Chợ Dừa, Đống Đa, Hà Nội <br>
                        0987654321
                        </div>
                    <div class="col-4 text-center font-italic" >
                        <br><br>
                        An oasis of online beauty built specifically so your new cosmetics site can take everyone’s breaths away.</div>
                    <div class="col-4 text-right font-italic ">HƯỚNG DẪN <br><br>
                        Tìm kiếm <br>
                        Giới thiệu <br>
                        Chính sách đổi trả <br>
                        Chính sách bảo mật <br>
                        Điều khoản dịch vụ</div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
