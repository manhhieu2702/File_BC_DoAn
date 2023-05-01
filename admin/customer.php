<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 

  $filepath=realpath(dirname(__FILE__));
  include ($filepath.'/../classes/customer.php');
  include_once ($filepath.'/../helpers/format.php');

?>
<?php 
    $cs = new customer();
    if(!isset($_GET['customerid']) || $_GET['customerid'] == NULL){
        echo "<script> Window.Location = 'inbox.php'; </script>";
    }else{
        $id = $_GET['customerid'];
    }
    $cs= new customer();
/*    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $catName = $_POST['catName'];

     $updateCat = $cat->update_category($catName,$id);
    }*/
?>
<div class="grid_10">
    <div class="box round first grid" style="background-color: #d19405;border-radius:10px ;">
        <h2>Thông tin khách hàng đặt sản phẩm</h2>

        <div class="block copyblock " style="color: black;font-weight: bold; border-radius:10px ;">

        <?php 

            $get_customer = $cs->show_infor_customer($id);
            if($get_customer){
                while($result = $get_customer->fetch_assoc()){
        ?>
            <form action="" method="post"  style="margin-left: 100px;">
                <table class="form" align="center"  >
                    <tr>
                        <td style="color:white; font-weight: bold;font-size: 16px;">Tên khách hàng</td>
                        
                        <td>
                            <input style="height: 40px;border-radius:10px ;width: auto;font-weight: bold;" type="text" readonly="readonly" value="<?php echo $result['name']?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="color:white; font-weight: bold;font-size: 16px;"> Số điện thoại</td>
                        
                        <td>
                            <input style="height: 40px;border-radius:10px ;width: auto;font-weight: bold;" type="text" readonly="readonly" value="<?php echo $result['phone']?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="color:white; font-weight: bold;font-size: 16px;">Địa chỉ nhà </td>
                        
                        <td>
                            <input style="height: 40px;border-radius:10px ;width: auto;font-weight: bold;" type="text" readonly="readonly" value="<?php echo $result['address']?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="color:white; font-weight: bold;font-size: 16px;">Địa chỉ email</td>
                        
                        <td>
                            <input style="height: 40px;border-radius:10px ;width: auto;font-weight: bold;" type="text" readonly="readonly" value="<?php echo $result['email']?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td style="color:white; font-weight: bold;font-size: 16px;">Số căn cước</td>
                        
                        <td>
                            <input style="height: 40px;border-radius:10px ;width: auto;font-weight: bold;" type="text" readonly="readonly" value="<?php echo $result['zipcode']?>" class="medium" />
                        </td>
                    </tr>
                </table>
            </form>

             <?php
                    } 
                    }
            ?>
        </div>
             <a href="inbox.php"><input style="margin-left: 380px;margin-top: 20px; border-radius: 10px;font-weight:bold ; color: white;background-color: red; border:none; width:70px;font-size: 16px;padding: 10px; cursor: pointer;"   name="cancel" Value=" Quay lại" /></a>
    </div>
</div>
<?php include 'inc/footer.php';?>