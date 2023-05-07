<?php 

	$filepath=realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php 


/**
 * 
 */
class cart
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	 public function add_to_cart($quantity,$product_stock,$id)
	{
		$quantity = $this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity); 

		$product_stock = $this->fm->validation($product_stock);
		$product_stock = mysqli_real_escape_string($this->db->link, $product_stock); 

		$id = mysqli_real_escape_string($this->db->link, $id);
		$sId= session_id();

		
		
		$query_cart="SELECT * FROM tbl_cart WHERE productId='$id' AND sId='$sId'";
		$check_cart =  $this->db->select($query_cart);

		if($quantity <= $product_stock){
		if($check_cart){

			$msg="Sản phẩm đã có sẵn trong giỏ hàng !";
			return $msg;

			}else{

				$query ="SELECT * FROM tbl_product WHERE productId='$id'";
				$result = $this->db->select($query)->fetch_assoc();

				$image= $result["image"];
				$price= $result["price"];
				$productName= $result["productName"];

			$query_insert = "INSERT INTO tbl_cart(stock,productId,quantity,sId,image,price,productName) VALUES('$product_stock','$id','$quantity','$sId','$image','$price','$productName') ";
			$insert_cart = $this->db->insert($query_insert); 
			if($insert_cart){   /*-------------sửa result thành insert_cart ngày 30-4*/
				header('Location:cart.php');
				}else{
				header('Location:404.php');
					}
				}
		}else{
			$msg="Số lượng đặt vượt quá lượng sản phẩm có trong xưởng !";
			return $msg;
		}

	

	}
	public function get_product_cart(){

		$sId= session_id();
		$query ="SELECT * FROM tbl_cart WHERE sId='$sId'";
		$result=$this->db->select($query);
		return $result;
	}
	public function update_quantity_Cart($stock,$quantity,$cartId){
		$quantity = mysqli_real_escape_string($this->db->link, $quantity); 
		$stock = mysqli_real_escape_string($this->db->link, $stock);
		$cartId = mysqli_real_escape_string($this->db->link, $cartId);
		if($stock >= $quantity){

			$query = "UPDATE tbl_cart SET
			 quantity='$quantity'
			 WHERE cartId='$cartId' ";
	 		$result=$this->db->update($query);
	 		if($result){
			$msg="<span class='success'  style='color:green; font-size:18px;font-weight: bold; margin-left: 400px'>Sản phẩm cập nhật số lượng thành công !!!</span>";
			return $msg;
		}else{
			$msg="<span class='error' style='color:red; font-size:18px;font-weight: bold; margin-left: 400px'>Sản phẩm cập nhật số lượng bị lỗi !!!</span>";
			return $msg;
		}

		}else{
			$msg="<span class='success'  style='color:red; font-size:18px;font-weight: bold; margin-left: 400px'>Số lượng tồn kho không đủ !!!</span>";
			return $msg;
		}
	
		
	}
	public function del_product_cart($cartid){

		$cartid = mysqli_real_escape_string($this->db->link, $cartid);
		$query ="DELETE FROM tbl_cart WHERE cartId='$cartid'";
		$result=$this->db->delete($query);
		if($result){
			header('Location:cart.php');
		}else{
			$msg="<span class='error' style='color:red; font-size:18px'>Xóa sản phẩm trong giỏ bị lỗi !!!</span>";
			return $msg;
		}
	}
	public function del_data_cart(){
		$sId= session_id();
		$query ="DELETE FROM tbl_cart WHERE sId='$sId'";
		$result=$this->db->select($query);
		return $result;
	}
	public function del_data_compare($customer_id){

		$sId= session_id();
		$query ="DELETE FROM tbl_compare WHERE customer_id='$customer_id'";
		$result=$this->db->delete($query);
		return $result;
	}
		public function check_cart(){
		$sId= session_id();
		$query ="SELECT * FROM tbl_cart WHERE sId='$sId'";
		$result=$this->db->select($query);
		return $result;
	}
		public function check_order($customer_id){
		$sId= session_id();
		$query ="SELECT * FROM tbl_order WHERE customer_id='$customer_id'";
		$result=$this->db->select($query);
		return $result;
	}

	public function insertOrder($customer_id){
		$sId=session_id();
		$query ="SELECT * FROM tbl_cart WHERE sId='$sId'";
		$getproduct_order=$this->db->select($query);
		if($getproduct_order){
			while($result= $getproduct_order->fetch_assoc()){
				$productId=$result['productId'];
				$productName=$result['productName'];
				$quantity=$result['quantity'];
				$price=$result['price'] *$quantity;
				$image=$result['image'];
				$customer_id=$customer_id;


			$query_order = "INSERT INTO tbl_order(productId,productName,quantity,price,image,customer_id) VALUES('$productId','$productName','$quantity','$price','$image','$customer_id') ";
			$insert_order = $this->db->insert($query_order);
			}
		}
	}
	public function getAmountPrice($customer_id){

		$query ="SELECT price,quantity FROM tbl_order WHERE customer_id='$customer_id'";
		$get_order_price=$this->db->select($query);
		return $get_order_price;

	}
	public function get_product_ordered($customer_id){
		$query ="SELECT * FROM tbl_order WHERE  customer_id='$customer_id'";
		$get_product_ordered=$this->db->select($query);
		return $get_product_ordered;
	}
	/*----------------------------------*/


	public function get_inbox_cart()
	{
		$query ="SELECT * FROM tbl_order ORDER BY date_order";
		$get_inbox_cart=$this->db->select($query);
		return $get_inbox_cart;
	}


	public function shifted($id,$time,$price){
		$id = mysqli_real_escape_string($this->db->link, $id); 
		$time = mysqli_real_escape_string($this->db->link, $time);
		$price = mysqli_real_escape_string($this->db->link, $price);
		$query = "UPDATE tbl_order SET
			 status='1'
			 WHERE id='$id' AND date_order='$time' AND price='$price' ";
	 	$result=$this->db->update($query);
		if($result){
			$msg="<span class='success'  style='color:green; font-size:18px'>Cập nhật trạng thái đơn hàng thành công !!!</span>";
			return $msg;
		}else{
			$msg="<span class='error' style='color:red; font-size:18px'>Cập nhật trạng thái đơn hàng  không thành công !!!</span>";
			return $msg;
		}
	}
	public function del_shifted($id,$time,$price){

		$id = mysqli_real_escape_string($this->db->link, $id); 
		$time = mysqli_real_escape_string($this->db->link, $time);
		$price = mysqli_real_escape_string($this->db->link, $price);
		$query = "DELETE FROM tbl_order
			 WHERE id='$id' AND date_order='$time' AND price='$price' ";
	 	$result=$this->db->update($query);
		if($result){
			$msg="<span class='success'  style='color:green; font-size:18px'>Xóa đơn hàng thành công !!!</span>";
			return $msg;
		}else{
			$msg="<span class='error' style='color:red; font-size:18px'>Xóa đơn hàng không thành công !!!</span>";
			return $msg;
		}
	}

	public function shifted_confirm($id,$time,$price){
		$id = mysqli_real_escape_string($this->db->link, $id); 
		$time = mysqli_real_escape_string($this->db->link, $time);
		$price = mysqli_real_escape_string($this->db->link, $price);
		$query = "UPDATE tbl_order SET
			 status='2'
		WHERE customer_id='$id' AND date_order='$time' AND price='$price' ";
	 	$result=$this->db->update($query);
	 	return $result;
	}

		public function print_product_ordered($customerid,$madon){
		$query ="SELECT * FROM tbl_order INNER JOIN tbl_customer ON tbl_order.customer_id = tbl_customer.id
		WHERE  tbl_order.customer_id='$customerid' AND tbl_order.id ='$madon'";
		$get_product_ordered=$this->db->select($query);
		return $get_product_ordered;
	}
	
	

}

?>