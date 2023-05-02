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
        $product_stock=$_POST['product_stock'];
        $quantity=$_POST['quantity'];
     $AddtoCart = $ct->add_to_cart($quantity,$product_stock,$id);
    }

    $customer_id=Session::get('customer_id');
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {
        $productid=$_POST['productid'];
        $insertCompare = $product->insertCompare($productid,$customer_id);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {
        $productid=$_POST['productid'];
        $insertWishlist = $product->insertWishlist($productid,$customer_id);
    }
    if(isset($_POST['binhluan_submit'])){
        $insert_binhluan = $cs->insert_binhluan();
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
                    <h2 style="font-weight: bold;"><?php echo $result_details['productName'] ?></h2>
                <h4 style="font-weight: bold; color: black;font-size: 16px;"><?php echo $fm->textShorten($result_details['product_desc'],150) ?></h4>

                    <div class="price">
                        <p>Số lượng kho có : <span><?php echo $result_details['product_quantity'] .' '.' Sản phẩm'?></span></p>
                        <p>Giá bán : <span><?php echo $fm->format_currency($result_details['price']) .' '.'VND'?></span></p>
                        <p>Danh mục : <span><?php echo $result_details['catName'] ?></span></p>
                        <p>Xưởng sản xuất : <span><?php echo $result_details['brandName'] ?></span></p>
                    </div>
                    <div class="add-cart">
                        <form action="" method="post" >
                            <input type="hidden" class="buyfield" name="product_stock" value="<?php echo $result_details['product_quantity']?>" />
                            <input type="number" class="buyfield" name="quantity" min="1" value="1" />
                            <?php

                            if($result_details['product_quantity']>0){
                            ?>

                            <input type="submit" class="buysubmit" name="submit" value="Đặt hàng"
                                style="background-color:green; margin-left: 10px;" />
                            <?php 

                                }
                            ?>
                        </form>
                        <br>
                        <span style="pading : 10px 10px; color: red; font-weight: bold; margin-top: 10px;"><?php 

                            if(isset($AddtoCart)){
                                echo $AddtoCart;
                            }
                            ?></span>
                    </div>
                    <div class="add-cart" >
                        <form action="" method="post" style="float: left;">
                          
                            <input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>" />
                            
                            <?php 

                            $login_check =Session::get('customer_login');
                            if($login_check){
                                    echo '<input type="submit" class="buysubmit" name="compare" value="So sánh" style="background-color:green; margin : 0px 5px" />';
                                
                                }else{
                                    echo ' ';
                                }
                
                            ?>
                            
                        </form>

                        <!-- Thêm vào wish list -->

                        <form action="" method="post" >
                            <!-- <a href="?wlist=<?php echo $result_details['productId']?>" class="buysubmit">Thêm Wishlist</a> -->
                            <!-- <a href="?compare=<?php echo $result_details['productId']?>" class="buysubmit">So sánh</a> -->
                            <input type="hidden" name="productid" value="<?php echo $result_details['productId'] ?>" />
                            
                            <?php 

                            $login_check =Session::get('customer_login');
                            if($login_check){
                                    
                                    echo '<input type="submit" class="buysubmit" name="wishlist" value="Thêm vào Yêu thích" style="background-color:green; margin : 0px 5px" />';
                                }else{
                                    echo ' ';
                                }
                
                            ?>
                           
                        </form>
                        <?php 

                                if(isset($insertCompare)){
                                    echo $insertCompare;
                                }
                            ?>
                         <?php 

                                if(isset($insertWishlist)){
                                    echo $insertWishlist;
                                }
                            ?>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="product-desc" style=" color: black; font-size: 16px; font-weight: bold;">
                    <h2 style="background: #ff7100; color: white; border-radius: 5px;">Thông tin chi tiết sản phẩm</h2>
                    <p ><span><?php echo $result_details['product_desc'] ?></span></p>
                </div>

            </div>
            <?php 
             }
            }
            ?>

            <div class=" rightsidebar span_3_of_1">
                <h2 style="color: #ff7100;font-weight: bold;">Danh mục loại sản phẩm</h2>
                <ul>
                    <?php 

                    $get_all_category= $cat->show_category_FE();
                    if($get_all_category){
                        while($result_allcat= $get_all_category->fetch_assoc()){

                    ?>
                    <li><a style="font-size: 16px;color: grey;font-weight: bold;" href="productbycat.php?catid=<?php echo $result_allcat['catId']?>"><?php echo $result_allcat['catName']?></a></li>
                    <?php 
                         }
                        }
                        ?>
                </ul>

                </div>

        </div>
            <span style="color: #ff7100;font-weight: bold;font-size: 16px;">Đánh giá sản phẩm</span>
            <div class="binhluan">
                <div class="row">
                    <div class="col-md-8">
                            <?php 

                                if(isset($insert_binhluan)){
                                    echo $insert_binhluan;
                                }
                            ?>
                        <form action="" method="POST">
                            <p><input type="hidden" value="<?php echo $id?>" name="product_id_binhluan" /></p>
<input style="max-width: 400px;" type="text" placeholder=" Điền tên người đánh giá" class="form-control" name="tennguoibinhluan">
<br>
<textarea style="max-width: 900px;height: 200px;" placeholder=" Đánh giá.........." class="form-control" name="binhluan"></textarea>
                        <p><input style="margin: 10px 800px;" type="submit" name="binhluan_submit" class="btn btn-success" value=" Đánh giá" /></p>
                        </form>
                    </div>
                </div>
            </div>
    </div>
    <?php
 include 'inc/footer.php';

?>