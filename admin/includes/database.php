<?php 

require_once("new_config.php"); 
// we are making the data from the new_config.php file available for our connection

class Database{

	public $connection;

	//this way the second we instantiate the Database class the constructer method will be called automatically
	//and so will open the connection by accesing the public method open_db_connection
	function __construct(){

	$this->open_db_connection();

	}


	public function open_db_connection(){

		//$this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
							//we will attch to the connection property the object mysqli
		$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		if ($this->connection->connect_errno){
			echo "Database connection failed ".$this->connection->connect_error;
		}
	}

	private function confirm_query($result){

		if(!$result){
			die("query failed ".$this->connection->error);
		}
	}

	public function query($sql){
		//$result = mysqli_query($this->connection,$sql);
		$result = $this->connection->query($sql);
		$this->confirm_query($result);
		return $result;
	}



	public function escaped_string($string){
		//$escaped_string = mysqli_real_escape_string($this->connection,$string);
		$escaped_string = $this->connection->real_escape_string($string);
		return $escaped_string;
	}

	public function the_insert_id(){
		return $this->connection->mysqli_insert_id();
	}


}

//we instantiate right away the class so it would be available globally throughout the whole project
$database = new Database();



?>