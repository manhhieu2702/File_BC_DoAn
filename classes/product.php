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


		if($productName=="" || $category=="" || $brand=="" || $product_desc=="" || $price=="" || $type=="" || $file_name==""){
			$alert = "<span class='error'> Các trường dữ liệu không được để trống !!!</span>";
			return $alert;
		}else{
			move_uploaded_file($file_temp, $uploaded_image);
			$query = "INSERT INTO tbl_product(productName,catId,brandId,product_desc,price,type,image) VALUES('$productName','$category','$brand','$product_desc','$price','$type','$unique_image') ";
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


		if($productName=="" || $category=="" || $brand=="" || $product_desc=="" || $price=="" || $type=="" ){
			$alert = "<span class='error'> Các trường dữ liệu không được để trống !!!</span>";
			return $alert;
		}else{

			if(!empty($file_name)){
			if($file_size > 1048567){

				$alert = "<span class='error'> Ảnh thêm vào cần nhỏ hơn 2MB !</span>";
				return $alert;
			}
			elseif (in_array($file_ext, $permited) === false ) {
				
				$alert = "<span class='error'> Bạn chỉ có thể tải lên :- ".implode(',', $permited)."</span>";
				return $alert;
			}
			$query = "UPDATE tbl_product SET
			 productName='$productName',
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

}

?>