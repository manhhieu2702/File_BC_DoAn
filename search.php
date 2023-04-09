<?php
 include 'inc/header.php';

?>

<?php 




 
?>
<div class="main">
    <div class="content">
        <div class="content_top">
            <?php

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $tukhoa = $_POST['tukhoa'];

     $search_product = $product->search_product($tukhoa);
    }

            ?>
            <div class="heading">
                <h3>Từ khóa tìm kiếm :<?php echo $tukhoa?></h3>
            </div>

            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php

            if($search_product){
                while($result_search=$search_product->fetch_assoc()){

            ?>
            <div class="grid_1_of_4 images_1_of_4">
                <a href="details.php"><img height="200" src="admin/uploads/<?php echo $result_search['image']?>" alt="" /></a>
                <h2><?php echo $result_search['productName']?></h2>
                <p><?php echo $fm->textShorten($result_search['product_desc'],100)?></p>
                <p><span class="price"><?php echo $fm->format_currency($result_search['price']).' '.'VND'?></span></p>
                <div class="button"><span><a href="details.php?proid=<?php echo $result_search['productId']?>" class="details">Xem chi tiết</a></span></div>
            </div>
            <?php
                }
                }else{
                    echo '<span style="font-size:18px; font-weight:bold">_______________________________________________Từ khóa tìm kiếm này không có sản phẩm !!!_____________________________________________<span>';
            }

            ?>
        </div>



    </div>
</div>
<?php
 include 'inc/footer.php';

?>