<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sms extends CI_Controller {

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

		$data['presidential_aspirants'] = $result->result_array();
		
		$data['title'] = 'Home';
		
		$this->load->view('templates/header',$data);
		$this->load->view('home',$data);
		$this->load->view('templates/footer',$data);
	}
	
	public function process()
		{
			
			$countyid = $_POST['countyid'];
			//find county information
			$this->db->where('countyid',$countyid);
			$result = $this->db->get('county');
			$result = $result->result_array();
			$result = $result[0];
			$countyinfo['registered_voters'] = $result['registered'];
			$countyinfo['county_name'] = $result['name'];
			$data['countyinfo'] = $countyinfo;
			
			//show presidential aspirants before county selected
			$this->db->select('presidential_candidates.surname, 
	                   presidential_candidates.other_name, 
	                   presidential_candidates.running_mate,   
	                   parties.name');
			$this->db->from('presidential_candidates');
			$this->db->join('parties', 'presidential_candidates.party= parties.id');
			$result = $this->db->get();
	
			$data['presidential_aspirants'] = $result->result_array();
			
			//find gurbernatorial aspirants
			$this->db->select('gurbernatorial_candidates.surname, 
	                   gurbernatorial_candidates.other_name, 
	                   gurbernatorial_candidates.running_mate,   
	                   parties.name');
			$this->db->from('gurbernatorial_candidates');
			$this->db->where('countyid',$countyid);
			$this->db->join('parties', 'gurbernatorial_candidates.party= parties.id');
			$result = $this->db->get();
	
			$data['gurbernatorial_aspirants'] = $result->result_array();
			
			//find senatorial aspirants
			$this->db->select('senatorial_candidates.surname, 
	                   senatorial_candidates.other_name, 
	                   senatorial_candidates.running_mate,   
	                   parties.name');
			$this->db->from('senatorial_candidates');
			$this->db->where('countyid',$countyid);
			$this->db->join('parties', 'senatorial_candidates.party= parties.id');
			$result = $this->db->get();
	
			$data['senatorial_aspirants'] = $result->result_array();
			
			//find womenrep aspirants
			$this->db->select('womenrep_candidates.surname, 
	                   womenrep_candidates.other_name, 
	                   womenrep_candidates.running_mate,   
	                   parties.name');
			$this->db->from('womenrep_candidates');
			$this->db->where('countyid',$countyid);
			$this->db->join('parties', 'womenrep_candidates.party= parties.id');
			$result = $this->db->get();
	
			$data['womenrep_aspirants'] = $result->result_array();
	
			$this->load->view('aspirants', $data);
		}
		public function sendsms(){
			$name = mysql_real_escape_string($this->input->post('name'));
			$email = $this->input->post('email');
			$sendernumber = $this->input->post('sendernumber');
			$recipients = $this->input->post('recipient');
			
			//create confirmation code
			$characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
			$confirmcode = '';
			 for ($i = 0; $i < 7; $i++) {
			      $confirmcode.= $characters[rand(0, strlen($characters) - 1)];
			 }
		
			//store sender
			$data = array(
		   'Sender_No' => $sendernumber ,
		   'Name' => $name ,
		   'Email' => $email,
		   'Confirm_Code' => $confirmcode
		   );
		
			//get sender id 
			$senderid = $this->db->insert_id();
			
			//store recipients
			foreach($recipients as $recipient){
				if($recipient!=''){
				$data = array(
				'Sender_Id' => $senderid,
				'Mob_No' => $recipient
				);
				$this->db->insert('sms_recipient', $data);
				}
			}

			//redirect user to home with success/fail message
		}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */