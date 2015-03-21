<?php
	class DB_Provider 
		{
			//Constructor
			function __construct() 
			{	}
		 
			//Destructor
			function __destruct() 
			{	}

			public function selectDB()
			{
				require_once 'config.php';
				return 	mysql_select_db(DB_DATABASE);
			}
		 
			// Connecting to database
			public function connect() 
			{
				require_once 'config.php';
				
				//Connect to database
				$temp_database = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
				
				//Select the database
				mysql_select_db(DB_DATABASE);
				
				//Changing characters set to accept every language
				mysql_set_charset('utf8',$temp_database);
		 
				// return database handler
				return $temp_database;
			}
		 
			// Closing database connection
			public function close() 
			{	mysql_close(); }
		 
		}
?>