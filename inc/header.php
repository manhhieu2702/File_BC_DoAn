
<?php

    include_once 'lib/session.php';
    Session::init();
    ob_start();
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
    <title>Đồ gỗ Điệp Hoa</title>
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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
                <a href=" index.php"><img src="images/logo3.png" alt="" style="height: 150px; width: 300px ; margin-left: 80px;"></a>
            </div>
            <div class="header_top_right">
                <div class="search_box">
                    <form action="search.php" method="POST">
                        <input  type="text" placeholder="Tìm kiếm sản phẩm" name="tukhoa"><input style="background-color:#ff7100 ;" type="submit"
                            value="Tìm kiếm" name="search_product">
                    </form>
                </div>
                <div class=" shopping_cart">
                    <div class="cart">
                        <a href="#" title="View my shopping cart" rel="nofollow">
                            <span class="no_product">
                                <?php 
                                $sum = Session::get("sum");
                                echo $fm->format_currency($sum) .' '.'VND';
                                ?>
                            </span>
                        </a>
                    </div>
                </div>
                <?php

                if(isset($_GET['customer_id'])){
                        $customer_id=$_GET['customer_id'];
                        $delcartcs=$ct->del_data_cart();
                        $delcomparecs=$ct->del_data_compare($customer_id);
                    Session::destroy();

                }

                ?>
                <div class="login" style="border-radius:7px; vertical-align: middle;align-items:center ;" >

                    <?php

                    $logincheck =Session::get('customer_login');
                    if($logincheck==false){
                        echo '<a href="login.php" style="font-size: 18px;font-weight: bold;vertical-align: middle;align-items:center ;">Đăng nhập</a>';
                    }else{
                        echo '<a href="?customer_id='.Session::get('customer_id').'" style="font-size: 18px;font-weight: bold;vertical-align: middle;align-items:center ;">Đăng xuất</a>';
                    }

                    ?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="menu">
            <ul  id="dc_mega-menu-orange" class="dc_mm-orange" style="background: linear-gradient(to bottom, #ff7100 55%,#640000 100%)">   
                <li><a style="font-weight: bold;" href="index.php">Trang chủ</a></li>
                <li><a style="font-weight: bold;" href="products.php">Sản phẩm</a> </li>
                <li><a style="font-weight: bold;" >Loại sản phẩm</a>
                    <ul style="background-color:white ;color: black;font-size: 16px;">
                        <li><a style="font-weight: bold;color:#ff7100 ;" href="topbrands.php">Loại sản phẩm hot</a></li>
                    <?php 

                    $get_all_category= $cat->show_category_FE();
                    if($get_all_category){
                        while($result_allcat= $get_all_category->fetch_assoc()){

                    ?>
                    
                    <li>
                    <a style="font-weight: bold;color:#ff7100 ;" href="productbycat.php?catid=<?php echo $result_allcat['catId']?>"><?php echo $result_allcat['catName']?></a>
                    </li>
                    <?php 
                         }
                        }
                        ?>
                    </ul>
                </li>
                <?php

                $check_cart=$ct->check_cart();
                if($check_cart==true){
                    echo '<li><a style="font-weight: bold;" href="cart.php">Giỏ hàng</a></li>';
                }else{
                    echo '';
                }
                ?>

                <?php
                $customer_id=Session::get('customer_id');
                $check_order=$ct->check_order($customer_id);
                if($check_order==true){
                    echo '<li><a style="font-weight: bold;" href="orderdetails.php">Đơn đặt hàng</a></li>';
                }else{
                    echo '';
                }

                ?>
                <?php 

                        $logincheck =Session::get('customer_login');
                        if($logincheck){
                               echo '<li><a style="font-weight: bold;" href="compare.php">So sánh</a> </li>';
                        }


                ?>
                 <?php 

                        $logincheck =Session::get('customer_login');
                        if($logincheck){
                               echo '<li><a style="font-weight: bold;" href="wishlist.php">Yêu thích</a> </li>';
                        }


                ?>
                <li><a style="font-weight: bold;" href="contact.php">Liên hệ</a> </li>
                <?php 

                $logincheck =Session::get('customer_login');
                if($logincheck==false){
                        echo '';
                    }else{

                        echo '<li><a style="font-weight: bold;" href="profile.php">Thông tin cá nhân</a> </li>';
                    }
    
                ?>
                <div class="clear"></div>
            </ul>
        </div>
