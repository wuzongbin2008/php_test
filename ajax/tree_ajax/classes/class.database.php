<?php
/*
* MARCO VOEGELI 31.12.2005
* www.voegeli.li
* This class provides one central database-connection for
* al your php applications. Define only once your connection
* settings and use it in all your applications.
*/

 class Database  { // Class : begin
	 var $host;  		//Hostname, Server
	 var $password; 	//Passwort MySQL
	 var $user; 		//User MySQL
	 var $database; 	//Datenbankname MySQL
	 var $link;
	 var $query;
	 var $result;
	 var $rows;

	function Database() { // Method : begin
		$this->rows = 0;
		if($_SERVER['HTTP_HOST'] == 'localhost' || ereg('^192\.168\.0\.[0-9]+$', $_SERVER['HTTP_HOST'])) {
			/* Local connetion vars */
			$this->host = "localhost";
			$this->password = "19791231";
			$this->user = "root";
			$this->database = "test";
		} else {
			/* Internet connetion vars */
			$this->host = "server";
			$this->password = "19791231";
			$this->user = "root";
			$this->database = "test";
			}
	} // Method : end

	function OpenLink()  { // Method : begin
		$this->link = @mysql_connect($this->host,$this->user,$this->password); // or die (print "Class Database: Error while connecting to DB (link)");
		if(mysql_error()) {
			$this->connected = false;
			$this->error = mysql_error();
		} else {
		}
		return $this->connected;
	} // Method : end

	function SelectDB() { // Method : begin
		if(!@mysql_select_db($this->database,$this->link)) {   //; or die (print "Class Database: Error while selecting DB");
			$this->connected = false;
			$this->error = mysql_error();
		} else {
			$this->connected = true;
		}
	} // Method : end

	function CloseDB() { // Method : begin
		mysql_close();
	 } // Method : end

	function Query($query) { // Method : begin
		$this->OpenLink();
		$this->SelectDB();
		$this->query = $query;
		$this->result = mysql_query($query,$this->link) or die (print "Class Database: Error while executing Query");
		$this->error = mysql_error();
		// $rows=mysql_affected_rows();

		if(ereg("SELECT",$query)) {
			$this->rows = mysql_num_rows($this->result);
		}
		$this->CloseDB();
	} // Method : end

	// Return true if there was an error
	function is_error() {
		return (!empty($this->error)) ? true : false;
	}

	function fetchRow() { // Method : begin
		return mysql_fetch_array($this->result);
		$this->error = mysql_error();
	} // Method : end

	function getResult($row,$field) { // Method : begin
		return mysql_result($this->result,$row,$field);
	} // Method : end

	function getError() { // Method : begin
		return mysql_error();
	} // Method : end

	function getNumRows() { // Method : begin
		return $this->rows;
	} // Method : end

 } // Class : end

?>
