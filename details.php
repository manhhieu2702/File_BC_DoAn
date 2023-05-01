<?php
 include 'inc/header.php';

?>

<?php

  if(!isset($_GET['proid']) || $_GET['proid'] ==NULL){
        echo "<script> window.location = '404.php'; </script>";
    }else{
        $id = $_GET['proid'];
    }

     // Đoạn if ngay dưới này có thể bị bỏ đi hoặc dùng lại trong video ng ta bỏ đi
     // 
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $quantity=$_POST['quantity'];

     $AddtoCart = $ct->add_to_cart($quantity,$id);
    }

        $customer_id=Session::get('customer_id');
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
        $productid=$_POST['productid'];
        $insertCompare = $product->insertCompare($productid,$customer_id);
    }


?>
<div class="main">
    <div class="content">
        <div class="section group">


            <?php 

            $get_product_details= $product->get_details($id);
            if($get_product_details){

                while($result_details= $get_product_details->fetch_assoc()){


            ?>
            <div class="cont-desc span_1_of_2">
                <div class="grid images_3_of_2">
                    <img src="admin/uploads/<?php echo $result_details['image'] ?>" alt="" />
                </div>
                <div class="desc span_3_of_2">
                    <h2><?php echo $result_details['productName'] ?></h2>
                    <p><?php echo $fm->textShorten($result_details['product_desc'],150) ?></p>
                    <div class="price">
                        <p>Giá bán: <span><?php echo $fm->format_currency($result_details['price']) .' '.'VND'?></span></p>
                        <p>Danh mục: <span><?php echo $result_details['catName'] ?></span></p>
                        <p>Xưởng sản xuất:<span><?php echo $result_details['brandName'] ?></span></p>
                    </div>
                    <div class="add-cart">
                        <form action="" method="post">
                            <input type="number" class="buyfield" name="quantity" min="1" value="1" />
                            <input type="submit" class="buysubmit" name="submit" value="Đặt hàng"
                                style="background-color:green;" />

                        </form>
                        <?php 

                            if(isset($AddtoCart)){
                                echo '<br><br>';
                                echo '<span style="color:red;font-size:18px">Sản phẩm đã có trong giỏ hàng !!!</span>';
                            }
                            ?>
                    </div>
                    <div class="add-cart">
                        <form action="" method="post">
                            <!-- <a href="?wlist=<?php echo $result_details['productId']?>" class="buysubmit">Thêm Wishlist</a> -->
                            <!-- <a href="?compare=<?php echo $result_details['productId']?>" class="buysubmit">So sánh</a> -->
                            <input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>" />
                            
                            <?php 

                            $login_check =Session::get('customer_login');
                            if($login_check){
                                    echo '<input type="submit" class="buysubmit" name="compare" value="So sánh" style="background-color:green;" />';
                                    echo '<input type="submit" class="buysubmit" name="wishlist" value="Thêm vào wishlist" style="background-color:green; margin : 0 10px" />';
                                }else{
                                    echo ' ';
                                }
                
                            ?>
                            <?php 

                                if(isset($insertCompare)){
                                    echo $insertCompare;
                                }
                            ?>
                        </form>
                    </div>
                </div>
                <div class="product-desc">
                    <h2 style="background: #ff7100; color: white; border-radius: 5px;">Thông tin chi tiết sản phẩm</h2>
                    <p ><span style=" color:black; font-size: 24px; font-weight: bold;"><?php echo $result_details['product_desc'] ?></span></p>
                </div>

            </div>
            <?php 
             }
            }
            ?>

            <div class=" rightsidebar span_3_of_1">
                <h2>Danh mục loại sản phẩm</h2>
                <ul>
                    <?php 

                    $get_all_category= $cat->show_category_FE();
                    if($get_all_category){
                        while($result_allcat= $get_all_category->fetch_assoc()){

                    ?>
                    <li><a style="font-size: 16px;color: black;" href="productbycat.php?catid=<?php echo $result_allcat['catId']?>"><?php echo $result_allcat['catName']?></a></li>
                    <?php 
                         }
                        }
                        ?>
                </ul>

            </div>
        </div>
    </div>
    <?php
 include 'inc/footer.php';

?>