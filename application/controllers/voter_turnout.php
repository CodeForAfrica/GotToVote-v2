<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Voter_turnout extends CI_Controller {

	public function index()
	{
					//get voter turnout
			$this->db->select('counties.OBJECTID,
							   counties.geometry,
							   counties.EDNAME,
							   counties.ref,
							   counties.type,
							   voters.countyid,
							   voters.VALID,
							   voters.REG');
			$this->db->from('counties');
			$this->db->join('voters', 'counties.OBJECTID=voters.countyid');
			$result = $this->db->get();
			$data['voter_turnout'] = $result->result_array();
			$this->load->view('voter_turnout', $data);		
	}
}
?>