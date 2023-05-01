<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php 

    $cat = new category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $catName = $_POST['catName'];

     $insertCat = $cat->insert_category($catName);
    }

?>
<div class="grid_10" style="border-radius:10px ;">
    <div class="box round first grid" style="background-color: #d19405;border-radius:10px ;">
        <h2>Thêm danh mục mới</h2>

        <div class="block copyblock" style="margin-left: 100px;margin-top: 70px;border-radius:10px ;">
                    <?php

        if(isset($insertCat)){
            echo $insertCat;

        }

        ?>
            <form action="catadd.php" method="post">
                <table class="form" >
                    <tr>
                        <span style="color:white; font-weight: bold;font-size: 16px;">Tên danh mục :</span>
                        <td>
                            <input style="height: 40px;border-radius:10px ;width: 500px;" type="text" name="catName" placeholder="  Nhập tên danh mục..." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                             <a href="index.php"><input style="margin-left: 380px; border-radius: 10px;font-weight:bold ; color: white;background-color: red; border:none; width:70px;font-size: 16px;height: 21px; cursor: pointer;"   name="cancel" Value="  Hủy bỏ" /></a>
                            <input style="border-radius: 10px;font-weight:bold ;font-size: 16px; color: white;background-color: blue; border:none;height: 30px;"  type="submit" name="submit" Value="Lưu" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>