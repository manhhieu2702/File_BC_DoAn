<?php 
	$filepath=realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php 


/**
 * 
 */
class product
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function insert_product($data,$files){

		

		$productName = mysqli_real_escape_string($this->db->link, $data['productName']); 
		$product_quantity = mysqli_real_escape_string($this->db->link, $data['product_quantity']);
		$category = mysqli_real_escape_string($this->db->link, $data['category']);
		$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
		$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);


		$permited = array('jpg','jpeg','png','gif' );
		$file_name =$_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_temp =$_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext =strtolower(end($div));
		$unique_image =substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;


		if($productName=="" || $category=="" || $brand=="" || $product_desc=="" || $price=="" || $type=="" || $file_name=="" || $product_quantity=="" ){
			$alert = "<span class='error'> Các trường dữ liệu không được để trống !!!</span>";
			return $alert;
		}else{
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO tbl_product(productName,product_quantity,catId,brandId,product_desc,price,type,image) VALUES('$productName','$product_quantity','$category','$brand','$product_desc','$price','$type','$unique_image') ";
			$result = $this->db->insert($query);
			if($result){
				$alert = "<span class='success'> Thêm sản phẩm thành công !!!</span>";
				return $alert;
			}else{
				$alert = "<span class='error'> Thêm sản phẩm không thành công !!!</span>";
				return $alert;
			}
		}
	}
	public function show_product(){
		$query = "

		SELECT tbl_product.*, tbl_brand.brandName 

		FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId

		ORDER BY tbl_product.productId desc ";
			$result = $this->db->select($query);
			return $result;
	}
	public function getproductbyId($id){
		$query = "SELECT * FROM tbl_product WHERE productId =' $id ' ";
			$result = $this->db->select($query);
			return $result;
	}
	public function update_product($data,$files,$id){
		

		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$product_quantity = mysqli_real_escape_string($this->db->link, $data['product_quantity']); 
		$category = mysqli_real_escape_string($this->db->link, $data['category']);
		$brand = mysqli_real_escape_string($this->db->link, $data['brand']);
		$product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);


		$permited = array('jpg','jpeg','png','gif' );
		$file_name =$_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_temp =$_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext =strtolower(end($div));
		$unique_image =substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;


		if($productName=="" || $category=="" || $brand=="" || $product_desc=="" || $price=="" || $type=="" ||$product_quantity=="" ){
			$alert = "<span class='error'> Các trường dữ liệu không được để trống !!!</span>";
			return $alert;
		}else{

			if(!empty($file_name)){
			if($file_size > 10485670){

				$alert = "<span class='error'> Ảnh thêm vào cần nhỏ hơn 2MB !</span>";
				return $alert;
			}
			elseif (in_array($file_ext, $permited) === false ) {
				
				$alert = "<span class='error'> Bạn chỉ có thể tải lên :- ".implode(',', $permited)."</span>";
				return $alert;
			}
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "UPDATE tbl_product SET
			 productName='$productName',
			 product_quantity='$product_quantity',
			 catId='$category', 
			 brandId='$brand', 
			 product_desc='$product_desc', 
			 price='$price', 
			 type='$type', 
			 image='$unique_image'
			 WHERE productId='$id' ";
			}else{
			$query = "UPDATE tbl_product SET
			 productName='$productName',
			 product_quantity='$product_quantity',
			 catId='$category', 
			 brandId='$brand', 
			 product_desc='$product_desc', 
			 price='$price', 
			 type='$type'
			 WHERE productId='$id' ";

			}	
			
			
			$result = $this->db->update($query);
			if($result){
				$alert = "<span class='success'> Cập nhật sản phẩm thành công !!!</span>";
				return $alert;
			}else{
				$alert = "<span class='error'> Cập nhật sản phẩm không thành công !!!</span>";
				return $alert;
			}
		
		}
	}
	public function del_product($id){
		$query = "DELETE FROM tbl_product WHERE productId =' $id ' ";
			$result = $this->db->delete($query);
		if($result){
				$alert = "<span class='success'> Xóa sản phẩm thành công !!!</span>";
				return $alert;
			}else{
				$alert = "<span class='error'> Xóa sản phẩm không thành công !!!</span>";
				return $alert;
			}
	}
   //Hết phần backend
   //Hàm bên dưới dung cho fontend
   
   public function getproduct_feathered(){

   		$query = "SELECT * FROM tbl_product WHERE type =' 1 ' ORDER BY productId desc LIMIT 4 ";
			$result = $this->db->select($query);
			return $result;

   }
      public function getproduct_hot_tuong(){

   		$query = "SELECT * FROM tbl_product WHERE catId =' 1 ' ORDER BY productId desc LIMIT 4 ";
			$result = $this->db->select($query);
			return $result;

   }
         public function getproduct_hot_tranh(){

   		$query = "SELECT * FROM tbl_product WHERE catId =' 14 ' ORDER BY productId desc LIMIT 4 ";
			$result = $this->db->select($query);
			return $result;

   }
         public function getproduct_hot_banghe(){

   		$query = "SELECT * FROM tbl_product WHERE catId =' 11 ' ORDER BY productId desc LIMIT 4 ";
			$result = $this->db->select($query);
			return $result;

   }

 	public function getproduct_new(){

   		$query = "SELECT * FROM tbl_product ORDER BY productId desc LIMIT 4";
			$result = $this->db->select($query);
			return $result;

   }
    	public function get_all_product_page(){

    		$product_tungtrang=8;
    		if(!isset($_GET['trang'])){
    			$trang = 1;
    		}else{
    			$trang = $_GET['trang'];
    		}
    		$tung_trang= ($trang-1)*$product_tungtrang;
   		$query = "SELECT * FROM tbl_product ORDER BY productId desc LIMIT $tung_trang,$product_tungtrang ";
			$result = $this->db->select($query);
			return $result;

   }
       	public function get_all_product(){

   		$query = "SELECT * FROM tbl_product  ";
			$result = $this->db->select($query);
			return $result;

   }
   public function get_details($id){

		$query = "

		SELECT tbl_product.*, tbl_brand.brandName ,tbl_category.catName

		FROM tbl_product INNER JOIN tbl_brand ON tbl_product.brandId = tbl_brand.brandId
		INNER JOIN tbl_category ON tbl_product.catId = tbl_category.catId

		WHERE tbl_product.productId='$id'";


			$result = $this->db->select($query);
			return $result;

   }
   public function getLastestTuong(){
   		   	$query = "SELECT * FROM tbl_product WHERE catId='1' ORDER BY productId desc LIMIT 1 ";
			$result = $this->db->select($query);
			return $result;
   }
      public function getLastestTranh(){
   		   	$query = "SELECT * FROM tbl_product WHERE catId='14' ORDER BY productId desc LIMIT 1 ";
			$result = $this->db->select($query);
			return $result;
   }
      public function getLastestCauDoi(){
   		   	$query = "SELECT * FROM tbl_product WHERE catId='9' ORDER BY productId desc LIMIT 1 ";
			$result = $this->db->select($query);
			return $result;
   }
      public function getLastestBanGhe(){
   		   	$query = "SELECT * FROM tbl_product WHERE catId='11' ORDER BY productId desc LIMIT 1 ";
			$result = $this->db->select($query);
			return $result;
   }
   public function insert_slider($data,$files){



		$sliderName = mysqli_real_escape_string($this->db->link, $data['sliderName']); 
		
		$type = mysqli_real_escape_string($this->db->link, $data['type']);


		$permited = array('jpg','jpeg','png','gif' );
		$file_name =$_FILES['image']['name'];
		$file_size =$_FILES['image']['size'];
		$file_temp =$_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext =strtolower(end($div));
		$unique_image =substr(md5(time()), 0, 10).'.'.$file_ext;
		$uploaded_image = "uploads/".$unique_image;


		if($sliderName=="" || $type==""){
			$alert = "<span class='error'> Các trường dữ liệu không được để trống !!!</span>";
			return $alert;
		}else{

			if(!empty($file_name)){
			if($file_size > 104856700){

				$alert = "<span class='error'> Ảnh thêm vào cần nhỏ hơn 2MB !</span>";
				return $alert;
			}
			elseif (in_array($file_ext, $permited) === false ) {
				
				$alert = "<span class='error'> Bạn chỉ có thể tải lên :- ".implode(',', $permited)."</span>";
				return $alert;
			}
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO tbl_slider(sliderName,type,slider_image) VALUES('$sliderName','$type','$unique_image') ";
			$result = $this->db->update($query);
			if($result){
				$alert = "<span class='success'> Thêm slider thành công !!!</span>";
				return $alert;
			}else{
				$alert = "<span class='error'> Thêm slider không thành công !!!</span>";
				return $alert;
			}

			}	
		
		}
   }
   public function show_slider(){
   	$query="SELECT * FROM tbl_slider WHERE type='1' Order by sliderId desc";
   	$result=$this->db->select($query);
   	return $result;
   }
      public function show_slider_list(){
   	$query="SELECT * FROM tbl_slider Order by sliderId desc";
   	$result=$this->db->select($query);
   	return $result;
   }
   public function update_type_slider($id,$type){
   	$type = mysqli_real_escape_string($this->db->link,$type);

   	$query="UPDATE tbl_slider SET type='$type' WHERE sliderId='$id' ";
   	
   	$result=$this->db->update($query);
   	return $result;
   }
   public function del_slider_onlist($id){
   	$query = "DELETE FROM tbl_slider WHERE sliderId =' $id ' ";
			$result = $this->db->delete($query);
		if($result){
				$alert = "<span class='success'> Xóa slider thành công !!!</span>";
				return $alert;
			}else{
				$alert = "<span class='error'> Xóa slider không thành công !!!</span>";
				return $alert;
			}
   }
   public function search_product($tukhoa){
   	$tukhoa = $this->fm->validation($tukhoa);
   		$query = "SELECT * FROM tbl_product WHERE productName LIKE '%$tukhoa%' ";
			$result = $this->db->select($query);
			return $result;
   }

   public function insertCompare($productid,$customer_id){

   	
		$productid = mysqli_real_escape_string($this->db->link, $productid); 
		$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
		
	
		$check_compare="SELECT * FROM tbl_compare WHERE productId='$productid' AND customer_id='$customer_id'";
		$result_check_compare = $this->db->select($check_compare);
		if($result_check_compare){
			$msg="<span class='error' style='color:red; font-weight: bold;'>Sản phẩm đã có sẵn trong danh sách so sánh !</span>";
			return $msg;
		}else{
		$query ="SELECT * FROM tbl_product WHERE productId='$productid' "; 
		$result = $this->db->select($query)->fetch_assoc();


		$productName= $result["productName"];
		$price= $result["price"];
		$image= $result["image"];
		
	

		$query_insert = "INSERT INTO tbl_compare(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName') ";
			$insert_compare = $this->db->insert($query_insert);
			if($insert_compare){

				$alert = "<span class='success' style='color:green; font-weight: bold;'> Thêm thành công vào danh sách so sánh !!!</span>";
					return $alert;
				}else{
					$alert = "<span class='error' style='color:red; font-weight: bold;'> Thêm không thành công !!!</span>";
					return $alert;
				}
			}	
			
   }
   public function get_compare($customer_id){

   	$query="SELECT * FROM tbl_compare WHERE customer_id='$customer_id' Order by id desc";
   	$result=$this->db->select($query);
   	return $result;
   }
   public function get_wishlist($customer_id){

   	$query="SELECT * FROM tbl_wishlist WHERE customer_id='$customer_id' Order by id desc";
   	$result=$this->db->select($query);
   	return $result;

   }
   	public function del_product_compare($product_id){

		$product_id = mysqli_real_escape_string($this->db->link, $product_id);
		$query ="DELETE FROM tbl_compare WHERE productId='$product_id'";
		$result=$this->db->delete($query);
		if($result){
			header('Location:compare.php');
		}else{
			$msg="<span class='error' style='color:red; font-size:18px'>Xóa sản phẩm trong danh sách bị lỗi !!!</span>";
			return $msg;
		}
	}

	   	public function del_product_wishlist($product_id,$customer_id){

		$product_id = mysqli_real_escape_string($this->db->link, $product_id);
		$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
		$query ="DELETE FROM tbl_wishlist WHERE productId='$product_id' AND customer_id='$customer_id'";
		$result=$this->db->delete($query);
		if($result){
			header('Location:wishlist.php');
		}else{
			$msg="<span class='error' style='color:red; font-size:18px'>Xóa sản phẩm trong danh sách bị lỗi !!!</span>";
			return $msg;
		}
	}
	public function insertWishlist($productid,$customer_id){


		$productid = mysqli_real_escape_string($this->db->link, $productid); 
		$customer_id = mysqli_real_escape_string($this->db->link, $customer_id);
		
	
		$check_wlist="SELECT * FROM tbl_wishlist WHERE productId='$productid' AND customer_id='$customer_id'";
		$result_check_wlist = $this->db->select($check_wlist);
		if($result_check_wlist){
			$msg="<span class='error' style='color:red; font-weight: bold;'>Sản phẩm đã có trong danh sách yêu thích  !</span>";
			return $msg;
		}else{
		$query ="SELECT * FROM tbl_product WHERE productId='$productid' "; 
		$result = $this->db->select($query)->fetch_assoc();


		$productName= $result["productName"];
		$price= $result["price"];
		$image= $result["image"];
		
	

		$query_insert = "INSERT INTO tbl_wishlist(productId,price,image,customer_id,productName) VALUES('$productid','$price','$image','$customer_id','$productName') ";
			$insert_wlist = $this->db->insert($query_insert);
			if($insert_wlist){

				$alert = "<span class='success' style='color:green; font-weight: bold;'> Thêm thành công vào danh sách yêu thích !!!</span>";
					return $alert;
				}else{
					$alert = "<span class='error' style='color:red; font-weight: bold;'> Thêm không thành công !!!</span>";
					return $alert;
				}
			}
	}
}

?>