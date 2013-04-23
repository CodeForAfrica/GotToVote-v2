<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Map extends CI_Model {

	public function load_map(){
		$this->db->select('*');
		$this->db->from('counties');
		$this->db->join('voters', 'counties.OBJECTID=voters.countyid');
		$this->db->join('poverty', 'counties.OBJECTID=poverty.countyid', 'left');
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
		$this->db->join('poverty', 'poverty.countyid=winners_county.countyid', 'inner');
		$this->db->join('voters', 'voters.countyid=winners_county.countyid', 'inner');
		$this->db->where('winners_county.candidate', '8');
		$cordareas = $this->db->get();
		$data['cordarea'] = $cordareas->result_array();
		
		//show jubilee strongholds
		$this->db->select('*');
		$this->db->from('winners_county');
		$this->db->join('counties', 'counties.OBJECTID=winners_county.countyid', 'inner');
		$this->db->join('poverty', 'poverty.countyid=winners_county.countyid', 'inner');
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
		
		
		$this->load->view('map', $data);
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */