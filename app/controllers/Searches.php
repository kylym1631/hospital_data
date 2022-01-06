<?php
class Searches extends Controller {
    public function __construct(){
        $this->searchModel = $this->model('Search');
        $this->fillModel = $this->model('Fill');
    }
    public $diseases,$chambers,$berths,$countries,$departments;

    public function index(){
        $this->diseases = $this->searchModel->getDiseases();
        $this->chambers = $this->searchModel->getChambers();
        $this->berths = $this->searchModel->getBerths();
        $this->countries =  $this->fillModel->getCountries();
        $this->departments = $this->searchModel->getDepartments();
        $data = [
            'diseases'=> $this->diseases,
            'chambers'=> $this->chambers,
            'berths'=>$this->berths,
            'countries'=>$this->countries,
            'departments'=>$this->departments,
        ];

        $this->view('searches/index', $data);
    }
    public function result()
    {

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
                'name'=>'',
                'surname' => '',
                'gender' => '',
                'country' => '',
                'chamber' => '',
                'berth' => '',
                'department' => '',
                'disease' => '',
                'patient_id' => '',
                'email'=>'',
                'pesel'=>'',
                'insurance'=>'',

            ];

            if ($emptyForms){
                $data['empty_forms_err'] = 'Form can\'t be empty';
            }

            if (!empty(($_POST['name']))){
                $data['name'] = trim($_POST['name']);
            }
            if (!empty(($_POST['surname']))){
                $data['surname'] = trim($_POST['surname']);
            }
            if (!empty(($_POST['gender']))){
                $data['gender'] = trim($_POST['gender']);
            }
            if (!empty(($_POST['country']))){
                $data['country'] = trim($_POST['country']);
            }
            if (!empty(($_POST['chamber']))){
                $data['chamber'] = trim($_POST['chamber']);
            }
            if (!empty(($_POST['berth']))){
                $data['berth'] = trim($_POST['berth']);
            }
            if (!empty(($_POST['department']))){
                $data['department'] = trim($_POST['department']);
            }
            if (!empty(($_POST['disease']))){
                $data['disease'] = trim($_POST['disease']);
            }
            if (!empty(($_POST['patient_id']))){
                $data['patient_id'] = trim($_POST['patient_id']);
            }
            if (!empty(($_POST['email']))){
                $data['email'] = trim($_POST['email']);
            }
            if (!empty(($_POST['pesel']))){
                $data['pesel'] = trim($_POST['pesel']);
            }
            if (!empty(($_POST['insurance']))){
                $data['insurance'] = trim($_POST['insurance']);
            }


            if (empty($data['empty_forms_err'])){
                if ($this->searchModel->getSearchResults($data))
                {
                      $data = $this->searchModel->getSearchResults($data);
                }

                flash('post_message', 'Person Added!');
            }else {
                //Return to add post page with data and error information
                header( "refresh:2;url=index" );
                $this->view('searches/index', $data);
            }



        }

        else {



        }



        $this->view('searches/result', $data);
    }
    public function show($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = $_POST;
            if (!empty($data['id_doctor']))
            {
                $doctor = $this->searchModel->getDoctor($data);
                array_push($data,$doctor);
            }

            $this->view('searches/show', $data);
        }


    }


}