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
		//show presidential aspirants before county selected
		$this->db->select('presidential_candidates.surname, 
                   presidential_candidates.other_name, 
                   presidential_candidates.running_mate,   
                   parties.name');
		$this->db->from('presidential_candidates');
		$this->db->join('parties', 'presidential_candidates.party= parties.id');
		$result = $this->db->get();

		//$result = $this->db->get('presidential_candidates');
		$data['presidential_aspirants'] = $result->result_array();
		$this->load->view('map', $data);
	}
	public function process()
	{
		
		$countyid = $_POST['countyid'];
		//find county information
		$this->db->where('countyid',$countyid);
		$result = $this->db->get('county');
		$result = $result->result_array()[0];
		$data['registered_voters'] = $result['registered'];
		$data['county_name'] = $result['name'];
		$this->load->view('aspirants', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */