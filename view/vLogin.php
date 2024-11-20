<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="./assets/bootstrap4/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../assets/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/font/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<style>
    body{
        height: 100vh;
        width: 100%;
    }
</style>
<body class="bg-info">
    <center class="mt-5 ">
        <div class="w-50 shadow  border p-5 bg-light">
            <h1 class="text-black"><b>LOGIN</b></h1>
            <form action="../admin.php" method="post">
            <div class="form-group">
                <label class="h4" for="">Account:</label>
                <input type="text" class="form-control" placeholder="Enter Account" id="" name="userAdmin" value="admin">
            </div>
            <div class="form-group">
                <label class="h4" for="pwd">Password:</label>
                <input type="password" class="form-control" placeholder="Enter password" id="" name="passAdmin"  value="1234">
            </div>
            <button type="submit" class="btn btn-primary" name="btnLogin">Login</button>
            </form>
            <br>
            <a href="../index.php"><h4>Về Trang Chủ</h4></a>
        </div>
    </center>
</body>
</html>