<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
				$this->load->view('map');
		
	}
	public function process()
	{
		
		$countyid = $_POST['countyid'];
		//find county information
		$sql = mysql_query("SELECT * FROM county WHERE countyid='$countyid'");
		$row = mysql_fetch_array($sql);
		$data['registered_voters'] = $row['registered'];
		$data['county_name'] = $row['name'];
		$this->load->view('aspirants', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */