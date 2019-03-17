<?php
date_default_timezone_set('Asia/Singapore');

class Hawkercentres {

    private $conn;
    // Constructor with DB
    public function __construct() {
        require_once dirname(__FILE__) . '../../include/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();

    }
    public function fetchall() {
		//$exist = "'Existing'";
		//$existnew = "'Existing (new)'";
        $query = 'Select * from hawker_centres where STATUS=\'Existing\' OR STATUS=\'Existing (new)\'';
        $stmt = $this->conn->prepare($query);
		//$stmt->bind_param("ss", $exist, $existnew);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            return $result;
        }
       else{
           return NULL;
    }
}
    
    
    public function singlefetch($id){
        $query = "SELECT * FROM hawker_centres WHERE id = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            return $result;
        }
        else{
            return NULL;
        }


    }
	
}?>