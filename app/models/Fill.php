<?php
    class  Fill
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getCountries()
        {
            $this->db->query("SELECT * FROM country");
            $resultsCountry = $this->db->resultSet();
            return $resultsCountry;
        }

        public function getIdPerson()
        {
            $this->db->query("SELECT MAX(id_person) FROM person");
            $resultIdPerson = $this->db->single();
            foreach ($resultIdPerson as $person => $key)
            {
                $resultIdPerson = $key;
            }
            return $resultIdPerson;
        }
        public function getIdPatient()
        {
            $this->db->query("SELECT MAX(id_patient) FROM patient");
            $resultIdPatient = $this->db->single();
            foreach ($resultIdPatient as $person => $key)
            {
                $resultIdPatient = $key;
            }
            return $resultIdPatient;
        }
        public function getIdInsurance()
        {
            $this->db->query("SELECT MAX(id_insurance) FROM insurance");
            $resultIdInsurance = $this->db->single();
            foreach ($resultIdInsurance as $person => $key)
            {
                $resultIdInsurance = $key;
            }
            return $resultIdInsurance;
        }
        public function getIdToms()
        {
            $this->db->query("SELECT MAX(id_toms) FROM type_of_medical_service");
            $resultIdToms = $this->db->single();
            foreach ($resultIdToms as $person => $key)
            {
                $resultIdToms = $key;
            }
            return $resultIdToms;

        }
        public function getIdChamber()
        {
            $this->db->query("SELECT MAX(id_chamber) FROM chamber");
            $resultIdChamber = $this->db->single();
            foreach ($resultIdChamber as $person => $key)
            {
                $resultIdChamber = $key;
            }
            return $resultIdChamber;

        }
        public function getDoctors()
        {
            $this->db->query("SELECT * FROM person INNER JOIN doctor on person.id_person = doctor.id_person");
            $resultsDoctors = $this->db->resultSet();
            return $resultsDoctors;
        }

    public function addPerson($data)
    {
        $country = '';
        $idCountry='';
        if (!empty($data['selected_country'])){
            $country = ', :country';
            $idCountry = ', id_country';
        }
        $this->db->query("INSERT INTO person (name, surname, id_gender $idCountry) VALUES (:name, :surname, :id_gender $country)");
        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':surname', $data['surname']);
        if ($data['gender'] == 'male'){
            $data['gender'] =1;
        }elseif($data['gender'] == 'female'){
            $data['gender'] =2;
        }else{
            $data['gender'] =3;
        }
        $this->db->bind(':id_gender', $data['gender']);
        if (!empty($data['selected_country'])){
            $this->db->bind(':country', $data['selected_country']);
        }
        //Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }
    public function addEmail($data)
    {
        $data['id_person'][] = $this->getIdPerson();
        foreach ($data['id_person'] as $person => $key)
        {
            $data['id_person'] = $key;
        }
        $this->db->query("INSERT INTO email(email,id_person) values (:email, :id_person)");
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':id_person', $data['id_person']);
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }

        public function addAddress($data)
        {
            $zipCode = '';
            $sZipCode = "";
            $city = "";
            $sCity = "";
            $street = "";
            $sStreet = "";
            if (!empty($data['zip_code'])){
                $zipCode = ', :zip_code';
                $sZipCode = ', zip_code';
            }
            if (!empty($data['city'])){
                $city = ', :city';
                $sCity = ', city';
            }
            if (!empty($data['street'])){
                $street = ', :street';
                $sStreet = ', street';
            }
            $data['id_person'][] = $this->getIdPerson();
            foreach ($data['id_person'] as $person => $key)
            {
                $data['id_person'] = $key;
            }
            $this->db->query("INSERT INTO address(id_person $sZipCode $sCity $sStreet) values (:id_person $zipCode $city $street)");
            $this->db->bind(':id_person', $data['id_person']);
            if (!empty($data['zip_code'])){
                $this->db->bind(':zip_code', $data['zip_code']);
            }
            if (!empty($data['city'])){
                $this->db->bind(':city', $data['city']);

            }
            if (!empty($data['street'])){
                $this->db->bind(':street', $data['street']);

            }

            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function addPhone($data)
        {
            $data['id_person'] = $this->getIdPerson();
            foreach ($data['id_person'] as $person => $key)
            {
                $data['id_person'] = $key;
            }
            $this->db->query("INSERT INTO phone(phone_number,id_person) values (:phone_number, :id_person)");
            $this->db->bind(':phone_number', $data['phone']);
            $this->db->bind(':id_person', $data['id_person']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function addInsurance($data)
        {
            $data['id_patient'][] = $this->getIdPatient();
            foreach ($data['id_patient'] as $person => $key)
            {
                $data['id_patient'] = $key;
            }
            $this->db->query("INSERT INTO insurance(name,id_patient) values (:name, :id_patient)");
            $this->db->bind(':name', $data['insurance']);
            $this->db->bind(':id_patient', $data['id_patient']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function addPatient($data)
        {
            $pesel = "";
            $sPesel = "";
            if (!empty($data['pesel'])){
                $pesel = ', :pesel';
                $sPesel = ', pesel';
            }

            $data['id_person'][] = $this->getIdPerson();
            foreach ($data['id_person'] as $person => $key)
            {
                $data['id_person'] = $key;
            }
            $this->db->query("INSERT INTO patient(id_person $sPesel ) values (:id_person $pesel )");
            $this->db->bind(':id_person', $data['id_person']);
            if (!empty($data['pesel'])){
                $this->db->bind(':pesel', $data['pesel']);
            }



            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function addInsuranceToPatient($data)
        {
            $data['id_insurance'] = $this->getIdInsurance();
            $data['id_patient'] = $this->getIdPatient();
            $this->db->query("UPDATE patient SET id_insurance = :id_insurance WHERE id_patient = :id_patient");
            $this->db->bind(':id_insurance', $data['id_insurance']);
            $this->db->bind(':id_patient', $data['id_patient']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }
        public function addToms($data)
        {
            $data['id_patient'][] = $this->getIdPatient();
            foreach ($data['id_patient'] as $person => $key)
            {
                $data['id_patient'] = $key;
            }
            $this->db->query("INSERT INTO type_of_medical_service(name,id_patient) values (:name, :id_patient)");
            $this->db->bind(':name', $data['toms']);
            $this->db->bind(':id_patient', $data['id_patient']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function addDisease($data)
        {
            $data['id_patient'][] = $this->getIdPatient();
            foreach ($data['id_patient'] as $person => $key)
            {
                $data['id_patient'] = $key;
            }
            $period = "";
            $sPeriod = "";
            $ts = "";
            $sTs = "";
            $te = "";
            $sTe = "";
            $toms = "";
            $sToms = "";
            if (!empty($data['disease_period'])){
                $period = ', :period_of_disease';
                $sPeriod = ', period_of_disease';
            }
            if (!empty($data['disease_treatment_start'])){
                $ts = ', :disease_treatment_start';
                $sTs = ', disease_treatment_start';
            }
            if (!empty($data['disease_treatment_end'])){
                $te = ', :disease_treatment_end';
                $sTe = ', disease_treatment_end';
            }
            if (!empty($data['toms'])){
                $toms = ', :toms';
                $sToms = ', toms';
                $data['id_toms'] = $this->getIdToms();

            }

            $this->db->query("INSERT INTO disease(name $sPeriod $sTs $sTe $sToms,id_patient) values (:name $period $ts $te $toms, :id_patient)");
            $this->db->bind(':name', $data['disease_name']);
            if (!empty($data['disease_period'])){
                $this->db->bind(':period_of_disease', $data['disease_period']);
            }
            if (!empty($data['disease_treatment_start'])){
                $this->db->bind(':disease_treatment_start', $data['disease_treatment_start']);
            }
            if (!empty($data['disease_treatment_end'])){
                $this->db->bind(':disease_treatment_end', $data['disease_treatment_end']);
            }

            if (!empty($data['toms'])){
                $this->db->bind(':toms', $data['id_toms']);
            }


            $this->db->bind(':id_patient', $data['id_patient']);



            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function addDepartment($data)
        {
            $data['id_patient'][] = $this->getIdPatient();
            foreach ($data['id_patient'] as $person => $key)
            {
                $data['id_patient'] = $key;
            }
            $this->db->query("INSERT INTO department(department,id_patient) values (:department, :id_patient)");
            $this->db->bind(':department', $data['department']);
            $this->db->bind(':id_patient', $data['id_patient']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }
        public function addChamber($data)
        {
            $data['id_patient'][] = $this->getIdPatient();
            foreach ($data['id_patient'] as $person => $key)
            {
                $data['id_patient'] = $key;
            }
            $this->db->query("INSERT INTO chamber(n_of_chamber,id_patient) values (:chamber, :id_patient)");
            $this->db->bind(':chamber', $data['chamber']);
            $this->db->bind(':id_patient', $data['id_patient']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function addBerth($data)
        {
            $data['id_chamber'] = $this->getIdChamber();
            $this->db->query("INSERT INTO berth(n_of_berth,id_chamber) values (:berth, :id_chamber)");
            $this->db->bind(':berth', $data['berth']);
            $this->db->bind(':id_chamber', $data['id_chamber']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

        }

        public function addPatientHistory($data)
        {
            $data['id_patient'][] = $this->getIdPatient();
            foreach ($data['id_patient'] as $person => $key)
            {
                $data['id_patient'] = $key;
            }
            $arTime = '';
            $sArTime = '';
            $chOut = '';
            $sChOut = '';
            $indic = '';
            $sIndic = '';
            if (!empty($data['arrival_time'])){
                $arTime = ', :arrival_time';
                $sArTime = ', arrival_time';
            }
            if (!empty($data['date_checked_out'])){
                $chOut = ', :date_checked_out';
                $sChOut = ', date_checked_out';
            }
            if (!empty($data['indication'])){
                $indic = ', :indication';
                $sIndic = ', indication';
            }

            $this->db->query("INSERT INTO patient_history(id_patient $sArTime $sChOut $sIndic,id_doctor) values (:id_patient $arTime $chOut $indic,:id_doctor)");
            if (!empty($data['arrival_time'])){
                $this->db->bind(':arrival_time', $data['arrival_time']);
            }
            if (!empty($data['date_checked_out'])){
                $this->db->bind(':date_checked_out', $data['date_checked_out']);
            }
            if (!empty($data['indication'])){
                $this->db->bind(':indication', $data['indication']);
            }
            $this->db->bind(':id_patient', $data['id_patient']);
            $this->db->bind(':id_doctor', $data['doctor']);
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

}