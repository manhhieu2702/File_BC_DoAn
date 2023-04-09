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
    <div class="box round first grid">
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
            <table class="data display datatable" id="example">
                <thead>
                    <tr>
                        <th width="5%">STT</th>
                        <th width="15%">Ngày-giờ đặt</th>
                        <th width="15%">Sản phẩm</th>
                        <th width="15%">Số lượng</th>
                        <th width="15%">Giá</th>
                        <th width="10">Mã khách hàng</th>
                        <th width="15%">Địa chỉ</th>
                        <th width="10%">Thao tác</th>
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
                        <td><?php echo $i?></td>
                        <td><?php echo $fm->formatDate($result['date_order'])?></td>
                        <td><?php echo $result['productName'] ?></td>
                        <td><?php echo $result['quantity'] ?></td>
                        <td><?php echo $fm->format_currency($result['price']) .' '.'VNĐ'?></td>
                        <td><?php echo $result['customer_id'] ?></td>
                        <td><a style="font-style:italic ;" href="customer.php?customerid=<?php echo $result['customer_id']?>">Xem thông tin</a></td>
                        <td>
                            <?php
                            if($result['status']==0){
                            ?>
                            <a style="color: red;" href="?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?> "> Đang chờ xử lý </a>


                        <?php 
                        }elseif($result['status']==1){
                        ?>
                            <a style="color: yellow;" href="?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?> "> Đã xử lý </a>


                        <?php 
                        }elseif($result['status']==2){
                        ?>
                        <a style="color: green;" onclick="return confirm('Đơn hàng đã được vận chuyển. Nhấn OK để xóa đơn khỏi danh sách.')" href="?delid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Xóa đơn đã giao </a>

                        <?php
                        }
                    
                        ?>


                        </td>
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