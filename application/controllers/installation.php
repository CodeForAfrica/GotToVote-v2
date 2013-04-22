<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Installation extends CI_Controller {

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
		
		$data['title'] = 'Installation';
		//check if site has been installed
		$this->load->model('installer');
		if($this->installer->installed()){
			redirect(base_url());		
		}else{
			if($this->installer->install())
			{
				//installed
				print "installed";
				
			}
			else{
			//error creating tables
				print "not installed";
			}
		}

	}
}
?>
