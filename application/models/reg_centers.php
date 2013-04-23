<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reg_centers extends CI_Model {
	public function view_centers()
	{
		//$data['title'] = 'Registration centers';
		//$this->load->view('templates/header', $data);
		$this->load->view('registration_centers');
		//$this->load->view('templates/footer', $data);
	}
}