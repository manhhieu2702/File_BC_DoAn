<?php
 include 'inc/header.php';
?>
<?php 


    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $quantity=$_POST['quantity'];
        $cartId=$_POST['cartId'];
     $update_quantity_Cart = $ct->update_quantity_Cart($quantity,$cartId);
    }


    if(isset($_GET['cartid'])){
        
        $cartid = $_GET['cartid'];
        $delCart = $ct->del_product_cart($cartid);
    }

?>
<?php

    if(!isset($_GET['id'])){
        
        echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
    }

?>
<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2 style="display: inline;">Giỏ hàng của tôi</h2>
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
                <table class="tblone">
                    <tr>
                        <th width="20%">Sản Phẩm</th>
                        <th width="10%">Ảnh</th>
                        <th width="15%">Giá</th>
                        <th width="25%">Số lượng</th>
                        <th width="25%">Vận chuyển</th>
                        <th width="20%">Tổng tiền</th>
                        <th width="10%">Trang thái</th>
                    </tr>

                    <?php 
                    $subtotal=0;
                    $get_product_cart=$ct->get_product_cart();
                    if($get_product_cart){

                        
                        $total=0;
                        while($result=$get_product_cart->fetch_assoc()){
                            
                    ?>
                    <tr>
                        <td style="vertical-align: middle;"><?php echo $result['productName']?></td>
                        <td style="vertical-align: middle;"><img style="width: 100px;height: auto;" src="admin/uploads/<?php echo $result['image']?>" alt="" /></td>
                        <td style="vertical-align: middle;"><?php echo $fm->format_currency($result['price']).' '.'VND'?></td>
                        <td style="vertical-align: middle;">
                            <form action="" method="post">
                                <input type="hidden" name="cartId" value="<?php echo $result['cartId']?>" />
                                <input type="number" name="quantity" min="0" value="<?php echo $result['quantity']?>" />
                                <input type="submit" name="submit" value="Cập nhật" />
                            </form>
                        </td>
                        <td style="vertical-align: middle;"><?php echo $fm->format_currency($result['price']*0.01) .' '.'VND'?></td>
                        <td style="vertical-align: middle;">
                            <?php 
                                $total= $result['price'] * $result['quantity'] +$result['price']*0.01;
                                echo $fm->format_currency($total) .' '.'VND';
                            ?>
                        </td>
                        <td style="vertical-align: middle;"><a style="border: none;padding: 2px 10px; color: white;background-color: red; border-radius: 5px;" onclick="return confirm('Bạn có muốn xóa sản phẩm này?')" href="?cartid=<?php echo $result['cartId']?>">Xóa</a></td>
                        
                    </tr>
                    <?php

                         $subtotal+=$total;
                        }

                    }
                    ?>
                </table>
                <table style="float:right;text-align:left;" width="40%">
                    <tr style="font-size: 20px;">
                        <th style="font-weight: bold;">TỔNG TIỀN GIỎ HÀNG </th>
                        <td style="font-weight: bold;color: red;">
                            <?php 

                            echo $fm->format_currency($subtotal) .' '.'VND' ;
                            Session::set('sum',$subtotal);
                            ?>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="shopping">
                <div class="shopleft" style="margin-left: 200px;">
                    <a href="index.php"> <img src="images/shop.png" alt="" /></a>
                </div>
                <div class="shopright">
                    <a href="payment.php"> <img src="images/check.png" alt="" /></a>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php
 include 'inc/footer.php';

?>