<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php 
    $cat = new category();
    if(!isset($_GET['catId']) || $_GET['catId'] == NULL){
        echo "<script> Window.Location = 'catlist.php'; </script>";
    }else{
        $id = $_GET['catId'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $catName = $_POST['catName'];

     $updateCat = $cat->update_category($catName,$id);
    }
?>
<div class="grid_10">
    <div class="box round first grid" style="background-color: #d19405;border-radius:10px ;">
        <h2>Sửa danh mục</h2>

        <div class="block copyblock">
        <?php

        if(isset($updateCat)){
            echo $updateCat;

        }
        ?>
        <?php 

            $get_cate_name = $cat->getcatbyId($id);
            if($get_cate_name){
                while($result = $get_cate_name->fetch_assoc()){
        ?>
            <form action="" method="post">
                <table class="form" >
                    <tr>
                        <td>
                            <span style="color:white; font-weight: bold;font-size: 16px;">Tên danh mục :</span>
                            <input style="height: 40px;border-radius:10px ;width: 500px; font-size: 16px;font-weight: bold;"  type="text" value="<?php echo $result['catName']?>" name="catName" placeholder=" Nhập tên danh mục để sửa.." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="catlist.php"><input style="margin-left: 380px;padding: 10px; border-radius: 10px;font-weight:bold ; color: white;background-color: red; border:none; width:70px;font-size: 16px;height: 21px; cursor: pointer;"   name="cancel" Value="Hủy bỏ" /></a>
                            <input style="border-radius: 10px;font-weight:bold ;padding: 10px;font-size: 16px; color: white;background-color: blue; border:none;"  type="submit" name="submit" Value=" Chỉnh sửa" />
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
<?php include 'inc/footer.php';?>