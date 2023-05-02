<?php
 include 'inc/header.php';
 include 'inc/slider.php';

?>

<div class="main">
    <div class="content"style="padding: 5px 0;">
        <div class="content_top">
            <div class="heading">
                <h3>Tượng gỗ khắc</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php 
            $product_tuong=$product->getproduct_hot_tuong();
            if($product_tuong){
                while($result=$product_tuong->fetch_assoc()){            
            ?>
            <div class="grid_1_of_4 images_1_of_4" style="height: 440px ;width: 330px;position: relative;">
                <a href="details.php"><img height="200" src="admin/uploads/<?php echo $result['image'] ?>" alt="" /></a>
                <h2 style="font-weight: bold;font-size: 16px;"><?php echo $result['productName'] ?></h2>
                <!-- <p><?php echo $fm->textShorten($result['product_desc'],100) ?></p> -->
                <p><span class="price"> <?php echo $fm->format_currency($result['price']) .' '.'VND' ?></span></p>
                <div class="button"><span><a style="background: #ff7100; color: white; border-radius: 5px;position: absolute;top: 380px;left: 110px;" href="details.php?proid=<?php echo $result['productId'] ?>" class="details">Xem chi tiết</a></span></div>
            </div>
            <?php 
            }
            }
            ?>
        </div>
        <!-- ------------ -->
    </div>
    <div class="content"style="padding: 5px 0;">
        <div class="content_top">
            <div class="heading">
                <h3>Tranh khắc chữ</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php 
            $product_tranh=$product->getproduct_hot_tranh();
            if($product_tranh){
                while($result_tranh=$product_tranh->fetch_assoc()){            
            ?>
            <div class="grid_1_of_4 images_1_of_4" style="height: 440px ;width: 330px;position: relative;">
                <a href="details.php"><img height="200" src="admin/uploads/<?php echo $result_tranh['image'] ?>" alt="" /></a>
                <h2 style="font-weight: bold;font-size: 16px;"><?php echo $result_tranh['productName'] ?></h2>
                <p><?php echo $fm->textShorten($result_tranh['product_desc'],100) ?></p>
                <p><span class="price"> <?php echo $fm->format_currency($result_tranh['price']) .' '.'VND' ?></span></p>
                <div class="button"><span><a style="background: #ff7100; color: white; border-radius: 5px;position: absolute;top: 380px;left: 110px;" href="details.php?proid=<?php echo $result_tranh['productId'] ?>" class="details">Xem chi tiết</a></span></div>
            </div>
            <?php 
            }
            }
            ?>
        </div>
        <!-- ------------ -->
    </div>
        <div class="content" style="padding: 5px 0;">
        <div class="content_top">
            <div class="heading">
                <h3>Bàn ghế gỗ(bộ)</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php 
            $product_banghe=$product->getproduct_hot_banghe();
            if($product_banghe){
                while($result_banghe=$product_banghe->fetch_assoc()){            
            ?>
            <div class="grid_1_of_4 images_1_of_4" style="height: 440px ;width: 330px;position: relative;">
                <a href="details.php"><img height="200" src="admin/uploads/<?php echo $result_banghe['image'] ?>" alt="" /></a>
                <h2 style="font-weight: bold;font-size: 16px;"><?php echo $result_banghe['productName'] ?></h2>
                <p><?php echo $fm->textShorten($result_banghe['product_desc'],100) ?></p>
                <p><span class="price"> <?php echo $fm->format_currency($result_banghe['price']) .' '.'VND' ?></span></p>
                <div class="button"><span><a style="background: #ff7100; color: white; border-radius: 5px;position: absolute;top: 380px;left: 110px;" href="details.php?proid=<?php echo $result_banghe['productId'] ?>" class="details">Xem chi tiết</a></span></div>
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