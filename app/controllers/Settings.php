<?php
class Settings extends Controller {
    public function __construct(){
        $this->settingModel = $this->model('Setting');
        $this->fillModel = $this->model('Fill');
    }

    public function index(){
        $specializations =  $this->settingModel->getSpecializations();

            $data = [
                'title' => 'Settings',
                'specializations'=>$specializations,

            ];


        $this->view('settings/index', $data);
    }
    public function add()
    {
        $specializations =  $this->settingModel->getSpecializations();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            //Sanitize the post

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $emptyForms = true;
            foreach ($_POST as $post=>$value) {
                if (!empty($value))
                {
                    $emptyForms = false;
                    break ;
                }


            }
            $data = [
                'empty_forms_err'=>'',
                'name' => trim($_POST['name']),
                'surname' => trim($_POST['surname']),
                'name_err' => '',
                'surname_err'=>'',
                'gender' => trim($_POST['gender']),
                'gender_err'=>'',
                'title' => 'Settings',
                'code_of_country'=>'',
                'code_of_country_err'=>'',
                'name_of_country'=>'',
                'name_of_country_err'=>'',
                'specialization'=>'',
                'specialization_err'=>'',
                'specializations'=>'',
                'specializations_err'=>'',

            ];
            if ($emptyForms){
                $data['empty_forms_err'] = 'Form can\'t be empty';
            }

            if (!empty(($_POST['code_of_country']))){
                $data['code_of_country'] = trim($_POST['code_of_country']);
            }
            if (!empty(($_POST['name_of_country']))){
                $data['name_of_country'] = trim($_POST['name_of_country']);
            }

            if (!empty($data['name_of_country']) && empty($data['code_of_country'])){
                $data['code_of_country_err'] = 'Fill both name and code of country';
            }
            if (!empty($data['code_of_country']) && empty($data['name_of_country'])){
                $data['name_of_country_err'] = 'Fill both name and code of country';
            }

            if (!empty(($_POST['specialization'])) && strlen($_POST['specialization']) < 21){
                $data['specialization'] = trim($_POST['specialization']);
            }
            if(strlen($_POST['specialization']) > 20){
                $data['specialization_err'] = 'Maximum character for specialization is 20';
            }

            if (!empty($_POST['name']) && empty($_POST['surname'])){
                $data['surname_err'] = 'Fill both name and surname of doctor';
            }
            if (!empty($_POST['surname']) && empty($_POST['name'])){
                $data['name_err'] = 'Fill both name and surname of doctor';
            }
            if ((empty($_POST['surname']) && empty($_POST['name'])) &&(!empty($_POST['specializations']) ||!empty($_POST['gender']))){
                $data['name_err'] = 'Fill both name and surname of doctor';
                $data['surname_err'] = 'Fill both name and surname of doctor';

            }
            if (!empty($_POST['surname']) && !empty($_POST['name']) && empty($_POST['specializations'])){
                $data['specializations_err'] = 'Fill specialization for doctor';
            }
            if (!empty($_POST['surname']) && !empty($_POST['name']) && empty($_POST['gender'])){
                $data['gender_err'] = 'Fill gender of the doctor';
            }
            if (!empty($_POST['surname']) && !empty($_POST['name']) && !empty($_POST['specializations']) && empty($_POST['gender'])){
                $data['gender_err'] = 'Select the gender';
            }
            if (!empty($_POST['surname']) && !empty($_POST['name']) && !empty($_POST['specializations'])){
                $data['name'] = trim($_POST['name']);
                $data['surname'] = trim($_POST['surname']);
                $data['specializations'] = trim($_POST['specializations']);

            }

            if (empty($data['empty_forms_err']) && empty($data['gender_err']) && empty($data['name_err']) && empty($data['surname_err']) && empty($data['specializations_err'])&& empty($data['name_of_country_err']) && empty($data['code_of_country_err']) && empty($data['specialization_err']))
            {


                if (!empty($data['name_of_country']) && !empty($data['code_of_country'])){
                    $this->settingModel->addCountry($data);
                }
                if (!empty($data['specialization'])){
                    $this->settingModel->addSpecialization($data);
                }

                if (!empty($data['name']) && !empty($data['surname']) && !empty($data['specializations'])){
                    $this->fillModel->addPerson($data);
                    $data['id_person'][] = $this->fillModel->getIdPerson();
                    foreach ($data['id_person'] as $person => $key)
                    {
                        $data['id_person'] = $key;
                    }
                    $this->settingModel->addDoctor($data);

                }








                flash('post_message', 'Person Added!');
                header( "refresh:1;url=index" );

            } else {
                //Return to add post page with data and error information
                $data['specializations'] = $specializations;
                $this->view('settings/index', $data);
            }
        } else {
            $data = [
                'name' => '',
                'surname' => '',
                'specializations'=>$specializations,

            ];
        }


        $this->view('settings/index', $data);

    }


}