<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid" style="background-color: #d19405;border-radius:10px ;">
        <h2>Đổi mật khẩu</h2>
        <div class="block" style="margin-left: 50px;">
            <form>
                <table class="form">
                    <tr>
                        <td width="150px">
                            <label style="color: white;">Mật khẩu cũ</label>
                        </td>
                        <td>
                            <input style="height: 40px;border-radius:10px ;width: 500px;" type="password" placeholder="  Nhập mật khẩu cũ..." name="title" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label style="color: white;">Mật khẩu mới</label>
                        </td>
                        <td>
                            <input style="height: 40px;border-radius:10px ;width: 500px;" type="password" placeholder="  Nhập mật khẩu mới.." name="slogan" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <a href="index.php"><input style="margin-left: 330px; border-radius: 10px;font-weight:bold ; color: white;background-color: red; border:none; width:70px;font-size: 16px;height: 21px; cursor: pointer;"   name="cancel" Value="  Hủy bỏ" /></a>
                            <input style="border-radius: 10px;font-weight:bold ;font-size: 16px; color: white;background-color: blue; border:none;height: 30px;" type="submit" name="submit" Value="Cập nhật" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>