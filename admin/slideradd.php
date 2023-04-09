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
    <div class="box round first grid">
        <h2>Thêm slider mới</h2>
        <div class="block">
            <?php 
            if(isset($insertSlider)){
                echo $insertSlider;}
                ?>
            
            <form action="slideradd.php" method="post" enctype="multipart/form-data">
                <table class="form">
                    <tr>
                        <td>
                            <label>Tên slider</label>
                        </td>
                        <td>
                            <input type="text" name="sliderName" placeholder="nhập tiêu đề..." class="medium" />
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Tải ảnh lên</label>
                        </td>
                        <td>
                            <input type="file" name="image" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Kích hoạt</label>
                        </td>
                        <td>
                            <select name="type">
                                <option value="1">Bật</option>
                                <option value="0">Tắt</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Lưu lại" />
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