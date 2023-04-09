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
    <div class="box round first grid">
        <h2>Sửa danh mục</h2>

        <div class="block copyblock">

        <?php 

            $get_customer = $cs->show_infor_customer($id);
            if($get_customer){
                while($result = $get_customer->fetch_assoc()){
        ?>
            <form action="" method="post">
                <table class="form" align="center" >
                    <tr>
                        <td>Tên khách hàng</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly="readonly" value="<?php echo $result['name']?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td> Số điện thoại</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly="readonly" value="<?php echo $result['phone']?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ nhà </td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly="readonly" value="<?php echo $result['address']?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>Địa chỉ email</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly="readonly" value="<?php echo $result['email']?>" class="medium" />
                        </td>
                    </tr>
                    <tr>
                        <td>Số căn cước</td>
                        <td>:</td>
                        <td>
                            <input type="text" readonly="readonly" value="<?php echo $result['zipcode']?>" class="medium" />
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