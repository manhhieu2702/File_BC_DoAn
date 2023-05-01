<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/brand.php';?>
<?php 
    $brand = new brand();
    if(!isset($_GET['brandId']) || $_GET['brandId'] == NULL){
        echo "<script> Window.Location = 'brandlist.php'; </script>";
    }else{
        $id = $_GET['brandId'];
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $brandName = $_POST['brandName'];

     $updateBrand = $brand->update_brand($brandName,$id);
    }
?>
<div class="grid_10">
    <div class="box round first grid" style="background-color: #d19405;border-radius:10px ;">
        <h2>Sửa tên làng nghề/ xưởng sản xuất</h2>

        <div class="block copyblock">
        <?php

        if(isset($updateBrand)){
            echo $updateBrand;

        }
        ?>
        <?php 

            $get_brand_name = $brand->getbrandbyId($id);
            if($get_brand_name){
                while($result = $get_brand_name->fetch_assoc()){
        ?>
            <form action="" method="post">
                <table class="form" >
                    <tr>
                        <td>
                            <span style="color:white; font-weight: bold;font-size: 16px;">Tên làng nghề/ xưởng sản xuất :</span>
                            <input style="height: 40px;border-radius:10px ;width: 500px; font-size: 16px;font-weight: bold;" type="text" value="<?php echo $result['brandName']?>" name="brandName" placeholder="Nhập tên làng nghề để sửa.." class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="catlist.php"><input style="margin-left: 310px;padding: 10px; border-radius: 10px;font-weight:bold ; color: white;background-color: red; border:none; width:70px;font-size: 16px;height: 21px; cursor: pointer;"   name="cancel" Value="  Hủy bỏ" /></a>
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