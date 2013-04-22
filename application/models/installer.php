<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Installer extends CI_Model{
	function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	public function installed(){
		if ($this->db->table_exists('results'))
		{
		// table exists
			return true;
		}
		else
		{
		// table does not exist
			return false;
		} 
	}
	public function install(){
		/*// Connect to the database
		//$mysqli = new mysqli($config['hostname'],$config['username'],$config['password'],$config['database']);
		$mysqli = new mysql("localhost","root","","ci_install");

		// Check for errors
		if(mysql_connect_errno())
			return false;

		// Open the default SQL file
		$query = file_get_contents('http://localhost/c4k/install.sql');

		// Execute a multi query
		$mysqli->query($query);

		// Close the connection
		$mysqli->close();

		return true;*/
		//load file
				$commands = file_get_contents('http://localhost/c4k/install.sql');

				//delete comments
				$lines = explode("\n",$commands);
				$commands = '';
				foreach($lines as $line){
				$line = trim($line);
				if( $line && !startsWith($line,'--') ){
				$commands .= $line . "\n";
				}
				}

				//convert to array
				$commands = explode(";", $commands);

				//run commands
				$total = $success = 0;
				foreach($commands as $command){
				if(trim($command)){
				$success += (@mysql_query($command)==false ? 0 : 1);
				$total += 1;
				}
				}

				//return number of successful queries and total number of queries found
				return array(
				"success" => $success,
				"total" => $total
				);
	}
	public function startsWith($haystack, $needle)
	{
			return !strncmp($haystack, $needle, strlen($needle));
	}
}
?>