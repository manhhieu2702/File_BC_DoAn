<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Cập nhật tiêu đề và mô tả trang web</h2>
        <div class="block sloginblock">
            <form>
                <table class="form">
                    <tr>
                        <td>
                            <label>Tiêu đề website</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Tiêu đề..." name="title" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label> Khẩu hiệu Website</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Khẩu hiệu..." name="slogan" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input type="submit" name="submit" Value="Update" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>