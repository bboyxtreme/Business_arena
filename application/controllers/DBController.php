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
		$biz_ID = "BD00002";
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
		$data["products"] = $this->BA_model->load_products($biz_ID);
		$data["prd_categories"] = $this->BA_model->load_prd_categories();
		$data["biz_name"] = $this->session->userdata("biz_name");
		$this->load->view('header_logged_in');
		$this->load->view('client_prds_page',$data);
		$this->load->view('footer');
	}
	public function add_products($mod = "1"){
		$biz_ID = $this->session->userdata("biz_ID");
		$prd_ID = "PR00003";
		if($mod == "1"){
			$prd_pic = "no_image_thumb.jpg";
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
			//$this->BA_model->add_products($prd_details,$prd_category,$prd_pic);
		}
		else if($mod == 2){
			
		}	
		/*foreach ($prd_details as $key => $value){
			echo $key . " -> " . $value . "<br>"; 	
		}*/
		//echo "category -> " . $prd_category . "<br>";
		//echo "cond -> " . $this->input->post("prd-condition");		
	}
	public function edit_products($prd_ID){
		$biz_ID = $this->session->userdata("biz_ID");
		$prd_pic = "no_image_thumb.jpg";
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
		
	}
}
	