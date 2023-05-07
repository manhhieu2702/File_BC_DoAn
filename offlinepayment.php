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
        font-size: 16px;
        color: white;
        border-radius: 8px;
        background: red;
        margin: 10px;
        cursor: pointer;
    }
</style>
<form action="" method="POST">
<div class="bod" style="font-weight: bold;font-size: 16px;">
<div class="main" >
    <div class="content">
        <div class="section group">

            <div class="heading">
                <h2 align="left" style="font-size: 24px;font-weight: bold;color: gray;">Phương thức thanh toán khi nhận hàng</h2>
            </div>
            <div class="clear"></div>
            <div class="box_left">
                            <div class="cartpage">

                <br>
                <?php 

                if(isset($update_quantity_Cart )){
                    echo $update_quantity_Cart;
                }

                ?>
                <?php 

                if(isset($delCart )){
                    echo $delCart;
                }

                ?>
                <table class="tblone" style="font-size: 16px;">
                    <tr >
                        <th style="font-size: 16px;" width="5%">ID</th>
                        <th style="font-size: 16px;" width="35%">Sản Phẩm</th>
                        <th style="font-size: 16px;" width="15%">Giá</th>
                        <th style="font-size: 16px;" width="20%">Số lượng</th>
                        <th style="font-size: 16px;" width="20%">Vận chuyển</th>
                        <th style="font-size: 16px;" width="20%">Tổng </th>
                    </tr>

                    <?php 

                    $get_product_cart=$ct->get_product_cart();
                    if($get_product_cart){

                        $subtotal=0;
                        $i=0;
                        while($result=$get_product_cart->fetch_assoc()){
                            $i++;
                    ?>
                    <tr>
                        <td style="font-size: 16px;"><?php echo $i?></td>
                        <td style="font-size: 16px;"><?php echo $result['productName']?></td>
                        <td style="font-size: 16px;"><?php echo $fm->format_currency($result['price']) .' '.'VND'?></td>
                        <td>
                                <?php echo $result['quantity']?>

                        </td>
                        <td style="font-size: 16px;"><?php echo $fm->format_currency($result['price']*0.01) .' '.'VND'?></td>
                        <td style="font-size: 16px;">
                            <?php 
                                $total= $result['price'] * $result['quantity'] +$result['price']*0.01;
                                echo $fm->format_currency($total) .' '.'VND';
                            ?>
                        </td>

                    </tr>
                    <?php

                         $subtotal+=$total;
                        }

                    }
                    ?>
                </table>
                <table style="float:right;text-align:left;margin: 10px 0;" width="40%">
                    <tr>
                        <th style="font-size: 16px; font-weight: bold;color: red;">TỔNG THANH TOÁN </th>
                        <td style="font-size: 16px;">
                            <?php 

                            echo $fm->format_currency($subtotal) .' '.'VND' ;
                            Session::set('sum',$subtotal);
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
            </div>
            <div class="box_right">
             <table align="" class="tblone">
                <?php 
                $id=Session::get('customer_id');
                $get_customerinfro=$cs->show_infor_customer($id);
                if($get_customerinfro){
                    while($result_cus=$get_customerinfro->fetch_assoc()){


                    ?>
                <br><br>
                <tr>
                    <td>Họ tên khách hàng </td>
                    <td>:</td>
                    <td><?php echo $result_cus['name'];?></td>
                </tr>
                <tr>
                    <td>Địa chỉ khách hàng </td>
                    <td>:</td>
                    <td><?php echo $result_cus['address'];?></td>
                </tr>
                <tr>
                    <td>Số căn cước công dân </td>
                    <td>:</td>
                    <td><?php echo $result_cus['zipcode'];?></td>
                </tr>
                <tr>
                    <td>Số điện thoại </td>
                    <td>:</td>
                    <td><?php echo $result_cus['phone'];?></td>
                </tr>
                <tr>
                    <td>Địa chỉ email</td>
                    <td>:</td>
                    <td><?php echo $result_cus['email'];?></td>
                </tr>
                <tr>
                    <td colspan="3"><a href="editprofile.php">CẬP NHẬT LẠI</a></td>
                </tr>

                <?php 

                   }
                }

                ?>
            </table>
            </div>

        </div>
    </div>
    <br>
    <center><a href="?orderid=order" class="sub_order">ĐẶT HÀNG</a></center><br><br>
</div>
</div>
</form>
    <?php
 include 'inc/footer.php';

?>