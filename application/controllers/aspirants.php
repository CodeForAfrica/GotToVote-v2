<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Aspirants extends CI_Controller {

	 public function __construct(){
		parent::__construct();
		$this->load->model('aspirants');
	}
	public function index(){
		$data['candidates'] = $this->model->load_candidates();
		$this->load->view('candidates');
	}
	public function process(){
		$countyid = $_POST['id'];
		$data['candidates'] = $this->model->load_candidates($countyid);
		$this->load->view('candidates');
	}
}
?>