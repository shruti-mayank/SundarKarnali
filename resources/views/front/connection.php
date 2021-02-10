<?php 
$con=new mysqli('localhost','root','','php_crud');
//localhost->server name
//root->username
//''->password which is empty
// php_crud->database name
if($con->connect_error>=1){
	die('failed to connect to database');
}
else{
	// echo "database connected successfully";
}
?>