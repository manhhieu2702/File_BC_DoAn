
<?php 

  $filepath=realpath(dirname(__FILE__));
  include_once ($filepath.'/../classes/cart.php');
  include_once ($filepath.'/../helpers/format.php');
  $fm=new Format();
?>
<?php 
    
    if(!isset($_GET['customerid']) || $_GET['customerid'] == NULL){
        echo "<script> Window.Location = 'inbox.php'; </script>";
    }else{
        $customerid = $_GET['customerid'];
       	$madon=$_GET['madon'];
    }
    
/*    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $catName = $_POST['catName'];

     $updateCat = $cat->update_category($catName,$id);
    }*/
?>
<?php
require('../tfpdf/tfpdf.php');
require_once('../config/config.php');
$pdf = new tFPDF();
$pdf->AddPage("0");
// $pdf->SetFont('Arial','B',14);
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->SetFont('DejaVu','',14);

$pdf->Write(10,'Đơn hàng được giao từ Cửa hàng đồ Gỗ Điệp Hoa ');
$pdf->Ln(7);
$pdf->Write(10,'Địa chỉ : Bắc Sơn- Sóc Sơn- Hà Nội ');
	$pdf->Ln(10);
	$pdf->Ln(5);
	$width_cell=array(5,50,20,120,20,30,40);

	$pdf->Cell($width_cell[0],10,'  ',1,0,'C',false);
	$pdf->Cell($width_cell[1],10,'Ngày đặt',1,0,'C',false);
	$pdf->Cell($width_cell[2],10,'Mã đơn',1,0,'C',false);
	$pdf->Cell($width_cell[3],10,'Tên sản phẩm',1,0,'C',false);
	$pdf->Cell($width_cell[4],10,'Số lượng',1,0,'C',false); 
	$pdf->Cell($width_cell[5],10,'Giá',1,0,'C',false);
	$pdf->Cell($width_cell[6],10,'Tổng tiền',1,1,'C',false); 
	$pdf->SetFillColor(235,236,236); 
	$fill=false;
	
    $ct= new cart();
    $fm= new Format();
    $print_inbox_cart=$ct->print_product_ordered($customerid,$madon);

    if($print_inbox_cart){
        $i=0;
        $totalprice=0;
        $subtotal=0;
        while($result=$print_inbox_cart->fetch_assoc()){
            $i++;
      $subtotal=$result['quantity']*$result['price'];

	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$result['date_order'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$madon,1,0,'C',$fill);
	$pdf->Cell($width_cell[3],10,$result['productName'],1,0,'C',$fill);
	$pdf->Cell($width_cell[4],10,$result['quantity'],1,0,'C',$fill);
	$pdf->Cell($width_cell[5],10,number_format($result['price'] ),1,0,'C',$fill);
	$pdf->Cell($width_cell[6],10,number_format($subtotal=$result['quantity']*$result['price'] ),1,1,'C',$fill);
	$fill = !$fill;
	
	$namecus=$result['name'];
	$phonecus=$result['phone'];
	$addresscus=$result['address'];
	$totalprice+=$subtotal;
	}}
	$pdf->Ln(7);
	$pdf->Write(10,'Tổng hóa đơn :  ');$pdf->Write(10,$fm->format_currency($totalprice)); $pdf->Write(10,' VNĐ');
	$pdf->Ln(7);
	$pdf->Write(10,'Tên khách hàng đặt mua :  ');$pdf->Write(10,$namecus);
	$pdf->Ln(7);
	$pdf->Write(10,'Số điện thoại khách hàng :  ');$pdf->Write(10,$phonecus);
	$pdf->Ln(7);
	$pdf->Write(10,'Địa chỉ nhận hàng :  ');$pdf->Write(10,$addresscus);
	$pdf->Ln(5);
	$pdf->Ln(10);
	$pdf->Write(10,'                                            Cảm ơn bạn đã đặt hàng tại website Cửa hàng đồ gỗ Điêp Hoa.');
	$pdf->Ln(10);
	$pdf->Write(10,'                                Nếu có bất kì sự cố nào khi nhận hàng hãy gọi hotline 0976097342 để được tư vấn !');
	$pdf->Ln(10);
	$pdf->Write(10,'                                      Rất mong bạn sẽ lại ghé thăm cửa hàng lần tiếp theo. Chân thành cảm ơn !');
	$pdf->Ln(10);
$pdf->Output();
?>