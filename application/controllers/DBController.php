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
		//$this->load->model('model');
		$this->load->helper('form');
		$this->load->helper('url');
		//$this->load->library('session');
	}
	public function index()
	{
		$this->load->view('header');
		$this->load->view('home_page_user');
		//$this->load->view('user_business_page');
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
		$this->load("business");
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
	public function login(){
		$email = $this->input->post("email");
		$password = $this->input->post("password");
		if ($email == "BO"){
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
		}
	}
}
	