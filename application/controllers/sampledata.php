<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sampledata extends CI_Controller {

	public function index()
	{
	$this->load->model('sample_data');
		$module = $_GET['module'];
		
		if($this->sample_data->is_installed($module)){
			print "sample data already installed";
		}
		else{
			if($this->sample_data->install($module)){
				print "sample data installed";
			}
		}
	}
	
	
}