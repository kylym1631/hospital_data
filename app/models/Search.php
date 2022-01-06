<?php
    class  Search{
    private $db;
    public function __construct(){
        $this->db = new Database;
    }

    public function getDiseases()
    {
        $this->db->query("SELECT id_disease,name FROM disease");
        $resultsDiseases = $this->db->resultSet();
        return $resultsDiseases;
    }

    public function getChambers()
    {
        $this->db->query("SELECT id_chamber,n_of_chamber FROM chamber");
        $resultsChamber = $this->db->resultSet();
        return $resultsChamber;
    }
    public function getBerths()
    {
        $this->db->query("SELECT id_berth,n_of_berth FROM berth");
        $resultsBerth = $this->db->resultSet();
        return $resultsBerth;
    }

    public function getDepartments()
    {
        $this->db->query("SELECT id_department,department FROM department");
        $resultsDepartment = $this->db->resultSet();
        return $resultsDepartment;
    }

    public function getSearchResults($data)
    {
        $name ='';
        $surname = '';
        $email = '';
        $patient_id = '';
        $disease = '';
        $chamber = '';
        $berth = '';
        $gender = '';
        $country = '';
        $department = '';
        $pesel = '';
        $insurance = '';
        if (!empty($data['name']))
        {
            $name ='person.name = :name';
            $name = $name.' and ';
        }
        if (!empty($data['surname']))
        {
            $surname = 'person.surname = :surname';
            $surname = $surname. ' and ';
        }
        if (!empty($data['email']))
        {
            $email = 'email.email = :email';
            $email = $email. ' and ';
        }
        if (!empty($data['patient_id']))
        {
            $patient_id = 'patient.id_patient = :id_patient';
            $patient_id = $patient_id. ' and ';
        }
        if (!empty($data['disease']))
        {
            $disease = 'disease.name = :disease_name';
            $disease = $disease. ' and ';
        }
        if (!empty($data['chamber']))
        {
            $chamber = 'chamber.n_of_chamber = :chamber';
            $chamber = $chamber. ' and ';
        }
        if (!empty($data['berth']))
        {
            $berth = 'berth.n_of_berth = :berth';
            $berth = $berth. ' and ';
        }
        if (!empty($data['gender']))
        {
            $gender = 'gender.`name` = :gender';
            $gender = $gender. ' and ';
        }
        if (!empty($data['country']))
        {
            $country = 'country.id_country = :country';
            $country = $country. ' and ';
        }
        if (!empty($data['department']))
        {
            $department = 'department.department = :department';
            $department = $department. ' and ';
        }
        if (!empty($data['pesel']))
        {
            $pesel = 'patient.pesel = :pesel';
            $pesel = $pesel. ' and ';
        }
        if (!empty($data['insurance']))
        {
            $insurance = 'insurance.`name` = :insurance';
            $insurance = $insurance. ' and ';
        }
        $whereQuery = $name.$surname.$email.$patient_id.$disease.$chamber.$berth.$gender.$country.$department.$pesel.$insurance;
        $whereQuery = substr($whereQuery,0,-4);
        $this->db->query("
select person.*,
country.code_of_country,country.name_of_country,country.id_country as id_co_co,
patient.pesel,patient.id_insurance,patient.id_patient,patient.id_person as id_pe_pa,
insurance.id_insurance as id_in_in,insurance.`name` as insurance_name,insurance.id_patient as id_pa_ins,
chamber.id_chamber,chamber.n_of_chamber,chamber.id_patient as id_pa_ch,
berth.id_berth,berth.n_of_berth,berth.id_chamber as id_ch_be,
type_of_medical_service.id_patient as id_pa_to,type_of_medical_service.`name` as service_type, type_of_medical_service.id_toms,
gender.`name` as gender_name,
disease.`name` as disease_name, disease.id_disease, disease.period_of_disease, disease.disease_treatment_start, disease.disease_treatment_end,disease.toms,disease.id_patient as id_pa_di,
email.email,email.id_mail,email.id_person as id_pe_em,
address.id_address,address.city,address.street,address.zip_code,address.id_person as id_pe_ad,
phone.id_phone,phone.phone_number,phone.id_person as id_pe_ph,
patient_history.id_doctor as id_do_hi ,patient_history.arrival_time, patient_history.date_checked_out, patient_history.indication, patient_history.id_patient_history, patient_history.id_patient as id_pa_hi,
doctor.id_doctor,doctor.id_specialization,doctor.id_person as id_doctor_person,
department.department,department.id_department,department.id_patient as id_pa_de
from patient inner join person using (id_person) 
INNER join gender  USING (id_gender) 
LEFT join country on country.id_country = person.id_country
LEFT join email on email.id_person = person.id_person
LEFT join address on address.id_person = person.id_person
LEFT join phone on phone.id_person = person.id_person
LEFT join insurance on patient.id_insurance = insurance.id_insurance
LEFT join chamber on patient.id_patient = chamber.id_patient
LEFT join berth on chamber.id_chamber = berth.id_chamber
LEFT join type_of_medical_service on patient.id_patient = type_of_medical_service.id_patient
LEFT join disease on patient.id_patient = disease.id_patient
LEFT join patient_history on patient.id_patient = patient_history.id_patient
LEFT join doctor on patient_history.id_doctor = doctor.id_doctor
LEFT join department on patient.id_patient = department.id_patient
            where (
            $whereQuery
            );
                    
                    ");
        if (!empty($data['name'])) {
            $this->db->bind(':name', $data['name']);
        }
        if (!empty($data['surname'])) {
            $this->db->bind(':surname', $data['surname']);
        }
        if (!empty($data['email']))
        {
            $this->db->bind(':email', $data['email']);
        }
        if (!empty($data['patient_id']))
        {
            $this->db->bind(':id_patient', $data['patient_id']);
        }
        if (!empty($data['disease']))
        {
            $this->db->bind(':disease', $data['disease']);
        }
        if (!empty($data['chamber']))
        {
            $this->db->bind(':chamber', $data['chamber']);
        }
        if (!empty($data['berth']))
        {
            $this->db->bind(':berth', $data['berth']);
        }
        if (!empty($data['gender']))
        {
            $this->db->bind(':gender', $data['gender']);
        }
        if (!empty($data['country']))
        {
            $this->db->bind(':country', $data['country']);
        }
        if (!empty($data['department']))
        {
            $this->db->bind(':department', $data['department']);
        }
        if (!empty($data['pesel']))
        {
            $this->db->bind(':pesel', $data['pesel']);
        }
        if (!empty($data['insurance']))
        {
            $this->db->bind(':insurance', $data['insurance']);
        }
        $resultsSearch = $this->db->resultSet();
        return $resultsSearch;

    }


    public function getDoctor($data)
    {
        $this->db->query("
        select  doctor.*,specialization.id_specialization,specialization.`name` as specialization_name
        ,person.name as doctor_name,person.surname as doctor_surname 
        from doctor
        inner join person using (id_person)
        LEFT JOIN specialization using (id_specialization)
        where doctor.id_doctor = :id_doctor");
        $this->db->bind(':id_doctor', $data['id_doctor']);
        $resultDoctor = $this->db->resultSet();
        return $resultDoctor;
    }
}