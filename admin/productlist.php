<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helpers/format.php';?>


<?php  
$pd = new product();
$fm = new Format(); 
if(isset($_GET['productId'])){
        
        $id = $_GET['productId'];
        $delPro = $pd->del_product($id);
    }
   ?>

<div class="grid_10">
    <div class="box round first grid" style="background-color: #d19405;border-radius:10px ;">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">
            <?php

            if(isset($delPro)){
                echo $delPro;

            }
            ?>
            <table class="data display datatable" id="example" style="color: black;font-weight: bold;">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th style="width: 200px;">Tên sản phẩm</th>
                        <th>Tổng kho</th>
                        <th>Giá bán</th>
                        <th>Ảnh minh họa</th>
                        <th>Nơi sản xuất</th>
                        <th style="width: 200px;">Mô tả</th>
                        <th>Kiểu sp</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        
                        $pdlist= $pd->show_product();
                        if($pdlist){
                            $i=0;
                          while($result=$pdlist->fetch_assoc()){ 
                          $i++; 
                    ?>

                    <!--  -->
                    <tr class="odd gradeX">
                        <td style="vertical-align: middle;"><?php echo $i ?></td>
                        <td style="vertical-align: middle;"><?php echo $result['productName'] ?></td>
                        <td style="vertical-align: middle;"><?php echo $result['product_quantity'] .' '.'Sản phẩm' ?></td>
                        <td style="vertical-align: middle;"><?php echo $fm->format_currency($result['price']) .' '.'VND'?></td>
                        <td style="vertical-align: middle;" align="" ><img src="uploads/<?php echo $result['image'] ?>" width="150" /></td>
                        <td style="vertical-align: middle;"><?php echo $result['brandName'] ?></td>
                        <td style="vertical-align: middle;"><?php 

                        echo $fm->textShorten($result['product_desc'],150) 

                        ?>  
                        </td>
                        <th style="vertical-align: middle;"><?php
                                if($result['type']==0){
                                    echo "Hàng đại trà";
                                }elseif($result['type']==1){
                                    echo "Hàng làng nghề";
                                }else{
                                    echo "Hàng mới về";
                                }

                         ?></th>
                        <td style="vertical-align: middle;"><a style="border: none;color: white; background-color: yellow; padding: 2px 10px; border-radius: 5px; color: red;" href="productedit.php?productId=<?php echo $result['productId']?>">Chỉnh sửa</a> || <a style="border: none;color: white; background-color: red; padding: 2px 10px; border-radius: 5px;" onclick="return confirm('Bạn có muốn xóa sản phẩm này?')" href="?productId=<?php echo $result['productId']?>">Xóa</a></td>
                    </tr>
                <?php 
                    }
                    }
                ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    setupLeftMenu();
    $('.datatable').dataTable();
    setSidebarHeight();
});
</script>
<?php include 'inc/footer.php';?>