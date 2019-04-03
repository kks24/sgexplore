<?php
date_default_timezone_set('Asia/Singapore');

class Museums {

    private $conn;
    // Constructor with DB
    public function __construct() {
        require_once dirname(__FILE__) . '../../include/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();

    }
    public function fetchall() {
        $query = 'Select * from museums';
        $stmt = $this->conn->prepare($query);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            return $result;
        }
       else{
           return NULL;
    }
}
    
    public function distance($long,$lat,$distance){
    $query = 'SELECT *, ( 6371 * acos ( cos ( radians(?) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians(?) ) + sin ( radians(?) ) * sin( radians( lat ) ) ) ) AS distance FROM museums HAVING distance <= ?
    ORDER by distance';

    $stmt = $this->conn->prepare($query);
    $stmt->bind_param("dddd",$lat,$long,$lat,$distance);
    if ($stmt->execute()) {
            $result = $stmt->get_result();
            return $result;
        }
        else{
            return NULL;
        }
    }
    
    public function singlefetch($id){
        $query = "SELECT * FROM museums WHERE id = ?";
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