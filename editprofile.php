<?php
 include 'inc/header.php';

?>

<?php 


    $logincheck =Session::get('customer_login');
    if($logincheck==false){
            header('Location:login.php');
        }


?>



<?php

/*if(!isset($_GET['proid']) || $_GET['proid'] ==NULL){
        echo "<script> window.location = '404.php'; </script>";
    }else{
        $id = $_GET['proid'];
    }*/

    $id=Session::get('customer_id');
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {


     $UpdateCustomer = $cs->update_customer($_POST,$id);
    }
?>
<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h2 align="left" style="font-size: 24px;font-weight: bold;color:  #ff7100;">Cập nhật thông tin cá nhân </h2>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <form action="" method="POST">
                            <?php 

                           if(isset($UpdateCustomer)){

                            echo '<span style=" margin-left: 450px;font-size: 20px ">'.$UpdateCustomer.'</span>';
                           }
                           ?>
            <table align="" class="tblone" style="width: 800px; margin-left: 250px;">
                <?php 
                $id=Session::get('customer_id');
                $get_customerinfro=$cs->show_infor_customer($id);
                if($get_customerinfro){
                    while($result_cus=$get_customerinfro->fetch_assoc()){


                    ?>
                <br><br>
                <tr>
                    <td>Họ tên khách hàng </td>
                    <td>:</td>
                    <td><input style="height:30px;" type="text" name="name" value="<?php echo $result_cus['name'];?>"><td>
                </tr>
                <tr>
                    <td>Địa chỉ khách hàng </td>
                    <td>:</td>
                    <td><input style="height:30px;" type="text" name="address" value="<?php echo $result_cus['address'];?>"><td>
                </tr>
                <tr>
                    <td>Số căn cước công dân </td>
                    <td>:</td>
                    <td><input style="height:30px;" type="text" name="zipcode" value="<?php echo $result_cus['zipcode'];?>"><td>
                </tr>
                <tr>
                    <td>Số điện thoại </td>
                    <td>:</td>
                    <td><input style="height:30px;" type="text" name="phone" value="<?php echo $result_cus['phone'];?>"><td>
                </tr>
                <tr>
                    <td>Địa chỉ email</td>
                    <td>:</td>
                    <td><input style="height:30px;" type="text" name="email" value="<?php echo $result_cus['email'];?>"><td>
                </tr>
                <tr>
                    <td colspan="3"><input type="submit" name="save" value="Cập nhật" class="grey" style="width:150px;height:40px; background-color:  #ff7100;font-weight: bold;"></td>
                </tr>

                <?php 

                   }
                }

                ?>
            </table>
        </form>
            <br><br>
        </div>        
    </div>
</div>
    <?php
 include 'inc/footer.php';

?>