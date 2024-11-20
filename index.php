<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HG BEAUTY</title>
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
                        <form class="form-inline" action="index.php?txtSearch" method="GET">
                            <input class="form-control mr-sm-2 rounded-0 border-secondary" type="text" placeholder="Nhập Tên SP" name="txtSearch">
                            <button class="btn btn-outline-dark rounded-0" type="submit">Tìm</i></button>
                        </form>    
                    </nav>
            </div>
        </div>
        <div class="banner  d-flex justify-content-center align-items-center">
            <!-- <img src="./assets/img/banner.jpg" alt="" width="100%" height=""> -->
            <div class="container">
                <h1 class="">SIÊU PHẨM HÀNG ĐẦU</h1>
                <p><i>Cùng HG Beauty chăm sóc làn da cùng loạt sản phẩm với chất lượng hàng đầu!</i></p>
                <a type="button" class="btn btn-outline-dark rounded-0" href="#allProd">MUA NGAY</a>
            </div>
        </div>
        <div class="content " id="allProd">
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <h5 class="border-bottom pb-2 text-uppercase font-weight-bold">THƯƠNG HIỆU</h5>
                        <ul class="nav flex-column nav-comp">
                            <!-- <li class="nav-item">
                                <a class="nav-link text-uppercase font-weight-bold text-dark" href="#">L'Oreal Professionnel</a>
                            </li> -->
                            <?php
                                include_once("view/vCompany.php");
                            ?>
                        </ul>
                        <h5 class="border-bottom pb-2 text-uppercase font-weight-bold mt-4">KHOẢNG GIÁ</h5>
                        <!-- <form class="form-inline" action="index.php?">
                            <input class="form-control" type="text" name="price-min"> - <input class="form-control" type="text" name="price-max">
                            <input class="form-control" type="submit" class="btn" name="rangePrice">
                        </form> -->
                        <form action="index.php?price-min&&price-max#allProd">
                            <div class="filter-price row d-flex justify-content-center align-items-center">
                                <div class="col-6">
                                    <input type="text" class="form-control" id="email" placeholder="₫ TỪ" required name="price-min">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" placeholder="₫ ĐẾN" required name="price-max">
                                </div>
                                <div class="col-12">
                                    <input type="submit"  class="btn-outline-dark rounded-0 btn mt-2" value="XEM">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-9" >
                        <div class="row">
                            <div class="col-12">
                                <h3 class="font-weight-bold">TẤT CẢ SẢN PHẨM</h3>
                            </div>
                        </div>
                        <div class="row">
                            <!-- <div class="col-4 mt-4">
                                <a href="#" class="content-item">
                                    <img src="./assets/img/loreal-1.jpg" width="100%" alt="">
                                    <p class="title">Serum L'Oréal Professionnel</p>
                                    <p class="price">1.270.000 ₫</p>
                                </a>
                            </div> -->
                            <?php
                                include_once("view/vProduct.php"); 
                            ?>
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