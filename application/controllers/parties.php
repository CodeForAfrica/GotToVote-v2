<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parties extends CI_Controller {

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
		
		$data_1['title'] = 'Parties';
		
		//Get all parties
		$this->db->select('id, name, abr, picture');
		$this->db->from('parties');
		$result = $this->db->get();
		
		$data_2['parties'] = $result->result_array();
		
		$this->load->view('templates/header', $data_1);
		$this->load->view('parties', $data_2);
//		$this->load->view('templates/footer', $data_1);
		
	}
	
	public function getCandidates() {
	
		$party_id = $_GET['party_id'];
		
		$this->db->select('id');
		$this->db->from('presidential_candidates');
		$this->db->where('party', $party_id);
		$result_president = $this->db->get();
		
		$result_president = $result_president->result_array();
		
		$this->db->select('id');
		$this->db->from('gurbernatorial_candidates');
		$this->db->where('party', $party_id);
		$result_governor = $this->db->get();
		
		$result_governor = $result_governor->result_array();
		
		$result_out['president']['count'] = count($result_president);
		$result_out['governor']['count'] = count($result_governor);
		
		echo json_encode($result_out);
		
	}
}
?>