<?php
 include 'inc/header.php';

?>

<?php 

    if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
        echo "<script> Window.Location ='404.php'; </script>";
    }else{
        $id = $_GET['catid'];
    }

/*    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $catName = $_POST['catName'];

     $updateCat = $cat->update_category($catName,$id);
    }*/
 
?>
<div class="main">
    <div class="content">
        <div class="content_top">
            <?php

            $name_cat=$cat->get_name_by_cat($id);
            if($name_cat){
                while($result_name_cat=$name_cat->fetch_assoc()){

            ?>
            <div class="heading">
                <h3>Danh mục :<?php echo $result_name_cat['catName']?></h3>
            </div>
            <?php
                }}

            ?>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php

            $productbycat=$cat->get_product_by_cat($id);
            if($productbycat){
                while($result_cat=$productbycat->fetch_assoc()){

            ?>
            <div class="grid_1_of_4 images_1_of_4" style="height: 400px ;width: 290px;position: relative;">
                <a href="details.php"><img height="200" src="admin/uploads/<?php echo $result_cat['image']?>" alt="" /></a>
                <h2><?php echo $result_cat['productName']?></h2>
                <p><?php echo $fm->textShorten($result_cat['product_desc'],100)?></p>
                <p><span class="price"><?php echo $fm->format_currency($result_cat['price']).' '.'VND'?></span></p>
                <div class="button"><span><a style="background: #ff7100; color: white; border-radius: 5px;position: absolute;top: 380px;left: 105px; " href="details.php?proid=<?php echo $result_cat['productId']?>" class="details">Xem chi tiết</a></span></div>
            </div>
            <?php
                }
                }else{
                    echo '<span style="font-size:20px; font-weight:bold ;margin: ">__________________________________________________Danh mục này hiện chưa có sản phẩm !!!_____________________________________________<span>';
            }

            ?>
        </div>



    </div>
</div>
<?php
 include 'inc/footer.php';

?>