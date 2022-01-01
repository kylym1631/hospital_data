<?php
    class  Info{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

//    public function getCity()
//    {
//        $this->db->query("SELECT * FROM links where city = 'moscow'");
//        $resultsCity = $this->db->resultSet();
//        return $resultsCity;
//    }
}