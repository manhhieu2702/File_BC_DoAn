<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>


<?php 

    $pd = new product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    

     $insertProduct = $pd->insert_product($_POST,$_FILES);
    }

?>

<div class="grid_10">
    <div class="box round first grid" style="background-color: #d19405;border-radius:10px ;">
        <h2>Thêm sản phẩm mới</h2>
        <div class=" block copyblock" style="width: 900px;border-radius:10px ; " >
                        <?php

            if(isset($insertProduct)){
                echo $insertProduct;

            }
            ?>
            <form action="productadd.php" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label><span style="color:white; font-weight: bold;font-size: 16px;">Tên sản phẩm :</span></label>
                        </td>
                        <td>
                            <input style="height: 40px;border-radius:10px ;width: 500px;"  type="text" name="productName" placeholder="  Nhập tên sản phẩm..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><span style="color:white; font-weight: bold;font-size: 16px;">Danh mục sản phẩm :</span></label> 
                        </td>
                        <td>
                            <select style="height: 40px;border-radius:10px ;" id="select" name="category">
                                <option>Chọn danh mục</option>
                                <?php 
                                $cat= new category();
                                $catlist= $cat->show_category();
                                if($catlist){

                                    while($result= $catlist->fetch_assoc()){

                                ?>
                                <option value="<?php echo $result['catId'] ?>"><?php echo $result['catName']?></option>

                                <?php
                                }
                                } 
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><span style="color:white; font-weight: bold;font-size: 16px;">Làng nghề/xưởng sx :</span></label>
                        </td>
                        <td>
                            <select style="height: 40px;border-radius:10px ; width: 300px;" id="select" name="brand">
                                <option>Chọn làng nghề/xưởng sản xuất</option>
                                                                <?php 
                                $brand= new brand();
                                $brandlist= $brand->show_brand();
                                if($catlist){

                                    while($result= $brandlist->fetch_assoc()){

                                ?>
                                <option value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName']?></option>

                                <?php
                                }
                                } 
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label><span style="color:white; font-weight: bold;font-size: 16px;">Mô tả sản phẩm :</span></label>
                        </td>
                        <td>
                            <textarea name="product_desc" class="tinymce"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><span style="color:white; font-weight: bold;font-size: 16px;">Giá thành :</span></label>
                        </td>
                        <td>
                            <input style="height: 40px;border-radius:10px ;width: 500px;" type="text" name="price" placeholder="  Giá thành.." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label><span style="color:white; font-weight: bold;font-size: 16px;">Ảnh tải lên :</span></label>
                        </td>
                        <td>
                            <input style="height: 40px;border-radius:10px ; " type="file" name="image" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label><span style="color:white; font-weight: bold;font-size: 16px;">Kiểu sản phẩm :</span></label>
                        </td>
                        <td>
                            <select style="height: 40px;border-radius:10px ; width: 300px;" id="select" name="type">
                                <option>Chọn kiểu sản phẩm</option>
                                <option value="0">Sản phẩm sản xuất đại trà</option>
                                <option value="1">Sản phẩm làng nghề thủ công</option>
                                <option value="2">Sản phẩm mới về</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <a href="index.php"><input style="margin-left: 380px; border-radius: 10px;font-weight:bold ; color: white;background-color: red; border:none; width:70px;font-size: 16px;height: 21px; cursor: pointer;"   name="cancel" Value=" Quay lại" /></a>
                            <input style="border-radius: 10px;font-weight:bold ;font-size: 16px; color: white;background-color: blue; border:none;height: 30px;"  type="submit" name="submit" Value="Lưu" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src=" js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
    setupTinyMCE();
    setDatePicker('date-picker');
    $('input[type="checkbox"]').fancybutton();
    $('input[type="radio"]').fancybutton();
});
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>
