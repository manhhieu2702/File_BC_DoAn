<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php 

    $brand = new brand();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $brandName = $_POST['brandName'];

     $insertBrand = $brand->insert_brand($brandName);
    }

?>
<div class="grid_10" style="border-radius:10px ;">
    <div class="box round first grid" style="background-color: #d19405;border-radius:10px ;">
        <h2>Thêm xưởng sản xuất</h2>

        <div class="block copyblock" style="margin-left: 100px;margin-top: 70px;border-radius:10px ;">
                    <?php

        if(isset($insertBrand)){
            echo $insertBrand;

        }

        ?>
            <form action="brandadd.php" method="post">
                <table class="form" >
                    <tr>
                        <td>
                            <span style="color:white; font-weight: bold;font-size: 16px;">Tên xưởng :</span>
                            <input style="height: 40px;border-radius:10px ;width: 500px;"  type="text" name="brandName" placeholder="   Nhập tên xưởng/làng nghề sản xuất..." class="medium" />
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