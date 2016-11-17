<?php
	
	require_once('new_config.php');
	class Database{

		private $connection;

		function __construct(){
			$this->open_db_connection();
		}

		//create a connection
	    public function open_db_connection()
	    {
	    	$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
	    	if(mysqli_connect_errno()){
	    		die("Database connection failed!".mysqli_error());
	    	}else{
	    		echo "Database connected!";
	    	}
	    }
	}
	new Database();
?>