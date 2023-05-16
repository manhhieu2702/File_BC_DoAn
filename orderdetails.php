<?php
 include 'inc/header.php';
?>
<?php
    $customer_login=Session::get('customer_login');
    if($customer_login==false){
        header('Location:login.php');
    }
        $ct=new cart();

        if(isset($_GET['confirmid'])){

        $id = $_GET['confirmid'];
        $time = $_GET['time'];
        $price = $_GET['price'];
        $shifted_confirm= $ct->shifted_confirm($id,$time,$price);
    }
?>
<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2 style="display: inline;color:green" width="500px;">Đơn hàng đã đặt </h2>
                <br>
                <br>

                <table class="tblone">
                    <tr >
                        <th style="font-size: 18px;" width="5%">STT</th>
                        <th style="font-size: 18px;" width="15%">Sản Phẩm</th>
                        <th style="font-size: 18px;" width="10%">Ảnh</th>
                        <th style="font-size: 18px;" width="10%">Giá</th>
                        <th style="font-size: 18px;" width="10%">Số lượng</th>
                        <th style="font-size: 18px;" width="10%">Ngày đặt</th>
                        <th style="font-size: 18px;" width="15%">Vận chuyển</th>
                        <th style="font-size: 18px;" width="15%">Tổng</th>
                        <th style="font-size: 18px;" width="15%">Tình trạng đơn</th>
                    </tr>

                    <?php 
                    $customer_id=Session::get('customer_id');
                    $get_product_ordered=$ct->get_product_ordered($customer_id);
                    if($get_product_ordered){
                        $i=0;
                        while($result=$get_product_ordered->fetch_assoc()){
                            $i++;
                    ?>
                    <tr>
                        <td><?php echo $i?></td>
                        <td><?php echo $result['productName']?></td>
                        <td><img src="admin/uploads/<?php echo $result['image']?>" alt="" /></td>
                        <td><?php echo $fm->format_currency($result['price']).' ' .'VND'?></td>
                        <td>
                            <form action="" method="post">

                                <?php echo $result['quantity']?>
                            </form>
                        </td>
                        <td><?php echo $fm->formatDate($result['date_order'])?></td>
                        <td><?php echo $fm->format_currency($result['price']*0.01) .' '.'VND'?></td>
                        <td>
                            <?php 
                                $total= $result['price'] * $result['quantity']*1.01;
                                echo $fm->format_currency($total) .' '.'VND';
                            ?>
                        </td>


                        <td><?php 
                            $customer_id=Session::get('customer_id');
                            if($result['status']== '0'){
                                echo 'Đơn đang chờ xử lý ';

                            }elseif($result['status']=='1'){
                            ?>

                            <a style="color: green;" href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?> ">Nhận hàng</a>


                            <?php
                            }else{
                                echo 'Nhận hàng thành công !';
                            }
                            ?>
                        </td>
                    </tr>
                    <?php

                        }

                    }
                    ?>
                </table>
            </div>
            <div class="shopping">
                <div class="shopleft" style="margin-left: 350px;">
                    <a href="index.php"> <img src="images/shop.png" alt="" /></a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php
 include 'inc/footer.php';

?>