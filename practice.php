<?php 


define ('DB_HOST','localhost');
define ('DB_USER','root');
define ('DB_PASS','');
define ('DB_NAME','gallery_db');

$connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

if (!$connection){
	echo "try again to connect to local database";
}else {
	
}

$query = $connection->query("SELECT * FROM users");
// echo " the connection->query result is a  ";
// var_dump($query);
// echo "accesing the object with the property of ". $query->field_count." fields";
// echo "";
// echo "<hr>the only way to echo out the object is by looping it row by row / field by field using the while loop <br>";
// while ($row=mysqli_fetch_array($query)){
// 	echo $row['username']."<br>";
// }
// echo "<hr>";
// echo "the mysqli->query return a result of type object <br>";
// echo "the result of type object contains a number of array equal to the number of rows (id s) of the table <br>";
// foreach ($query as $key => $value) {
// 	# code...
// 	echo "the key is ".$key . " and the value is the array ";
// 	var_dump($value);
// 	echo "<hr>";
// }

// $result = mysqli_fetch_array($query);
// var_dump($result);
// foreach ($result as $key => $value) {
// 	# code...
// 	echo $key ."=>". $value." <br>";
// }


$assoc_array = array("id"=>"1", "username" =>"tudorC", "password"=>"123", "firstname"=>"tudor", "lastname"=>"catalin");
echo "<pre>";
print_r($assoc_array);

echo implode (',', array_keys($assoc_array));
echo implode (',', array_values($assoc_array));

echo "<br>";

foreach ($assoc_array as $key => $value) {
	echo " key is ".$key." ";
	echo " value is ".$value."<br>";
	# code...
}

 ?>