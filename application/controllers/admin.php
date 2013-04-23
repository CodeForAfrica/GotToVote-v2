<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
	  public function __construct()
       {
            parent::__construct();
            // Your own constructor code
			if(($this->session->userdata('user_name')==""))
			{
				redirect('/user');
			}
       }
       
	public function index()
	{
		$modules = array();
		$this->load->model('check_modules');
		$data['installed'] = $this->check_modules->installed_admin($modules);
		
			$data['page_title'] = 'Admin Dashboard';		
			$this->load->view('admin/header_admin',$data);
			$this->load->view('admin/admin', $data);
			$this->load->view('admin/footer', $data);
	}
	public function manage_users(){
	
		$data['page_title'] = 'Manage Users';
		$this->load->view('admin/header_admin', $data);
		$this->load->view('admin/users',$data);
		$this->load->view('admin/add_user', $data);
		$this->load->view('admin/footer', $data);
		
	}
	public function activate_modules(){
		$this->load->model('check_modules');
		//$this->load->library('form_validation');

		//if($this->form_validation->run() == TRUE)
		//{
		   $this->check_modules->manage_modules();
		  
		//}
		$this->index();
	}

}