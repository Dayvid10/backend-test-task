<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/dbconn.php';
include_once '../objects/student.php';
 
// get database connection
$database = new Dbconn();
$db = $database->getConnection();
 
// prepare student object
$student = new Student($db);
 
// get id of student to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of student to be edited
$student->id = $data->id;
 
// set student property values
$student->name = $data->name;
$student->email = $data->email;
$student->address = $data->address;
$student->password = $data->password;
 
// update the student
if($student->update()){
    echo '{';
        echo '"message": "Student Details was updated."';
    echo '}';
}
 
// if unable to update the student, tell the user
else{
    echo '{';
        echo '"message": "Unable to update Student Details."';
    echo '}';
}
?>
