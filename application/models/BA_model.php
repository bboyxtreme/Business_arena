<?php
class BA_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}	
	public function authenticate($email,$password){
		$this->db->select('user_ID,first_name,last_name,user_type');
		$this->db->where("email = '" . $email . "' and password = md5('" . $password . "')");
		$query = $this->db->get('users');
		return $query;
	}
	public function add_client($client_details){
		$this->insert_BA_data("users",$client_details);
	}
	public function add_business($biz_details,$user_ID){
		$user_owns_biz= array(
			"user_ID" => $user_ID,
			"biz_ID" => $biz_details["biz_ID"]
		);
		$this->insert_BA_data("businesses",$biz_details);
		$this->insert_BA_data("users_own_business",$user_owns_biz);
	}
	public function load_business_info($user_ID, $biz_ID = "all"){
		if ($biz_ID == "all"){
			$this->db->select("businesses.biz_ID,biz_name,biz_slogan,biz_main_field,biz_picture_name");
			$this->db->from("businesses");
			$this->db->join("users_own_business","users_own_business.biz_ID = businesses.biz_ID");
			$this->db->where("users_own_business.user_ID",$user_ID);
			$result = $this->db->get();
			return $result;
		}
		else{
			$this->db->select("biz_ID,biz_name,biz_slogan,biz_main_field,biz_main_email,biz_main_mobile,biz_picture_name");
			$this->db->from("businesses");
			$this->db->where("biz_ID",$biz_ID);
			$result = $this->db->get();
			return $result;
		}		
	}
	public function load_business_views($biz_ID){
		$this->db->select('count(*) as num_views_total')->from('users_view_business')->where("biz_ID",$biz_ID);
		$total_views = $this->db->get()->row()->num_views_total;
		$this->db->select('count(*) as num_views_today')->from('users_view_business')->where("biz_ID",$biz_ID)->where("view_date", date("Y-m-d"));
		$today_views = $this->db->get()->row()->num_views_today;
		$result= array(
			"total_views" => $total_views,
			"today_views" => $today_views
		);
		return $result;
	}
	public function update_biz_info($biz_ID,$biz_update_details){
		$where = array(
			"biz_ID" => $biz_ID
		);
		$this->update_BA_data("businesses",$biz_update_details,$where);
	}
	public function load_products($biz_ID, $mod = "all"){
		$this->db->select("business_products.prd_ID,prd_name,prd_price,prd_quantity,cat_name,prd_description")->from("business_products")->join("product_product_category","business_products.prd_ID = product_product_category.prd_ID")->join("product_categories","product_product_category.cat_ID = product_categories.cat_ID")->where("biz_ID", $biz_ID)->where("cat_usage","main");
		$result = $this->db->get();
		return $result;
	}
	public function load_prd_categories(){
		$this->db->select("*")->from("product_categories");	
		$result = $this->db->get();
		return $result;
	}
	public function add_products($prd_details,$prd_category,$prd_pic){
		$this->insert_BA_data("business_products",$prd_details);
		$category = array(
			"prd_ID" => $prd_details["prd_ID"],
			"cat_ID" => $prd_category,
			"cat_usage" => "main"
		);
		$this->insert_BA_data("product_product_category",$category);	
		$pic_details = array(
			"prd_ID" => $prd_details["prd_ID"],
			"pic_name" => $prd_pic,
			"usage" => "thumbnail"
		);
		$this->insert_BA_data("prd_pictures",$pic_details);
	}
	public function insert_BA_data($table,$data){
		$this->db->insert($table,$data);
	}
	public function update_BA_data($table,$data,$where){
		$this->db->where($where);
		$this->db->update($table,$data);
	}
/*	public function retrieve($tableName,$columns,$where){
		$this->db->select($columns);
		$query = $this->db->get_where($tableName,$where);
		return $query;
	}
	public function insertTable($table,$data){
		$this->db->insert($table,$data);
	}
	public function generateCatalogue($userType){
		if ($userType == "client"){
			$query1 = $this->db->query('SELECT distinct locDistrict 
								FROM users, users_have_biz_description,biz_description, biz_description_biz_location, biz_location
								where users.userID = users_have_biz_description.userID and 
									  users_have_biz_description.bizID=biz_description.bizID and 
									  biz_description.bizID = biz_description_biz_location.bizID and 
			                          biz_description_biz_location.locID = biz_location.locID and users.userID = "' . $this->session->userdata('userID') . '";');
			$query2 = $this->db->query('SELECT distinct locArea, locDistrict 
								FROM users, users_have_biz_description,biz_description, biz_description_biz_location, biz_location
								where users.userID = users_have_biz_description.userID and 
									  users_have_biz_description.bizID=biz_description.bizID and 
									  biz_description.bizID = biz_description_biz_location.bizID and 
			                          biz_description_biz_location.locID = biz_location.locID and users.userID = "' . $this->session->userdata('userID') . '";');
			$query3 = $this->db->query('SELECT biz_description.bizID,bizName,locArea,biz_location.locID
								FROM users, users_have_biz_description,biz_description, biz_description_biz_location, biz_location
								where users.userID = users_have_biz_description.userID and 
									  users_have_biz_description.bizID=biz_description.bizID and 
									  biz_description.bizID = biz_description_biz_location.bizID and 
			                          biz_description_biz_location.locID = biz_location.locID and users.userID = "' . $this->session->userdata('userID') . '";');
		}
		else{		
			$query1 = $this->db->query('SELECT distinct locDistrict 
								FROM biz_description, biz_description_biz_location, biz_location
								where biz_description.bizID = biz_description_biz_location.bizID and biz_description_biz_location.locID = biz_location.locID;');
			$query2 = $this->db->query('SELECT distinct locArea, locDistrict 
								FROM biz_description, biz_description_biz_location, biz_location
								where biz_description.bizID = biz_description_biz_location.bizID and biz_description_biz_location.locID = biz_location.locID;');
			$query3 = $this->db->query('SELECT biz_description.bizID,bizName,locArea, biz_location.locID
								FROM biz_description, biz_description_biz_location, biz_location
								where biz_description.bizID = biz_description_biz_location.bizID and biz_description_biz_location.locID = biz_location.locID;');
		}
			
		
		foreach ($query1->result() as $row)
		{
			echo $row->locDistrict . "<br>";
		}
		echo "<br>";
		foreach ($query2->result() as $row)
		{
			echo $row->LocArea . "<br>";
		}
		echo "<br>";
		foreach ($query3->result() as $row)
		{
			echo $row->bizName . "<br>";
		}
		
		$query[0] = $query1;
		$query[1] = $query2;
		$query[2] = $query3;
		return $query;
	}
	public function customQuery($query){		
		$output = $this->db->query($query);
		return $output;		
	}
	public function update($tableName,$updateData,$where){		
		$this->db->where($where);
		$this->db->update($tableName,$updateData);		
	}
	public function del($tableName,$where){
		$this->db->delete($tableName,$where);
	}*/
}
?>