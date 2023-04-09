 <?php
 include 'inc/header.php';

?>

<?php 


    $logincheck =Session::get('customer_login');
    if($logincheck){
        header('Location:order.php');
    }

?>

<?php 

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    

     $insertCustomer = $cs->insert_customer($_POST);
    }

?>
<?php 

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    

     $login_Customer = $cs->login_customer($_POST);
    }

?>

<div class="main">
    <div class="content">
        <div class="login_panel">


            <h3>Khách hàng hiện tại</h3>
            <p>Đăng nhập bằng mẫu dưới đây.</p>


                        <?php 

                    if(isset($login_Customer)){
                        echo $login_Customer;
                    }

                        ?>
            <form action="" method="POST">
                <input  type="text" name="email" class="field" placeholder="Nhập email đăng nhập">
                <input  type="password" name="password" class="field" placeholder="Nhập mật khẩu" >
            
                <p class="note">Nếu bạn quên mật khẩu, chỉ cần nhập email của bạn và nhấp vào <a href="#">đây</a></p>
                <div class="buttons">
                    <div><input type="submit" name="login" value="Đăng nhập" class="grey" style=" background:green ;height: 35px;font-size: 18px;font-weight:bold;border-radius:5px;"></input></div>
                </div>
            </form>
        </div>

        <?php 



        ?>

        <div class="register_account">
            <h3>Đăng kí tài khoản khách hàng</h3>
                    <?php 

                    if(isset($insertCustomer)){
                        echo $insertCustomer;
                    }

                        ?>

            <form action="" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" placeholder ="Họ tên" name="name">
                                </div>
                                <div>
                                    <input type="text" placeholder="Số căn cước" name="zipcode">
                                </div>
                                <div>
                                    <input type="text" placeholder="Dịa chỉ email" name="email">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" placeholder="Dịa chỉ" name="address">
                                </div>
                                <div>
                                    <input type="text" placeholder="Điện thoại" name="phone">
                                </div>
                                <div>
                                    <input type="text" placeholder="Mật khẩu" name="password">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="search">
                    <div><input type="submit" name="submit" value="Tạo tài khoản" class="grey" style=" background:green ;height: 35px;font-size: 18px;font-weight:bold;border-radius:5px;"></input></div>
                </div>
                <p class="terms">Bằng cách nhấp vào 'Tạo tài khoản', bạn đồng ý với các thông tin trên và<a href="#">
                        &amp;
                        các điều khoản của cửa hàng</a>.</p>
                <div class="clear"></div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php
 include 'inc/footer.php';

?>