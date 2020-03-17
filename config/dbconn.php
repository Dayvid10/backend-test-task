<?php 
class Dbconn{

	private $servername = "localhost";
    private $db_name = "sms";
    private $username = "root";
    private $password = "";
    public $conn;
 

	function dbconn(){
		$servername= "localhost";
		$username="root";
		$password="";
		$dbname="sms";

		// Create connection
		$conn = new mysqli($servername,$username,$password,$dbname);
		return $conn;
		
	}

	public function getConnection(){
 
        $this->conn = null;
 
        try{
            $this->conn = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

	function testconn(){

		// Check connection
		if($conn->connect_error){
			echo "Connection failed".$conn->connect_error;
		}else{
			echo "Connected successfully in the database";
		};
	}
}
?>
