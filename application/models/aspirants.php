<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Aspirants extends CI_Model {

	public function load_candidates(){
	$candidates = array();
	$candidates['presidential_candidates'] = $this->presidential_candidates();
	}
	public function presidential_candidates(){

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
		$this->load->view('candidates', $data);
	}
	public function process($countyid)
	{
		//find county information
		$this->db->where('countyid',$countyid);
		$result = $this->db->get('county');
		$result = $result->result_array()[0];
		$countyinfo['registered_voters'] = $result['registered'];
		$countyinfo['county_name'] = $result['name'];
		$candidates['countyinfo'] = $countyinfo;
		
		//find gurbernatorial aspirants
		$this->db->select('gurbernatorial_candidates.surname, 
                   gurbernatorial_candidates.other_name, 
                   gurbernatorial_candidates.running_mate,   
                   parties.name');
		$this->db->from('gurbernatorial_candidates');
		$this->db->where('countyid',$countyid);
		$this->db->join('parties', 'gurbernatorial_candidates.party= parties.id');
		$result = $this->db->get();

		$candidates['gurbernatorial_aspirants'] = $result->result_array();
		
		//find senatorial aspirants
		$this->db->select('senatorial_candidates.surname, 
                   senatorial_candidates.other_name, 
                   senatorial_candidates.running_mate,   
                   parties.name');
		$this->db->from('senatorial_candidates');
		$this->db->where('countyid',$countyid);
		$this->db->join('parties', 'senatorial_candidates.party= parties.id');
		$result = $this->db->get();

		$candidates['senatorial_aspirants'] = $result->result_array();
		
		//find womenrep aspirants
		$this->db->select('womenrep_candidates.surname, 
                   womenrep_candidates.other_name, 
                   womenrep_candidates.running_mate,   
                   parties.name');
		$this->db->from('womenrep_candidates');
		$this->db->where('countyid',$countyid);
		$this->db->join('parties', 'womenrep_candidates.party= parties.id');
		$result = $this->db->get();

		$candidates['womenrep_aspirants'] = $result->result_array();

		return $candidates;
	}
}

?>