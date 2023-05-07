<?php
 include 'inc/header.php';

?>

<?php 


    $logincheck =Session::get('customer_login');
    if($logincheck==false){
            header('Location:login.php');
        }


?>



<?php

/*  if(!isset($_GET['proid']) || $_GET['proid'] ==NULL){
        echo "<script> window.location = '404.php'; </script>";
    }else{
        $id = $_GET['proid'];
    }


     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $quantity=$_POST['quantity'];

     $AddtoCart = $ct->add_to_cart($quantity,$id);
    }
*/

?>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h2 align="left" style="font-size: 24px;font-weight: bold;color: green;">Phương thức thanh toán</h2>

            </div>
            <div class="clear"></div>
        </div>
        <br>
           <div style="text-align: center;font-weight: bold; border: 1px solid red ;margin: 0 200px;background: cornsilk; padding: 20px;">
            <h3 style="font-size: 20px;text-decoration: underline; ">Hãy chọn phương thức thanh toán :</h3>
            <br>
            <span style="text-align: center;font-weight: bold; border: none;padding: 7px 15px; background-color: red; border-radius: 7px;"><a style="color: white; text-decoration: none;font-size: 18px;" href="offlinepayment.php">Thanh toán khi nhận hàng.</a></span>
            <br>
            <br>
            <span style="text-align: center;font-weight: bold; border: none;padding: 7px 15px; background-color: red;border-radius: 7px"><a style="color: white;text-decoration: none;font-size: 18px;" href="onlinepayment.php">Thanh toán qua trực tuyến</a> </span> 
            <br>
             <br>
            <span style="text-align: center;font-weight: bold; border: none;padding: 7px 15px; background-color: blue;border-radius: 7px"><a style="color: white;text-decoration: none;font-size: 18px;" href="cart.php">Quay lại giỏ hàng</a> </span> 
            <br>
           </div>   
    </div>
</div>
    <?php
 include 'inc/footer.php';

?>