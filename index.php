<?php
 include 'inc/header.php';
 include 'inc/slider.php';

?>

<div class="main">
    <div class="content" style="padding: 15px 0;">
        <div class="content_top">
            <div class="heading">
                <h3>Sản phẩm làng nghề nổi bật</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php 
            $product_feathered=$product->getproduct_feathered();
            if($product_feathered){
                while($result=$product_feathered->fetch_assoc()){            
            ?>
            <div class="grid_1_of_4 images_1_of_4" style="height: 400px ;width: 230px;">
                <a href="details.php"><img height="200" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
                <h2><?php echo $result['productName'] ?></h2>
                <p><?php echo $fm->textShorten($result['product_desc'],100) ?></p>
                <p><span class="price"> <?php echo $fm->format_currency($result['price']) .' '.'VND' ?></span></p>
                <div class="button"><span><a href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Xem chi tiết</a></span></div>
            </div>
            <?php 
            }
            }
            ?>
        </div>
        <!-- ------------ -->
    </div>
    <div class="content" style="padding: 15px 0;">
        <div class="content_bottom">
            <div class="heading">
                <h3>Sản phẩm mới về</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php 
            $product_new=$product->getproduct_new();
            if($product_new){
                while($result_new=$product_new->fetch_assoc()){            
            ?>
            <div class="grid_1_of_4 images_1_of_4" style="height: 400px; width: 230px;">
                <a href="details.php"><img height="200" src="admin/uploads/<?php echo $result_new['image'] ?>" alt="" /></a>
                <h2><?php echo $result_new['productName'] ?></h2>
                <p><?php echo $fm->textShorten($result_new['product_desc'],100) ?></p>
                <p><span class="price"> <?php echo $fm->format_currency( $result_new['price']) .' '.'VND' ?></span></p>
                <div class="button"><span><a href="details.php?proid=<?php echo $result_new['productId'] ?>" class="details">Xem chi tiết</a></span></div>
            </div>
            <?php 
            }
            }
            ?>
        </div>
        <!-- ------------ -->
    </div>
</div>
<?php
 include 'inc/footer.php';

?>