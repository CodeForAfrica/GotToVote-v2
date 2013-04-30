<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Aspirants extends CI_Model {

	public function load_aspirants(){
		$this->db->select('*');
		$this->db->from('counties');
		$this->db->join('voters', 'counties.OBJECTID=voters.countyid');
		//$this->db->join('poverty', 'counties.OBJECTID=poverty.countyid', 'left');
		$countydata = $this->db->get();
		$data['countydata'] = $countydata->result_array();
		
		//get voting rates dataset
		$this->db->select('*');
		$this->db->from('counties');
		$this->db->join('voters', 'counties.OBJECTID=voters.countyid');
		$voterdata = $this->db->get();
		$data['voterdata'] = $voterdata->result_array();
		
		//show cord areas
		$this->db->select('*');
		$this->db->from('winners_county');
		$this->db->join('counties', 'counties.OBJECTID=winners_county.countyid', 'inner');
		//$this->db->join('poverty', 'poverty.countyid=winners_county.countyid', 'inner');
		$this->db->join('voters', 'voters.countyid=winners_county.countyid', 'inner');
		$this->db->where('winners_county.candidate', '8');
		$cordareas = $this->db->get();
		$data['cordarea'] = $cordareas->result_array();
		
		//show jubilee strongholds
		$this->db->select('*');
		$this->db->from('winners_county');
		$this->db->join('counties', 'counties.OBJECTID=winners_county.countyid', 'inner');
		//$this->db->join('poverty', 'poverty.countyid=winners_county.countyid', 'inner');
		$this->db->join('voters', 'voters.countyid=winners_county.countyid', 'inner');
		$this->db->where('winners_county.candidate', '2');
		$jubileeareas = $this->db->get();
		$data['jubileearea'] = $jubileeareas->result_array();		
		
		
		//show presidential aspirants before county selected
		$this->db->select('presidential_candidates.surname, 
                   presidential_candidates.other_name, 
                   presidential_candidates.running_mate,  
                   presidential_candidates.winner, 
                   parties.name,
                   parties.picture');
		$this->db->from('presidential_candidates');
		$this->db->join('parties', 'presidential_candidates.party= parties.id');
		$result = $this->db->get();
		
		$data['presidential_aspirants'] = $result->result_array();
		
		$data['title'] = 'Home';
		$this->load->view('candidates.php', $data);
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