<?php

class Database {

	// Function to the database and tables and fill them with the default data
	function create_database($data)
	{
		// Connect to the database
		$mysqli = new mysqli($data['hostname'],$data['username'],$data['password'],'');

		// Check for errors
		if(mysqli_connect_errno())
			return false;

		// Create the prepared statement
		$mysqli->query("CREATE DATABASE IF NOT EXISTS ".$data['database']);

		// Close the connection
		$mysqli->close();

		return true;
	}

	// Function to create the tables and fill them with the default data
	function create_users_table($data)
	{
		// Connect to the database
		$mysqli = new mysqli($data['hostname'],$data['username'],$data['password'],$data['database']);

		// Check for errors
		if(mysqli_connect_errno())
			return false;

		// Open the default SQL file
		$query = "CREATE TABLE IF NOT EXISTS `user` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '4',
  `isadmin` int(1) NOT NULL DEFAULT '1',
  `joined` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)";
$query2 = "CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` text NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ";
$query3 = "INSERT INTO `user_roles` (`id`, `role`, `level`) VALUES
(1, 'Super Administrator', 1),
(2, 'Administrator', 2),
(3, 'Contributor', 3),
(4, 'Subscriber', 4),
(5, 'Guest', 5)";
$query4 = "CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ";
$query5 = "INSERT INTO `modules` (`id`, `name`, `active`) VALUES
(1, 'sms', 0),
(2, 'reg_centers', 0),
(3, 'aspirants', 0),
(4, 'voter_turnout', 0)";

		// Execute a multi query
		$mysqli->query($query);
		$mysqli->query($query2);
		$mysqli->query($query3);
		$mysqli->query($query4);
		$mysqli->query($query5);

		// Close the connection
		$mysqli->close();

		return true;
	}
}