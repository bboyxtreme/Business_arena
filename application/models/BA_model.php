<?php
class BA_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}	
	public function authenticate($email,$password){
		$this->db->select('email,password');
		$query = $this->db->get_where('users',array('email'=>$email,'password'=>$password));
		return $query;
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