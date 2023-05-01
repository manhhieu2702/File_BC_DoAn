<?php 

    include '../classes/adminlogin.php';

?>
<?php 

    $class = new adminlogin();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $adminUser = $_POST['adminUser'];
     $adminPass = $_POST['adminPass'];

     $login_check = $class->login_admin($adminUser,$adminPass);
}

?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <title>Login / Admin</title>
    <link rel="stylesheet" type="text/css" href="css/main.css" media="screen" />
</head>

<!-- <body>
    <div class="container">
        <section id="content">
            <form action="login.php" method="post">
                <h1>Quản trị đăng nhập</h1>

                <div>
                    <input type="text" placeholder="Username" required="" name="adminUser" />
                </div>
                <div>
                    <input type="password" placeholder="Password" required="" name="adminPass" />
                </div>
                <span>
                </span>
                <div>
                    <center><input style="margin-left: 125px;" type="submit" value="Đăng nhập" /></center>
                </div>

            </form>
            <div class="button">
                <a href="#">Hệ thông cửa hàng Mĩ Nghệ Điệp Hoa</a>
            </div>
        </section>
    </div>
</body> -->
<body>
    <div class="app-container app-theme-white body-tabs-shadow" >
        <div class="app-container">
            <div class="h-100 bg-plum-plate bg-animation" style="background-image: linear-gradient(135deg, #de6600 0%, #60a24b 100%) !important;">
                <div class="d-flex h-100 justify-content-center align-items-center">
                    <div class="mx-auto app-login-box col-md-8">
                        <div class="modal-dialog w-100 mx-auto">
                            <div class="modal-content">
                                <div class="modal-body" style="background-color:#ffbc00;">
                                    <div class="h5 modal-title text-center">
                                        <h4 class="mt-2">
                                            <div>Chào mừng trở lại</div>
                                            <span>Nhập thông tin đăng nhập vào bên dưới .</span>
                                        </h4>
                                    </div>
                                    <form class="" action="login.php" method="post">
                                        <div class="form-row">
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="adminUser" id="exampleEmail"
                                                        placeholder="Địa chỉ email..." type="text"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="position-relative form-group">
                                                    <input name="adminPass" id="examplePassword"
                                                        placeholder="Mật khẩu đăng nhập..." type="password"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="position-relative form-check">
                                            <input name="remember" id="exampleCheck" type="checkbox"
                                                class="form-check-input">
                                            <label for="exampleCheck" class="form-check-label">Ghi nhớ đăng nhập</label>
                                        </div>
                                        <span style="color: red;padding-left: 75px;">
                                        <?php 

                                        if(isset($login_check)){
                                            echo $login_check;
                                        }
                                        ?></span>
                                        <div class="modal-footer clearfix" style="background-color:#ffbc00;border: none;">
                                            <div class="float-right">
                                                <button type="submit" class="btn btn-primary btn-lg">Đăng nhập trang quản trị</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="text-center text-white opacity-8 mt-3">Hệ thống quản trị cửa hàng đồ gỗ Điệp Hoa</div>
                        <div class="text-center text-white opacity-8 mt-3">Copyright by Manh Hieu</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
</body>
</html>