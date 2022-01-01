<?php
    class Page{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getGender()
    {
        $this->db->query("SELECT * FROM gender");
        $resultsGender = $this->db->resultSet();
        return $resultsGender;
    }
}