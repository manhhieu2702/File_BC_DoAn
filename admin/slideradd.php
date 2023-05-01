<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>

<?php 

    $cd = new product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
     

     $insertSlider = $cd->insert_slider($_POST,$_FILES);
    }

?>
<div class="grid_10">
    <div class="box round first grid" style="background-color: #d19405;border-radius:10px ;">
        <h2>Thêm slider mới</h2>
        <div class="block copyblock" style="width: 700px;border-radius:10px ;margin-left: 100px;margin-top: 70px; ">
            <?php 
            if(isset($insertSlider)){
                echo $insertSlider;}
                ?>
            
            <form action="slideradd.php" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>

                        <td>
                            <span style="color:white; font-weight: bold;font-size: 16px; margin-left: 50px;">Tên slider :</span>
                            <input style="height: 40px;border-radius:10px ;width: 500px; margin-left: 10px;" type="text" name="sliderName" placeholder="  Nhập tiêu đề..." class="medium" />
                        </td>
                    </tr>

                    <tr>

                        <td>
                            <span style="color:white; font-weight: bold;font-size: 16px;margin-left: 50px; ">Ảnh slider :</span>
                            <input style="margin-left: 10px;border-radius:10px ;"  type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span style="color:white; font-weight: bold;font-size: 16px;margin-left: 50px;">Kích hoạt :</span>
                            <select style="margin-left: 15px;border-radius:10px ;" name="type">
                                <option value="1">Bật</option>
                                <option value="0">Tắt</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="index.php"><input style="margin-left: 500px; border-radius: 10px;font-weight:bold ; color: white;background-color: red; border:none; width:70px;font-size: 16px;height: 21px; cursor: pointer;"   name="cancel" Value="  Hủy bỏ" /></a>
                            <input style="border-radius: 10px;font-weight:bold ;font-size: 16px; color: white;background-color: blue; border:none;height: 30px;"  type="submit" name="submit" Value="Lưu" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
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