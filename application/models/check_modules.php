<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Check_modules extends CI_Model {
 public function __construct()
 {
  parent::__construct();
 }
 public function load_installed_modules(){
	$this->load->model('map');
	$this->load->model('reg_centers');
	if($this->isactive('sms')){
		//load sms
			$this->load->view('sms');
		}
	if($this->isactive('aspirants')){
			$this->map->load_map();
		}
	if($this->isactive('reg_centers')){
			$this->reg_centers->view_centers();
		}
 }
 public function isActive($module){
	$this->db->select('*');
	$this->db->from('modules');
	$this->db->where("name", $module);
	$result = $this->db->get();
	$modules = $result->result_array();
	$isactive = $modules[0]['active'];
	
	if($isactive=='1'){
		return true;
	}else{
		return false;
	}
 }
 public function installed_admin($modules){
		if($this->isActive('sms')){
			$modules['sms'] = '1';
		}
		else{
			$modules['sms'] = '0';
		}
		if($this->isActive('reg_centers')){
			$modules['reg_centers'] = '1';
		}
		else{
			$modules['reg_centers'] = '0';
		}
		if($this->isActive('aspirants')){
			$modules['aspirants'] = '1';
		}
		else{
			$modules['aspirants'] = '0';
		}
		if($this->isActive('voter_turnout')){
			$modules['voter_turnout'] = '1';
		}
		else{
			$modules['voter_turnout'] = '0';
		}
		return $modules;
 }

public function manage_modules(){ 
	$modules = $this->input->post('modules');
	if(!is_array($modules)){
	$modules = array();
	}
	$allmodules = array('sms', 'voter_turnout', 'reg_centers', 'aspirants');
	foreach($allmodules as $eachmodule){
		if(in_array($eachmodule, $modules)){
			//activate
			$data = array('active'=>'1');
			$this->db->where('name',$eachmodule);
			$this->db->update('modules', $data);
			$this->create_module_tables($eachmodule);
		}
		else{
			//deactivate
			$data = array('active'=>'0');
			$this->db->where('name',$eachmodule);
			$this->db->update('modules', $data);
		}
		
	}
	
}
public function create_module_tables($module){
	if($module=='sms'){
	$this->create_sms_tables();
	}
}
public function create_sms_tables(){
		$this->db->query("CREATE TABLE IF NOT EXISTS `sms_recipient` (
		  `ID_No` int(255) NOT NULL AUTO_INCREMENT,
		  `Mob_No` text,
		  `Sender_Id` int(255) DEFAULT NULL,
		  `Date_Added` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
		  `Date_Sent` timestamp NULL DEFAULT NULL,
		  `Sent` int(4) DEFAULT NULL,
		  PRIMARY KEY (`ID_No`)
		) ;");
		$this->db->query("CREATE TABLE IF NOT EXISTS `sms_sender` (
		  `ID_No` int(255) NOT NULL AUTO_INCREMENT,
		  `Sender_No` text,
		  `Name` text,
		  `Email` text,
		  `Confirm_Code` text,
		  `Confirmed` int(4) DEFAULT NULL,
		  `Date_Added` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
		  `Date_Confirm` timestamp NULL DEFAULT NULL,
		  PRIMARY KEY (`ID_No`)
		) ");
	}
}
?>