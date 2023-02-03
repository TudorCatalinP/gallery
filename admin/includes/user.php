<?php 


class User{

	protected static  $db_table = "users";
	protected static $db_table_fields = array('username','password','first_name','last_name');
	public $id;
	public $username;
	public $password;
	public $first_name;
	public $last_name;


	public static function find_all_users(){
		// global $database;
		// $result_set = $database->query("SELECT * FROM users");
		// return $result_set;

		return self::find_this_query("SELECT * FROM users");
	}


	public static function find_user_by_id($user_id){
		global $database;
		$the_result_array = self::find_this_query("SELECT * FROM users WHERE id={$user_id} LIMIT 1");

		//if !empty($the_result_array) return array_shift($the_result_array) else retrun false; 
		return !empty($the_result_array) ? array_shift($the_result_array) : false;
			
		// if(!empty($the_result_array)){
		// 	$first_item = array_shift($the_result_array);
		// }else {
		// 	return false;
		// }
	}

	public static function verify_user($username, $password){
		global $database;

		$username = $database->escaped_string($username);
		$password = $database->escaped_string($password);


		$query  = "SELECT * FROM users WHERE ";
		$query .= "username = '{$username}' ";
		$query .= "AND password = '{$password}' ";
		$query .= "LIMIT 1";

		$the_result_array = self::find_this_query($query);
		return !empty($the_result_array) ? array_shift($the_result_array) : false;

	}

	//now we are returning an array of objects , no more results sets . we can loop through objects normaly , we dont have to use the while ($row = mysqli_fetch_array anymore)
	public static function find_this_query($sql){
		global $database;
		$result_set = $database->query($sql);
		//we create an empty array to put our objects in there
		$the_object_array = array();
		//we create this loop that fetches our database, our table,a dn brings back the result as ....
		while($row = mysqli_fetch_array($result_set)){
			//we are bringing back the object and it s properties into this array right here
			$the_object_array[] = self::instantiaton($row);
		}
		return $the_object_array;		
	}

	//this method gets an array as a paramater and then it creates an object and assigns the array s
	//values to the object's properties
	public static function instantiaton($the_record){

        $the_object             = new self;

       // $the_object->id         = $the_record['id'];
       // $the_object->username   = $the_record['username'];
       // $the_object->first_name = $the_record['first_name'];
       // $the_object->last_name  = $the_record['last_name'];
       // $the_object->password   = $the_record['password'];	
        //loops through the record through the columns and records and assigns those to our objects properties
        //we are replacing $row['username'] with objects properties
        foreach ($the_record as $the_attribute => $value) {
        	# code...
        	if($the_object->has_the_attribute($the_attribute)){
        		$the_object->$the_attribute = $value;
         	}
        }



       return $the_object;	
	}



	private function has_the_attribute($the_attribute){
 
		$object_properties = get_object_vars($this);
 
		return array_key_exists($the_attribute, $object_properties);
 
	}

	public function properties(){
		// get_object_vars($this) returns an associative array like the one bellow 
		// with the keys : id,username,password,first_name,last_name
		//and the values of every user
		// 		Array
		// (
		//     [id] => 3
		//     [username] => suave
		//     [password] => 123
		//     [first_name] => marisa
		//     [last_name] => williams
		// )
		//return get_object_vars($this); 
		$properties = array();

		foreach (self::$db_table_fields as $db_field) {
			//echo " is ".$db_field." ... ".$this->$db_field ."<br>";
			# code...
			if (property_exists($this, $db_field)) {

				$properties[$db_field] = $this->$db_field;
			}
		}
		return $properties;
		//$properties => associative array
		// echo "<pre>";
		// print_r($properties);
	}

	protected function clean_properties(){
		global $database;


		$clean_properties= array();
		foreach( $this->properties() as $key => $values ){
			$clean_properties[$key] = $database->escaped_string($values);
		}
		return $clean_properties;
	}


	public function save(){

		return  isset($this->id) ? $this->update() : $this->create();
		
	}

	public function create(){
		global $database;

		$properties = $this->clean_properties();


		$sql  = "INSERT INTO ". self::$db_table . "(" . implode(",", array_keys($properties)) . ")";
		$sql .= "VALUES ('". implode("','", array_values($properties)) ."')";


		if($database->query($sql)){
			$this->id = $database->the_insert_id();
			return true;
		}else{
			return false;
		}
	}

	public function update(){
		global $database;

		$properties = $this->clean_properties();
		$property_pairs = array();

		foreach ($properties as $key => $value) {
			# code...
			$property_pairs[]="{$key}='{$value}'";

		}

		
		$sql = "UPDATE ". self::$db_table ." SET ";	
		// $sql .= "username ='". $database->escaped_string($this->username) ."', ";
		// $sql .= "password ='". $database->escaped_string($this->password) ."', ";
		// $sql .= "first_name ='". $database->escaped_string($this->first_name) ."', ";
		// $sql .= "last_name ='". $database->escaped_string($this->last_name) ."' ";
		$sql .= implode(", ", $property_pairs);
		$sql .= " WHERE id=". $database->escaped_string($this->id);

		$database->query($sql);

		return (mysqli_affected_rows($database->connection)==1) ? true : false;

	}
	
	public function delete(){
		global $database;
		
		$sql = "DELETE FROM ". self::$db_table ." ";
		$sql .= "WHERE id =". $database->escaped_string($this->id);	
		$sql .= " LIMIT 1 ";
		$database->query($sql);

		return (mysqli_affected_rows($database->connection)==1) ? true : false;

	}





}//End of User Class





 ?>