<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// get database connection
include_once '../config/dbconn.php';
include_once '../objects/student.php';
 
$database = new Dbconn();
$db = $database->getConnection();
 
$student = new Student($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set student property values
$student->name = $data->name;
$student->email = $data->email;
$student->address = $data->address;
$student->password = $data->password;
 
// create the student
if($student->create()){
    echo '{';
        echo '"message": "Student was created."';
    echo '}';
}
 
// if unable to create the student, tell the user
else{
    echo '{';
        echo '"message": "Unable to create student."';
    echo '}';
}
?>
