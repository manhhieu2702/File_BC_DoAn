<?php include_once 'inc/header.php';?>
<?php include_once 'inc/sidebar.php';?>

<?php 

  $filepath=realpath(dirname(__FILE__));
  include ($filepath.'/../classes/cart.php');
  include_once ($filepath.'/../helpers/format.php');

?>
<?php
$ct= new cart();
    if(isset($_GET['shiftid'])){

        $id = $_GET['shiftid'];
        $time = $_GET['time'];
        $price = $_GET['price'];
        $shifted= $ct->shifted($id,$time,$price);
    }



    if(isset($_GET['delid'])){

        $id = $_GET['delid'];
        $time = $_GET['time'];
        $price = $_GET['price'];
        $del_shifted= $ct->del_shifted($id,$time,$price);
    }

?>
<div class="grid_10">
    <div class="box round first grid" style="background-color: #d19405;border-radius:10px ;">
        <h2>Yêu cầu gửi đến</h2>
        <div class="block">
            <?php 

            if(isset($shifted)){
                echo $shifted;
            }
            ?>
            <?php 

            if(isset($del_shifted)){
                echo $del_shifted;
            }
            ?>
            <table class="data display datatable" id="example" style="color: black;font-weight: bold;">
                <thead>
                    <tr>
                        <th width="5%">STT</th>
                        <th width="12.5%">Ngày-giờ đặt</th>
                        <th width="5%">Mã đơn</th>
                        <th width="15%">Sản phẩm</th>
                        <th width="5%">Số lượng</th>
                        <th width="12.5%">Giá</th>
                        <th width="10">Mã khách hàng</th>
                        <th width="15%">Địa chỉ</th>
                        <th width="10%">Quản lý đơn</th>
                        <th width="10%">In đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

                        $ct= new cart();
                        $fm= new Format();
                        $get_inbox_cart=$ct->get_inbox_cart();
                        if($get_inbox_cart){
                            $i=0;
                            while($result=$get_inbox_cart->fetch_assoc()){
                                $i++;

                    ?>
                    <tr class="odd gradeX">
                        <td style="vertical-align: middle;"><?php echo $i?></td>
                        <td style="vertical-align: middle;"><?php echo $fm->formatDate($result['date_order'])?></td>
                        <td style="vertical-align: middle;"><?php echo $result['id'] ?></td>
                        <td style="vertical-align: middle;"><?php echo $result['productName'] ?></td>
                        <td style="vertical-align: middle;"><?php echo $result['quantity'] ?></td>
                        <td style="vertical-align: middle;"><?php echo $fm->format_currency($result['price']) .' '.'VNĐ'?></td>
                        <td style="vertical-align: middle;"><?php echo $result['customer_id'] ?></td>
                        <td style="vertical-align: middle; padding: 12px 0px"><a style="border: none;color: white; background-color: blueviolet; padding: 5px 10px; border-radius: 5px;" style="font-style:italic ;" href="customer.php?customerid=<?php echo $result['customer_id']?>">Xem thông tin khách</a></td>
                        <td style="vertical-align: middle;">
                            <?php
                            if($result['status']==0){
                            ?>
                            <a style="border: none;color: red;background-color: wheat; padding: 5px 10px; border-radius: 5px;" href="?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?> "> Đang chờ xử lý </a>


                        <?php 
                        }elseif($result['status']==1){
                        ?>
                            <a style="border: none;color: black;background-color: wheat; padding: 5px 10px; border-radius: 5px;" href="?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?> "> Đã xử lý </a>


                        <?php 
                        }elseif($result['status']==2){
                        ?>
                        <a style="border: none;color: green;background-color: wheat; padding: 5px 10px; border-radius: 5px;" onclick="return confirm('Đơn hàng đã được vận chuyển. Nhấn OK để xóa đơn khỏi danh sách.')" href="?delid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Xóa đơn đã giao </a>

                        <?php
                        }
                    
                        ?>


                        </td>
                        <td style="vertical-align: middle; padding: 12px 0px"> <a style="border: none;color: white;background-color: blue; padding: 5px 10px; border-radius: 5px;" href="indonhang.php?customerid=<?php echo $result['customer_id'] ?> "> In đơn </a></td>
                    </tr>

                    <?php 

                        }

                      }  
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    setupLeftMenu();

    $('.datatable').dataTable();
    setSidebarHeight();
});
</script>
<?php include 'inc/footer.php';?>