<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<?php

    include '../lib/session.php';
    Session::checkSession();
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        setupLeftMenu();
        setSidebarHeight();
    });
    </script>

</head>

<body>
    <div class="container_12" style="background-color: #674800;">
        <div class="grid_12 header-repeat">
            <div id="branding" style="background-color: #c29e03; border-radius: 10px;">
                <div class="floatleft logo">
                    <img src="img/logo3.png" alt="Logo" style="height: 100px;width:120px ;" />
                </div>
                <div style="vertical-align: middle;" class="floatleft middle" >
                    <h1>Cửa hàng đồ gỗ mĩ nghệ Điệp Hoa</h1>
                    <p>Địa chỉ : Bắc Sơn -Sóc Sơn- Hà Nội</p>
                    <p>Địện thoại liện hệ : 0335557245</p>
                </div>
                <div class="floatright">
                    <div class="floatleft">
                        <img style="width: 40px;margin-top: 15px;" src="img/img-profile.jpg" alt="Profile Pic" />
                    </div>
                    <div  class="floatleft marginleft10" style="margin-top: 15px;">
                        <ul class="inline-ul floatleft" style="font-size: 16px;font-weight: bold;">
                            <li>Xin chào !!! <?php echo Session::get('adminName') ?> </li>

                            <?php 
                            if(isset($_GET['action']) && $_GET['action'] == 'logout'){
                                Session::destroy();
                            }
                            ?>

                            <li><a style="border: none; color: white;font-size: 20px;font-weight: bold; background-color: red; padding: 10px 10px; border-radius: 5px;" onclick="return confirm('Bạn có chắc chắn thoát khỏi phiên làm việc ?')" href="?action=logout"><span>Đăng xuất</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <div class="nav main" style=" display: flex;color: white;background-color:#c29e03; padding: 10px 0px;margin: 10px 0px; border-radius: 10px;">
                <li style="padding: 0 10px;" class="ic-dashboard"><a href="index.php"><span>_</span></a> </li>
                <li style="padding: 0 10px;" class="ic-form-style"><a href=""><span> Thông tin cá nhân</span></a></li>
                <li style="padding: 0 10px;" class="ic-charts"><a href="changepassword.php"><span> Đổi mật khẩu</span></a></li>
                <li style="padding: 0 10px;" class="ic-grid-tables"><a href="inbox.php"><span> Quản lý đơn đặt hàng</span></a></li>
                <li style="padding: 0 10px;" class="ic-charts"><a href="../index.php"><span> Tới website</span></a></li>
            </div>
        </div>
        <div class="clear">
        </div>