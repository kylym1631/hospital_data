<?php
    class  Setting{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getSpecializations()
    {
        $this->db->query("SELECT * FROM specialization");
        $resultsSpecialization = $this->db->resultSet();
        return $resultsSpecialization;
    }

    public function addCountry($data)
    {
        $this->db->query("INSERT INTO country(code_of_country, name_of_country) VALUES(:code_of_country, :name_of_country)");
        //Bind values
        $this->db->bind(':code_of_country', $data['code_of_country']);
        $this->db->bind(':name_of_country', $data['name_of_country']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function addSpecialization($data)
    {
        $this->db->query("INSERT INTO specialization(name) VALUES(:name)");
        $this->db->bind(':name', $data['specialization']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }



    public function addDoctor($data)
    {
        $this->db->query("INSERT INTO doctor(id_person, id_specialization) VALUES(:id_person, :id_specialization)");
        //Bind values
        $this->db->bind(':id_person', $data['id_person']);
        $this->db->bind(':id_specialization', $data['specializations']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }

//    public function getCity()
//    {
//        $this->db->query("SELECT * FROM links where city = 'moscow'");
//        $resultsCity = $this->db->resultSet();
//        return $resultsCity;
//    }
}