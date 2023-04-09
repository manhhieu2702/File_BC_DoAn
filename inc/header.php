
<?php

    include_once 'lib/session.php';
    Session::init();
?>
<?php 

    include_once 'lib/database.php';
    include_once 'helpers/format.php';

    spl_autoload_register(function($className){
        include_once "classes/".$className.".php";
    });

    
    $db=new Database();
    $fm=new Format();
    $ct= new cart();
    $us= new user();
    $cat= new category();
    $cs= new customer();
    $product= new product();
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE HTML>

<head>
    <title>Store Website</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/menu.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquerymain.js"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript" src="js/nav-hover.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <script type="text/javascript">
    $(document).ready(function($) {
        $('#dc_mega-menu-orange').dcMegaMenu({
            rowItems: '4',
            speed: 'fast',
            effect: 'fade'
        });
    });
    </script>
</head>


<body>
    <div class="wrap">
        <div class="header_top">
            <div class="logo">
                <a href=" index.php"><img src="images/logo2.png" alt="" style="height: 200px; width: 450px"></a>
            </div>
            <div class="header_top_right">
                <div class="search_box">
                    <form action="search.php" method="POST">
                        <input type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa"><input type="submit"
                            value="Tìm kiếm" name="search_product">
                    </form>
                </div>
                <div class=" shopping_cart">
                    <div class="cart">
                        <a href="#" title="View my shopping cart" rel="nofollow">
                            <span class="no_product">
                                <?php 
                                $sum = Session::get("sum");
                                echo $sum .' '.'VND';
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
                <?php

                if(isset($_GET['customer_id'])){

                        $delcartcs=$ct->del_data_cart();
                    Session::destroy();

                }

                ?>
                <div class="login" style="border-radius:7px;">

                    <?php

                    $logincheck =Session::get('customer_login');
                    if($logincheck==false){
                        echo '<a href="login.php" style="font-size: 18px;font-weight: bold;">Đăng nhập</a>';
                    }else{
                        echo '<a href="?customer_id='.Session::get('customer_id').'" style="font-size: 18px;font-weight: bold;">Đăng xuất</a>';
                    }

                    ?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="menu">
            <ul  id="dc_mega-menu-orange" class="dc_mm-orange">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="products.php">Sản phẩm</a> </li>
                <li><a href="topbrands.php">Loại sản phẩm hot</a></li>
                <?php

                $check_cart=$ct->check_cart();
                if($check_cart==true){
                    echo '<li><a href="cart.php">Giỏ hàng</a></li>';
                }else{
                    echo '';
                }
                ?>

                <?php
                $customer_id=Session::get('customer_id');
                $check_order=$ct->check_order($customer_id);
                if($check_order==true){
                    echo '<li><a href="orderdetails.php">Đơn đặt hàng</a></li>';
                }else{
                    echo '';
                }

                ?>
                <li><a href="contact.php">Liên hệ</a> </li>
                <?php 

                $logincheck =Session::get('customer_login');
                if($logincheck==false){
                        echo '';
                    }else{

                        echo '<li><a href="profile.php">Thông tin cá nhân</a> </li>';
                    }
    
                ?>
                <div class="clear"></div>
            </ul>
        </div>
