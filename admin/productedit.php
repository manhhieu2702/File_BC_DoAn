<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>


<?php 


    if(!isset($_GET['productId']) || $_GET['productId'] == NULL){
        echo "<script> Window.Location = 'productlist.php'; </script>";
    }else{
        $id = $_GET['productId'];
    }
    $pd = new product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    

     $updateProduct = $pd->update_product($_POST,$_FILES, $id);
    }

?>

<div class="grid_10">
    <div class="box round first grid" style="background-color: #d19405;border-radius:10px ;">
        <h2>Sửa sản phẩm </h2>
        <div class=" block copyblock" style="width: 900px;border-radius:10px ; ">
                        <?php

            if(isset($updateProduct)){
                echo $updateProduct;

            }
            ?>
            <?php 

            $get_product_by_id=$pd->getproductbyId($id);
            if($get_product_by_id){
                while($result_product =$get_product_by_id->fetch_assoc()){
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label><span style="color:white; font-weight: bold;font-size: 16px;">Tên sản phẩm :</span></label>
                        </td>
                        <td>
                            <input style="height: 40px;border-radius:10px ;width: 500px;" type="text" name="productName" value="<?php echo $result_product['productName']?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><span style="color:white; font-weight: bold;font-size: 16px;">Số lượng kho :</span></label>
                        </td>
                        <td>
                            <input style="height: 40px;border-radius:10px ;width: 50px;" type="number"  value="<?php echo $result_product['product_quantity']?>" name="product_quantity" placeholder="  Nhập số lượng sản phẩm nhập về xưởng..." class="medium" />
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
                                <option

                                <?php 

                                if($result['catId']==$result_product['catId']){ echo 'selected';     }
                                ?>

                                 value="<?php echo $result['catId'] ?>"><?php echo $result['catName']?></option>

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
                                <option


                                <?php 

                                if($result['brandId']==$result_product['brandId']){ echo 'selected';     }
                                ?>

                                 value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName']?></option>

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
                            <textarea name="product_desc" class="tinymce"><?php echo $result_product['product_desc']?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label><span style="color:white; font-weight: bold;font-size: 16px;">Giá thành : </span></label>
                        </td>
                        <td>
                            <input style="height: 40px;border-radius:10px ;width: 500px;" type="text" name="price" value="<?php echo $result_product['price']?>" class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label><span style="color:white; font-weight: bold;font-size: 16px;">Ảnh tải lên :</span></label>
                        </td>
                        <td>
                            <img src="uploads/<?php echo $result_product['image'] ?>" width="200" /><br>
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
                                <?php

                                if($result_product['type']==0){


                                ?>
                                <option selected value="0">Sản phẩm sản xuất đại trà</option>
                                <option value="1">Sản phẩm làng nghề thủ công</option>
                                <option value="2">Sản phẩm mới về</option>

                                <?php 
                                }elseif($result_product['type']==1){   
                                ?>

                                <option value="0">Sản phẩm sản xuất đại trà</option>
                                <option selected value="1">Sản phẩm làng nghề thủ công</option>
                                <option value="2">Sản phẩm mới về</option>
                                <?php 
                                }else{
                                ?>
                                <option value="0">Sản phẩm sản xuất đại trà</option>
                                <option  value="1">Sản phẩm làng nghề thủ công</option>
                                <option selected value="2">Sản phẩm mới về</option>

                                <?php 

                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <a href="productlist.php"><input style="margin-left: 380px; border-radius: 10px;font-weight:bold ; color: white;background-color: red; border:none; width:70px;font-size: 16px;height: 21px; cursor: pointer;"   name="cancel" Value=" Quay lại" /></a>
                            <input style="border-radius: 10px;font-weight:bold ;font-size: 16px; color: white;background-color: blue; border:none;height: 30px;"  type="submit" name="submit" Value="Cập nhật" />
                        </td>
                    </tr>
                </table>
            </form>
            <?php 
            }
            }
            ?>
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
