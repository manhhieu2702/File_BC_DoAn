<?php
 include 'inc/header.php';
 include 'inc/slider.php';

?>

<div class="main">
    <div class="content" style="padding: 5px 0;">
        <div class="content_top">
            <div class="heading">
                <h3 style="font-style: italic;font-weight: bold;">Danh sách sản phẩm tổng hợp :</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php 
            $product_list=$product->get_all_product_page();
            if($product_list){
                while($result=$product_list->fetch_assoc()){            
            ?>
            <div class="grid_1_of_4 images_1_of_4" style="height: 440px ;width: 310px; position: relative;">
                <a href="details.php"><img height="200" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
                <h2 style="font-weight: bold;font-size: 16px;"><?php echo $result['productName'] ?></h2>
                <!-- <p><?php echo $fm->textShorten($result['product_desc'],100) ?></p> -->
                <p><span class="price"> <?php echo $fm->format_currency($result['price']) .' '.'VNĐ' ?></span></p>
                <div class="button"><span><a style="background: #ff7100; color: white; border-radius: 5px;position: absolute;top: 380px;left: 110px;" href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Xem chi tiết</a></span></div>
            </div>

            <?php 
            }
            }
            ?>
        </div>
        <!-- ------------ -->
    <center>
        <div class="" style="font-size:20px; padding: 10px 10px;">
            
            <?php 

            $product_all=$product->get_all_product();
            $product_count = mysqli_num_rows($product_all);
            $product_button=ceil( $product_count/8);

            echo '<span style="font-style: italic;font-weight: bold;">TRANG </span>';
            for($i=1;$i<=$product_button;$i++){
                echo '<a style="margin:0 5px; border: none ;background: #ff7100; color: white; padding:5px;border-radius: 5px; " href="products.php?trang='.$i.'">'.$i.'</a>';
            }
            ?>
        </div>
    </center>
    </div>
</div>
<?php
 include 'inc/footer.php';

?>