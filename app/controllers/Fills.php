<?php
class Fills extends Controller {
    public function __construct(){
        $this->fillModel = $this->model('Fill');
    }

    public function index(){
        $countries = $this->fillModel->getCountries();
        $idPerson[] = $this->fillModel->getIdPerson();
        $doctorName = $this->fillModel->getDoctors();
        foreach ($idPerson as $person => $key)
        {
            $idPerson = $key;
        }
        $data = [
            'title' => 'FILL PATIENT INFO',
            'countries'=>$countries,
            'id_person'=>$idPerson,
            'doctors' => $doctorName,

        ];

        $this->view('fills/index', $data);
    }

    public function add()
    {
        $countries = $this->fillModel->getCountries();
        $doctorName = $this->fillModel->getDoctors();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //Sanitize the post

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'surname' => trim($_POST['surname']),
                'gender' => trim($_POST['gender']),
                'countries'=>$countries,
                'selected_country' => '',
                'email'=>'',
                'name_err' => '',
                'surname_err'=>'',
                'zip_code' =>'',
                'city' =>'',
                'street' =>'',
                'zip_code_err'=>'',
                'phone'=>'',
                'phone_err'=>'',
                'insurance'=>'',
                'insurance_err'=>'',
                'pesel'=>'',
                'pesel_err'=>'',
                'toms'=>'',
                'toms_err'=>'',
                'disease_name'=>'',
                'disease_name_err'=>'',
                'disease_period'=>'',
                'disease_period_err'=>'',
                'disease_treatment_start'=>'',
                'disease_treatment_start_err'=>'',
                'disease_treatment_end'=>'',
                'disease_treatment_end_err'=>'',
                'department'=>'',
                'department_err'=>'',
                'chamber'=>'',
                'berth'=>'',
                'doctors' => $doctorName,
                'doctor'=>'',
                'doctor_err'=>'',
                'arrival_time'=>'',
                'date_checked_out'=>'',



            ];


            //Validate data
            if (empty($data['name'])) {
                $data['name_err'] = 'Please enter name.';
            }
            if (empty($data['surname'])) {
                $data['surname_err'] = 'Please enter surname.';
            }
            if (!empty(($_POST['country']))){
                $data['selected_country'] = trim($_POST['country']);
            }
            if (!empty(($_POST['email']))){
                $data['email'] = trim($_POST['email']);
            }
            if (!empty(($_POST['zip_code'])) && strlen($_POST['zip_code']) < 7){
                $data['zip_code'] = trim($_POST['zip_code']);
            }
            if(strlen($_POST['zip_code']) > 6){
                $data['zip_code_err'] = 'Maximum character for zipcode is 6';
            }
            if (!empty(($_POST['city']))){
                $data['city'] = trim($_POST['city']);
            }
            if (!empty(($_POST['street']))){
                $data['street'] = trim($_POST['street']);
            }
            if (!empty(($_POST['phone'])) && strlen($_POST['phone']) < 11){
                $data['zip_code'] = trim($_POST['zip_code']);
            }
            if(strlen($_POST['phone']) > 10){
                $data['phone_err'] = 'Maximum character for phone is 10';
            }
            if (!empty(($_POST['insurance'])) && strlen($_POST['insurance']) < 11){
                $data['insurance'] = trim($_POST['insurance']);
            }
            if(strlen($_POST['insurance']) > 10){
                $data['insurance_err'] = 'Maximum character for insurance is 10';
            }
            if (!empty(($_POST['pesel'])) && strlen($_POST['pesel']) < 12){
                $data['pesel'] = trim($_POST['pesel']);
            }
            if(strlen($_POST['pesel']) > 11){
                $data['pesel_err'] = 'Maximum character for pesel is 11';
            }
            if (!empty(($_POST['toms'])) && strlen($_POST['toms']) < 21){
                $data['toms'] = trim($_POST['toms']);
            }
            if(strlen($_POST['toms']) > 20){
                $data['toms_err'] = 'Maximum character for type of medical service is 20';
            }
            if (!empty(($_POST['disease_name'])) && strlen($_POST['disease_name']) < 16){
                $data['disease_name'] = trim($_POST['disease_name']);
            }
            if(strlen($_POST['disease_name']) > 15){
                $data['disease_name_err'] = 'Maximum character for disease name is 15';
            }
            if (!empty(($_POST['disease_period'])) && strlen($_POST['disease_period']) < 21){
                $data['disease_period'] = trim($_POST['disease_period']);
            }
            if(strlen($_POST['disease_period']) > 20){
                $data['disease_period_err'] = 'Maximum character for disease period is 20';
            }
            if (!empty(($_POST['disease_treatment_start']))){
                $data['disease_treatment_start'] = trim($_POST['disease_treatment_start']);
            }
            if (!empty(($_POST['disease_treatment_end']))){
                $data['disease_treatment_end'] = trim($_POST['disease_treatment_end']);
            }
            if (!empty(($_POST['department'])) && strlen($_POST['department']) < 16){
                $data['department'] = trim($_POST['department']);
            }
            if(strlen($_POST['department']) > 15){
                $data['department_err'] = 'Maximum character for department is 15';
            }
            if (!empty(($_POST['chamber']))){
                $data['chamber'] = trim($_POST['chamber']);
            }
            if (!empty(($_POST['berth']))){
                $data['berth'] = trim($_POST['berth']);
            }
            if (!empty(($_POST['arrival_time']))){
                $data['arrival_time'] = trim($_POST['arrival_time']);
            }
            if (!empty(($_POST['date_checked_out']))){
                $data['date_checked_out'] = trim($_POST['date_checked_out']);
            }
            if (!empty(($_POST['indication']))){
                $data['indication'] = trim($_POST['indication']);
            }
            if ((empty(($_POST['doctor']))))
            {
                $data['doctor_err'] = 'Fill the doctor';
            }else{
                $data['doctor'] = trim($_POST['doctor']);
            }
//            echo '<pre>';
//            print_r($data);
//            echo '</pre>';
//            die();




            //Make sure no errors
            if (empty($data['name_err']) &&
                empty($data['surname_err']) &&
                empty($data['zip_code_err']) &&
                empty($data['phone_err']) &&
                empty($data['insurance_err']) &&
                empty($data['pesel_err']) &&
                empty($data['toms_err']) &&
                empty($data['disease_name_err']) &&
                empty($data['disease_period_err']) &&
                empty($data['doctor_err']) &&
                empty($data['department_err'])) {
                //Validated
                if ($this->fillModel->addPerson($data)) {
                    if (!empty($data['email'])){
                        $this->fillModel->addEmail($data);
                    }
                    if (!empty($data['phone'])){
                        $this->fillModel->addPhone($data);
                    }

                    if (!empty($data['zip_code']) || !empty($data['city']) || !empty($data['street'])){
                        $this->fillModel->addAddress($data);
                    }

                    $this->fillModel->addPatient($data);

                    if (!empty($data['insurance'])){
                        $this->fillModel->addInsurance($data);
                        $this->fillModel->addInsuranceToPatient($data);
                    }
                    if (!empty($data['toms'])){
                        $this->fillModel->addToms($data);
                    }
                    if (!empty($data['disease_name'])){
                        $this->fillModel->addDisease($data);
                    }
                    if (!empty($data['department'])){
                        $this->fillModel->addDepartment($data);
                    }
                    if (!empty($data['chamber'])){
                        $this->fillModel->addChamber($data);
                    }
                    if (!empty($data['berth'])){
                        $this->fillModel->addBerth($data);
                    }
                    $this->fillModel->addPatientHistory($data);

                    flash('post_message', 'Person Added!');
                    header( "refresh:1;url=index" );
                } else {
                    die('Something went wrong.');
                }
            } else {
                //Return to add post page with data and error information
                $this->view('fills/index', $data);
            }
        } else {
            $data = [
                'name' => '',
                'surname' => '',
                'countries'=>$countries,
                'doctors' => $doctorName,


            ];
        }
        $this->view('fills/index', $data);
    }

}