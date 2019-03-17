<?php
date_default_timezone_set('Asia/Singapore');

class Historicsites {

    private $conn;
    // Constructor with DB
    public function __construct() {
        require_once dirname(__FILE__) . '../../include/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();

    }
    public function fetchall() {
        $query = 'Select * from historic_sites';
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            return $result;
        }
       else{
           return NULL;
    }
}
    public function singlefetch($id){
        $query = "SELECT * FROM historic_sites WHERE id = ?";
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