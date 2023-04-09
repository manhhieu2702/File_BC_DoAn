<?php 

	$filepath=realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/database.php');
	include_once ($filepath.'/../helpers/format.php');
?>
<?php 


/**
 * 
 */
class customer
{
	private $db;
	private $fm;

	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	 public function insert_customer($data){

	 	$name = mysqli_real_escape_string($this->db->link, $data['name']);
	 	$zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']); 
	 	$email = mysqli_real_escape_string($this->db->link, $data['email']); 
	 	$address = mysqli_real_escape_string($this->db->link, $data['address']); 
	 	$phone = mysqli_real_escape_string($this->db->link, $data['phone']); 
	 	$password = mysqli_real_escape_string($this->db->link, $data['password']);  


	 	if($name=="" || $zipcode=="" || $email=="" || $address=="" || $phone=="" || $password==""){
			$alert = "<span class='error' style='color:red'> Các trường dữ liệu không được để trống !!!</span>";
			return $alert;
		}else{

			$check_email="SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
			$result_check=$this->db->select($check_email);	
			if($result_check){
				$alert = "<span class='error' style='color:red'> Email đã tồn tại hãy nhập email khác !!!</span>";
				return $alert;
			}else{

			$query = "INSERT INTO tbl_customer(name,zipcode,email,address,phone,password) VALUES('$name','$zipcode','$email','$address','$phone','$password') ";
			$result = $this->db->insert($query);
			if($result){
				$alert = "<span class='success'style='color:green'> Tạo tài khoản mới thành công !!!</span>";
				return $alert;
			}else{
				$alert = "<span class='error' style='color:red'> Tạo tài khoản mới không thành công !!!</span>";
				return $alert;
			}
			}
		}
	 }



	 public function login_customer($data){

	 	$email = mysqli_real_escape_string($this->db->link, $data['email']); 
	 	$password = mysqli_real_escape_string($this->db->link, $data['password']);

	 	if($email=="" || $password==""){
			$alert = "<span class='error' style='color:red'> Các trường dữ liệu không được để trống !!!</span>";
			return $alert;
		}else{

			$check_email="SELECT * FROM tbl_customer WHERE email='$email' AND password='$password' LIMIT 1";
			$result_check=$this->db->select($check_email);	
			if($result_check != false ){

				$value=$result_check->fetch_assoc();
				Session::set('customer_login',true);
				Session::set('customer_id',$value['id']);
				Session::set('customer_name',$value['name']);
				header('Location:order.php');


			}else{
				$alert = "<span class='error' style='color:red'> Email hoặc mật khẩu không trùng khớp !!!</span>";
				return $alert;
			}
		}	 	

	 }
	 public function show_infor_customer($id){

	 		$query="SELECT * FROM tbl_customer WHERE id='$id' LIMIT 1";
			$result=$this->db->select($query);	
			return $result;
	 }
	 public function update_customer($data,$id){
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
	 	$zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']); 
	 	$email = mysqli_real_escape_string($this->db->link, $data['email']); 
	 	$address = mysqli_real_escape_string($this->db->link, $data['address']); 
	 	$phone = mysqli_real_escape_string($this->db->link, $data['phone']);   


	 	if($name=="" || $zipcode=="" || $email=="" || $address=="" || $phone==""){
			$alert = "<span class='error' style='color:red'> Các trường dữ liệu không được để trống !!!</span>";
			return $alert;
		}else{

			$check_email="SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
			$result_check=$this->db->select($check_email);	
			if($result_check){

			$query = "UPDATE tbl_customer SET name='$name',zipcode='$zipcode',email='$email',address='$address',phone='$phone' WHERE id='$id' ";
			$result = $this->db->insert($query);
			if($result){
				$alert = "<span class='success'style='color:green'> Cập nhật thông tin cá nhân thành công !!!</span>";
				return $alert;
			}else{
				$alert = "<span class='error' style='color:red'> Cập nhật thông tin cá nhân không thành công !!!</span>";
				return $alert;
			
				}
			}}	 	
	 }



}

?>