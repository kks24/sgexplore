<?php
date_default_timezone_set('Asia/Singapore');

class Searchmodel {

    private $conn;
    // Constructor with DB
    public function __construct() {
        require_once dirname(__FILE__) . '../../include/DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();

    }
    public function search_place($search) {
        $query = 'SELECT * FROM search_table WHERE NAME LIKE ? OR ADDRESSSTREETNAME LIKE ?';
        $stmt = $this->conn->prepare($query);
        $fullq = "%".$search ."%";
        $stmt->bind_param("ss", $fullq, $fullq);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            return $result;
        }
        else{
            return NULL;
        }
}
	
}?>