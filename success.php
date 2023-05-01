<?php
 include 'inc/header.php';

?>

<?php

  if(isset($_GET['orderid']) && $_GET['orderid'] =='order'){
       $customer_id=Session::get('customer_id');
       $insertOrder=$ct->insertOrder($customer_id);
       $delcartcs=$ct->del_data_cart();
       header('Location:success.php');
    }


?>
<style>
    .box_left{
        width: 48%;
        border: 1px solid yellow;
        float: left;
        padding: 10px;
    }
        .box_right{
        width: 48%;
        border: 1px solid yellow;
        float: right;
        padding: 10px;
    }
    .sub_order{
        padding: 10px 50px;
        font-size: 18px;
        color: white;
        border-radius: 8px;
        background: red;
        margin: 10px;
        cursor: pointer;
    }
    p.success_note{
        text-align: center;
        padding: 10px;
        font-size: 16px;
    }
</style>
<form action="" method="POST">
<div class="main">
    <div class="content">
        <div class="section group">
            <br>
           <center> <h2> ĐƠN HÀNG CỦA BẠN ĐÃ ĐƯỢC ĐẶT VÀ SẼ XUẤT XƯỞNG TRONG 1 TUẦN TỚI !!!</h2></center>
           <?php
           $customer_id=Session::get('customer_id');
           $get_amount=$ct->getAmountPrice($customer_id);
           if($get_amount){
            $amount=0;
            while($result= $get_amount->fetch_assoc()){
                    $price=$result['price'];
                    $amount += $price;
            }
           }
           ?>
           <p class="success_note">Cảm ơn bạn đã mua sản phẩm tại website <span style="font-weight: bold; color: red; font-size: 18px">Xưởng đồ gỗ Điệp Hoa  </span>!!!<p>
            <p class="success_note">Chúng tôi sẽ liên hệ với bạn để giao hàng sớm nhất có thể. Kiểm tra đơn hàng vừa đặt của bạn nếu muốn tại đây<a style="font-weight: bold;text-decoration:initial;font-style:italic;" href="orderdetails.php">____ NHẤN ĐỂ XEM ___</a></p>
        </div>
    </div>
    <br>
</div>
</form>
    <?php
 include 'inc/footer.php';

?>