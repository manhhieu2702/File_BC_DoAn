<div class="header_bottom">
    <div class="header_bottom_left">
        <div class="section group">

            <?php 
            $getnewTuong= $product->getLastestTuong();
            if($getnewTuong){
                while($resultTuong = $getnewTuong->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2" style="border: 1px solid #ff7100;">
                <div class="listimg listimg_2_of_1">
                    <a href=""> <img src="admin/uploads/<?php echo $resultTuong['image']?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Tượng gỗ</h2>
                    <p><?php echo $resultTuong['productName'] ?></p>
                    <div class="button"><span><a style="background: #ff7100" href="details.php?proid=<?php echo $resultTuong['productId']?>">Thêm vào giỏ </a></span></div>
                </div>
            </div>
            <?php 
                }}            
            ?>

            <?php 
            $getnewTranh= $product->getLastestTranh();
            if($getnewTranh){
                while($resultTranh = $getnewTranh->fetch_assoc()){
            ?>
            <div class="listview_1_of_2 images_1_of_2" style="border: 1px solid #ff7100;">
                <div class="listimg listimg_2_of_1">
                    <a href=""><img src="admin/uploads/<?php echo $resultTranh['image']?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Tranh khắc</h2>
                    <p><?php echo $resultTranh['productName'] ?></p>
                    <div class="button"><span><a style="background: #ff7100" href="details.php?proid=<?php echo $resultTranh['productId']?>">Thêm vào giỏ </a></span></div>
                </div>
            </div>
            <?php 
                }}            
            ?>


            
        </div>
        <div class="section group">


            <?php 
            $getnewCauDoi= $product->getLastestCauDoi();
            if($getnewCauDoi){
                while($resultCauDoi = $getnewCauDoi->fetch_assoc()){
            ?>

            <div class="listview_1_of_2 images_1_of_2" style="border: 1px solid #ff7100;">
                <div class="listimg listimg_2_of_1">
                    <a href="details.php"><img src="admin/uploads/<?php echo $resultCauDoi['image']?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Câu đối</h2>
                    <p><?php echo $resultCauDoi['productName'] ?></p>
                    <div class="button"><span><a style="background: #ff7100" href="details.php?proid=<?php echo $resultCauDoi['productId']?>">Thêm vào giỏ </a></span></div>
                </div>
            </div>

            <?php 
                }}            
            ?>

            <?php 
            $getnewBan= $product->getLastestBanGhe();
            if($getnewBan){
                while($resultBan = $getnewBan->fetch_assoc()){
            ?>

            <div class="listview_1_of_2 images_1_of_2" style="border: 1px solid #ff7100;" >
                <div class="listimg listimg_2_of_1">
                    <a href="details.php"><img src="admin/uploads/<?php echo $resultBan['image']?>" alt="" /></a>
                </div>
                <div class="text list_2_of_1">
                    <h2>Bàn ghế</h2>
                    <p><?php echo $resultBan['productName'] ?></p>
                    <div class="button"><span><a style="background: #ff7100" href="details.php?proid=<?php echo $resultBan['productId']?>">Thêm vào giỏ </a></span></div>
                </div>
            </div>
            <?php 
                }}            
            ?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="header_bottom_right_images">
        <!-- FlexSlider -->

        <section class="slider">
            <div class="flexslider">
                <ul class="slides">
                    <?php 

                    $get_slider= $product->show_slider();
                    if($get_slider){
                        while($result_slider=$get_slider->fetch_assoc()){


                    ?>
                    <li><img height="330" src="admin/uploads/<?php echo $result_slider['slider_image'] ?>" alt="<?php echo $result_slider['sliderName'] ?>" /></li>

                    <?php 

                        }
                    }   

                    ?>
                </ul>
            </div>
        </section>
        <!-- FlexSlider -->
    </div>
    <div class="clear"></div>
</div>