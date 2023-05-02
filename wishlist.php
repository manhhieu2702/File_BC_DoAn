<?php
 include 'inc/header.php';
?>
<?php 


    // if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    //     $quantity=$_POST['quantity'];
    //     $cartId=$_POST['cartId'];
    //  $update_quantity_Cart = $ct->update_quantity_Cart($quantity,$cartId);
    // }


    if(isset($_GET['product_id'])){
        $customer_id=Session::get('customer_id');
        $product_id = $_GET['product_id'];
        $delWishlist = $product->del_product_wishlist($product_id,$customer_id);
    }

?>
<?php

    // if(!isset($_GET['id'])){
        
    //     echo "<meta http-equiv='refresh' content='0;URL=?id=live'>";
    // }

?>
<div class="main">
    <div class="content">
        <div class="cartoption">
            <div class="cartpage">
                <h2 style="display: inline;font-weight: bold;">Sản phẩm yêu thích</h2>
                <br>

                <table class="tblone">
                    <tr>
                        <th width="10%">ID</th>
                        <th width="20%">Sản Phẩm</th>
                        <th width="20%">Ảnh</th>
                        <th width="20%">Giá</th>
                        <th width="10%">Vận chuyển</th>
                        <th width="20%">Thao tác</th>

                    </tr>

                    <?php 
                    $subtotal=0;
                    $customer_id=Session::get('customer_id');
                    $get_wishlist=$product->get_wishlist($customer_id);
                    if($get_wishlist){                        
                        $i=0;
                        while($result=$get_wishlist->fetch_assoc()){
                            $i++;
                    ?>
                    <tr>
                        <td style="vertical-align: middle;"><span><?php echo $i; ?></span></td>
                        <td style="vertical-align: middle;"><?php echo $result['productName']?></td>
                        <td style="vertical-align: middle;"><img style="width: 120px;height: auto;" src="admin/uploads/<?php echo $result['image']?>" alt="" /></td>
                        <td style="vertical-align: middle;"><?php echo $fm->format_currency($result['price']).' '.'VND'?></td>
                        <td style="vertical-align: middle;"><?php echo $fm->format_currency($result['price']*0.01) .' '.'VND'?></td>
                        <td style="vertical-align: middle;">
                            <a style="border: none;padding: 2px 10px; color: white;background-color: blue; border-radius: 5px;" href="details.php?proid=<?php echo $result['productId']?>">Đặt hàng</a>
                            <a style="border: none;padding: 2px 10px; color: white;background-color: red; border-radius: 5px;" onclick="return confirm('Bạn có muốn xóa sản phẩm này khỏi danh sách yêu thích?')" href="?product_id=<?php echo $result['productId']?>">Xóa</a>
                        </td>

                    </tr>
                    <?php

                        
                        }

                    }
                    ?>
                </table>
            </div>
            <div class="shopping">
                <div class="shopleft" style="margin-left: 400px;">
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