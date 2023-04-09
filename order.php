<?php
 include 'inc/header.php';
/* include 'inc/slider.php';*/
?>


<?php 


    $logincheck =Session::get('customer_login');
    if($logincheck==false){
        header('Location:login.php');
    }

?>
<div class="main">
    <div class="content">
        <div class="cartoption">
            
                <div class="not_found"> 


                    <h2 align="left" style="font-size: 30px;font-weight: bold;color: green;">Trang đặt hàng</h2>


                </div>
                
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php
 include 'inc/footer.php';

?>