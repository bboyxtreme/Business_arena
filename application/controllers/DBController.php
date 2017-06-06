<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DBController extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct(){
		parent::__construct();
		$this->load->model('BA_model');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index()//$log_status = "logged_out"
	{
		/*$user_type = $this->session->userdata("user_type");
		if($user_type == "Business Owner" || $user_type == "Admin"){
			$data["log_status"] = "logged in";
		}else{
			$data["log_status"] = $log_status;
		}
		if($user_type == "Business Owner"){
			$this->load->view('header',$data);		
			$this->load->view('home_page_bo');
			$this->load->view('footer');
		}
		else{
			$this->load->view('header',$data);		
			$this->load->view('home_page_user');
			$this->load->view('footer');	
		}*/
		//$data["log_status"] = $log_status;	
		$this->load->view('header');		
		$this->load->view('home_page_user');
		$this->load->view('footer');	
	}
	public function about_page(){
		$this->load->view('header');
		$this->load("about_us");
		$this->load->view('footer');
	}
	public function contacts_page(){
		$this->load->view('header');
		$this->load("contact_us");
		$this->load->view('footer');
	}
	public function show_business($business_name){		
			$this->load->view('header');
			$this->load->view('user_business_page');
			$this->load->view('footer');
	}
	public function show_business_ctrl_panel($biz_ID){
		$user_ID = $this->session->userdata("user_ID");
		$this->session->set_userdata("biz_ID",$biz_ID);
		$data['views'] = $this->BA_model->load_business_views($biz_ID);
		$data['biz_info'] = $this->BA_model->load_business_info($user_ID,$biz_ID)->row();
		$this->session->set_userdata("biz_name",$data['biz_info']->biz_name);	
		$this->load->view('header_logged_in');
		$this->load->view('business_control_panel',$data);
		$this->load->view('footer');		
	}
	public function show_product($business_name,$product_name){
		//cho $business_name . "<br>" . $product_name;
		$this->load->view('header');
		$this->load("product");
		$this->load->view('footer');
	}
	public function proms_page($prom_type){
		//echo $prom_type;
		$this->load->view('header');
		$this->load("promotions");
		$this->load->view('footer');
	}	
	public function show_search_results($search_phrase){
		echo "search results: " . $search_phrase;
		/*$this->load->view('header');
		$this->load("searchresults");
		$this->load->view('footer');*/
	}
	public function load($page)
	{
		if ($page == "about-us"){
			echo "Home >> About us inde";
		}
		else if ($page == "about_us"){
			$this->load->view('about_us');
		}		
		else if ($page == "index"){
			$this->load->view('home_page_user');
		}
		else if ($page == "contact-us"){
			echo "Home >> Contact us";
		}
		else if ($page == "contact_us"){
			$this->load->view('contact_us');
		}
		else if ($page == "business"){
			$this->load->view('user_business_page');
		}
		else if ($page == "searchresults"){
			$data['search_phrase'] = $this->input->post("search_input");
			$this->load->view('search_results',$data);
		}
		else if ($page == "promotions"){
			$this->load->view('promotions');
		}
		else if ($page == "product"){
			$this->load->view('user_product_info');
		}
		else if ($page == "biz_ctrl_panel"){
			$this->load->view('business_control_panel');
		}
		else if ($page == "prd-ctrl-panel"){
			$this->load->view('client_prds_page');
		}
		else if ($page == "loc-ctrl-panel"){
			$this->load->view('client_locs_page');
		}
		else if ($page == "uq-ctrl-panel"){
			$this->load->view('client_uq_page');
		}
		else if ($page == "views-ctrl-panel"){
			$this->load->view('client_views_page');
		}
		else if ($page == "msgs-ctrl-panel"){
			$this->load->view('client_msgs_page');
		}
		else if ($page == "admin-client-numbers"){
			$this->load->view('admin_client_numbers_page');
		}
		else if ($page == "admin-client-requests"){
			$this->load->view('admin_client_requests_page');
		}
		else if ($page == "admin-client-messages"){
			$this->load->view('admin_client_msgs_page');
		}
		else if ($page == "admin-client-bizs"){
			$this->load->view('admin_client_bizs_page');
		}
		else if ($page == "admin-user-numbers"){
			$this->load->view('admin_user_numbers_page');
		}
		else if ($page == "admin-user-comments"){
			$this->load->view('admin_user_comments_page');
		}
		else if ($page == "admin-quota-overdue"){
			$this->load->view('admin_quota_overdue_page');
		}
		else if ($page == "admin-quota-subscr"){
			$this->load->view('admin_quota_subscr_page');
		}
		else if ($page == "admin-quota-requests"){
			$this->load->view('admin_quota_requests_page');
		}
		else if ($page == "admin-quota-comments"){
			$this->load->view('admin_quota_comments_page');
		}
		else if ($page == "admin-loc-numbers"){
			$this->load->view('admin_loc_numbers_page');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		$this->index();
	}
	public function login(){
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		$result = $this->BA_model->authenticate($email, $password);	
		echo $result->num_rows();	
		if ($result->num_rows() == 1){
			$user_ID = $result->row()->user_ID;
			$user_type = $result->row()->user_type;
			$first_name = $result->row()->first_name;;
			$last_name = $result->row()->last_name;
			$data["log_status"] = "logged_in";
			if ($user_type == "Admin"){		
				$this->initiate_sesstion($user_ID, $user_type, $first_name, $last_name);		
				$this->load->view('header_logged_in', $data);
				$this->load->view('home_page_admin');
				$this->load->view('footer');				
			}
			else if ($user_type == "Buisness Owner"){
				$this->initiate_sesstion($user_ID, $user_type, $first_name, $last_name);
				$businesses = $this->BA_model->load_business_info($user_ID);
				if ($businesses->num_rows() == 0){
					$data['no_businesses'] = "You do not have any businesses at the moment. Start by creating one now!";					
				}
				else{
					$data['businesses'] = $businesses;
				}
				$this->load->view('header_logged_in', $data);
				$this->load->view('home_page_bo', $data);
				$this->load->view('footer');				
			}
		}
		/*if ($email == "BO"){
			$this->load->view('header');
			$this->load->view('home_page_bo');
			$this->load->view('footer');
		}
		else if ($email == "Admin"){
			$this->load->view('header');
			$this->load->view('home_page_admin');
			$this->load->view('footer');
		}
		else{
			$this->load->view('header');
			$this->load->view('home_page_user');
			$this->load->view('footer');
		}*/
	}
	public function initiate_sesstion($user_ID, $user_type, $first_name, $last_name){
		$new_data = array(
			"user_ID" => $user_ID,
			"user_type" => $user_type,
			"first_name" => $first_name,
			"last_name" => $last_name
		);
		$this->session->set_userdata($new_data);
	}
	public function add_client($added_by="client"){
		$user_ID = "C00002";
		$first_name = $this->input->post("first-name");
		$sur_name = $this->input->post("sur-name");
		$dob = $this->input->post("dob");
		$phone_number = $this->input->post("phone-number");
		$email = $this->input->post("email");
		$password = md5($this->input->post("password"));
		$confirm_password = md5($this->input->post("confirm-password"));
		$user_type = $this->input->post("user-type");
		$client_details= array(
			"user_ID" => $user_ID,
			"first_name" => $first_name,
			"last_name" => $sur_name,
			"dob" => $dob,
			"phone_number" => $phone_number,
			"user_type" => $user_type,
			"email" => $email,
			"password" => $password,
			"added_by" => $added_by
		);
		/*foreach ($client_details as $key => $value){
			echo $key . " -> " . $value . "<br>"; 	
		}*/
		$this->BA_model->add_client($client_details);
		$data["success_heading"] = "Client addition successful";	
		$data["success_msg"] = "You have successfully added " . $first_name . " as a " . $user_type;	
		$this->load->view('header');
		$this->load->view('success_page',$data);
		$this->load->view('footer');
	}
	public function add_business(){
		$user_ID = $this->session->userdata("user_ID");
		$biz_ID = $this->generate_ID("business");
		$biz_name = $this->input->post("biz-name");
		$biz_slogan = $this->input->post("biz-slogan");
		$biz_field = $this->input->post("biz-field");
		$biz_email = $this->input->post("biz-main-email");
		$biz_mobile = $this->input->post("biz-main-mobile");
		$reg_date = date("Y-m-d");
		$biz_details= array(
			"biz_ID" => $biz_ID,
			"biz_name" => $biz_name,
			"biz_slogan" => $biz_slogan,
			"biz_main_field" => $biz_field,
			"biz_main_mobile" => $biz_mobile,
			"biz_main_email" => $biz_email,
			"biz_reg_date" => $reg_date,
		);
		/*foreach ($biz_details as $key => $value){
			echo $key . " -> " . $value . "<br>"; 	
		}*/
		$this->BA_model->add_business($biz_details,$user_ID);
		$data["success_heading"] = "Business addition successful";	
		$data["success_msg"] = "You have successfully added " . $biz_name . " as your buisness";	
		$this->load->view('header');
		$this->load->view('success_page',$data);
		$this->load->view('footer');
	}
	public function edit_business_info(){
		$biz_ID = $this->session->userdata("biz_ID");
		$biz_name = $this->input->post("biz-name");
		$biz_slogan = $this->input->post("biz-slogan");
		$biz_field = $this->input->post("biz-field");
		$biz_email = $this->input->post("biz-email");
		$biz_mobile = $this->input->post("biz-mobile");	
		$biz_update = array(
			"biz_name" => $biz_name,
			"biz_slogan" => $biz_slogan,
			"biz_main_field" => $biz_field,
			"biz_main_mobile" => $biz_mobile,
			"biz_main_email" => $biz_email
		);
		$this->BA_model->update_biz_info($biz_ID,$biz_update);
		$this->show_business_ctrl_panel($biz_ID);
	}
	public function show_prd_panel($biz_ID){
		$products = $this->BA_model->load_products($biz_ID);
		if($products->num_rows() == 0){
			$data["no_products"] = "This business doesn't have any products at the moment. Add some by clicking on the add products button now!!";
		}
		else{
			$data["products"] = $products;
		}		
		$data["prd_categories"] = $this->BA_model->load_prd_categories();		
		$data["biz_name"] = $this->session->userdata("biz_name");		
		$this->load->view('header_logged_in');
		$this->load->view('client_prds_page',$data);
		$this->load->view('footer');
	}
	public function generate_ID($mod){
		switch ($mod){
			case "product" :
				$lastID = (int)(substr($this->BA_model->get_last_ID("business_products","prd_ID"),2));
				$prd_ID = "PR" . sprintf("%05d",++$lastID);
				return $prd_ID;
				break;
			case "business" :
				$lastID = (int)(substr($this->BA_model->get_last_ID("businesses","biz_ID"),2));
				$biz_ID = "BD" . sprintf("%05d",++$lastID);
				return $biz_ID;
				break;
			case "category" :
				
				break;
			case "location" :
				
				break;				
		}
	}
	public function add_products($mod = "1"){
		$biz_ID = $this->session->userdata("biz_ID");
		$prd_ID = $this->generate_ID("product");
		if($mod == "1"){
			$config['upload_path'] = './images/uploads/';
			$config['allowed_types'] = 'jpg|gif|png';
			$config['max_size']	= '1000';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$error = $this->upload->display_errors();
				//echo "You have successfully added a record but " . $error;
				$prd_pic = "no_image_thumb.gif";
			}
			else
			{
				$upload_data = $this->upload->data();
				$prd_pic = $upload_data['file_name'];				
			}
			$prd_type = $this->input->post("prd-type");
			$prd_name = $this->input->post("prd-name");
			$prd_price = $this->input->post("prd-price");
			$prd_quantity = $this->input->post("prd-quantity");
			$prd_condition = $this->input->post("prd-condition");					
			$prd_category = $this->input->post("prd-category");
			$prd_description = $this->input->post("prd-description");
			$prd_details = array(
				"biz_ID" => $biz_ID,
				"prd_ID" => $prd_ID,
				"prd_name" => $prd_name,
				"prd_price" => $prd_price,
				"prd_quantity" => $prd_quantity,
				"prd_condition" => $prd_condition,
				"prd_type" => $prd_type,
				"prd_description" => $prd_description
			);
			$this->BA_model->add_products($prd_details,$prd_category,$prd_pic);
			$notification = "You have successfully added a product";
		}
		else if($mod == 2){
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'csv';
			$config['max_size']	= '5000';
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$error = $this->upload->display_errors();
				echo $error;
				//$this->session->set_userdata('addPrdPicErr',$error);
			}
			else
			{
				$upload_data = $this->upload->data();
				$handle = fopen("./uploads/" . $upload_data['file_name'], "r");		
				while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
					$prd_name = $data[0];                  	$prd_price = $data[1]; 
					$prd_quantity = $data[2]; 				$prd_type = $data[3];  
					$prd_category = $data[4]; 				$prd_condition = $data[5]; 
					$prd_description = $data[6]; 			$prd_pic = "no_image_thumb.gif";	
					$prd_ID = $this->generate_ID("product");	
					$prd_details = array (
						"prd_ID" => $prd_ID,
						"biz_ID" => $biz_ID,
						"prd_name" => $prd_name,
						"prd_price" => $prd_price,
						"prd_quantity" => $prd_quantity,
						"prd_type" => $prd_type,
						"prd_condition" => $prd_condition,
						"prd_description" => $prd_description,
					);
					$this->BA_model->add_products($prd_details,$prd_category,$prd_pic,false);					
				}	
				$notification = "Your CSV file has successfully neen loaded";			
				fclose($handle);
				unlink($upload_data['full_path']);				
			}
		}		
		$this->session->set_userdata("notification",$notification);
		$this->show_prd_panel($biz_ID);		
	}
	public function edit_product(){
		$config['upload_path'] = './images/uploads/';
		$config['allowed_types'] = 'jpg|gif|png';
		$config['max_size']	= '1000';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();
			//echo "You have successfully added a record but " . $error;
			$prd_pic = $this->input->post("prd-pic");
		}
		else
		{
			$upload_data = $this->upload->data();
			$prd_pic = $upload_data['file_name'];
			$old_prd_pic = $upload_data['file_path'] . $this->input->post("prd-pic");
			unlink($old_prd_pic);							
		}	
		$biz_ID = $this->session->userdata("biz_ID");
		$prd_ID = $this->input->post("prd-ID");
		$prd_type = $this->input->post("prd-type");
		$prd_name = $this->input->post("prd-name");
		$prd_price = $this->input->post("prd-price");
		$prd_quantity = $this->input->post("prd-quantity");
		$prd_condition = $this->input->post("prd-condition");					
		$prd_category = $this->input->post("prd-category");
		$prd_description = $this->input->post("prd-description");
		$prd_details = array(
			"prd_name" => $prd_name,
			"prd_price" => $prd_price,
			"prd_quantity" => $prd_quantity,
			"prd_condition" => $prd_condition,
			"prd_type" => $prd_type,
			"prd_description" => $prd_description
		);
		$this->BA_model->edit_product($prd_ID,$prd_details,$prd_category,$prd_pic);	
		$notification = "You have successfully edited your product";
		$this->session->set_userdata("notification",$notification);
		$this->show_prd_panel($biz_ID);	
	}
	public function del_prd($prd_ID){
		$biz_ID = $this->session->userdata("biz_ID");
		$this->BA_model->delete_prd($biz_ID,$prd_ID);
		$notification = "You have successfully deleted your product";
		$this->session->set_userdata("notification",$notification);
		$this->show_prd_panel($biz_ID);	
	}
	public function filter($type){
		$biz_ID = $this->session->userdata("biz_ID");
		$srch_phrase = $this->input->post("search_string");
		switch ($type){
			case "client-prd-search" :
				$products = $this->BA_model->load_products($biz_ID,"search",$srch_phrase);
				$data["biz_name"] = $this->session->userdata("biz_name");
				if($products->num_rows() == 0){
					echo "No products found";
				}
				else{
					$this->load_filtered_products($products);
				}				
				break;
		}
	}
	public function load_filtered_products($products){
		foreach($products->result() as $row){
			echo '<div class = "list-row">';
			echo '<div class = "list-column"><img class = "prd-thumbnails" alt = "' . $row->pic_name . '" src="' . base_url() . 'images/uploads/' . $row->pic_name . '"></div>';
			echo '<div class = "list-column"><span class = "BA-green">' . $row->prd_name . '</span></div>';
			echo '<div class = "list-column low-p"><span class = "BA-green">' . $row->cat_name . '</span></div>';
			echo '<div class = "list-column"><span class = "BA-green"><span>MWK </span><span id = "price-cont">' . number_format((float)$row->prd_price,2) . '</span></span></div>';
			echo '<div class = "list-column low-p"><span class = "BA-green">' . $row->prd_quantity . '</span></div>';
			echo '<div class = "hidden"><span class = "BA-green">' . $row->prd_type . '</span></div>';
			echo '<div class = "hidden"><span class = "BA-green">' . $row->prd_description . '</span></div>';  
			echo '<div class = "hidden"><span class = "BA-green">' . $row->prd_condition . '</span></div>'; 
			echo '<div class = "hidden"><span class = "BA-green">' . $row->prd_ID . '</span></div>';
			echo '<div class = "hidden"><span class = "BA-green">' . $row->pic_name . '</span></div>';        
			echo '<div class = "list-column low-p">';
			echo '<div class = "ctrl-icons-cont">';
			echo '<img id = "' . $row->prd_ID . '" src="' . base_url()  . 'images/edit.jpg" class="ctrl-icons edit-btn">';
			echo '<img id = "' . base_url("DBController/del_prd/" . $row->prd_ID) . '" src="' . base_url() . 'images/delete.jpg" class="ctrl-icons del-btn">';
			echo '</div>';
			echo '</div>';
			echo '<div class = "list-column show-hidden"><span class = "BA-dark-orange">View more...</span></div>';
			echo '</div>';
		}	
	}
}
	