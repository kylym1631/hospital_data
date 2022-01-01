<?php
  class Pages extends Controller {
    public function __construct(){
        $this->pageModel = $this->model('Page');
    }
    
    public function index(){
//        $gender =  $this->pageModel->getGender();
        $data = [
        'title' => 'Log in',
//        'gender'=>$gender
      ];



      $this->view('pages/index', $data);
    }


    public function about(){
      $data = [
        'title' => 'About Us'
      ];

      $this->view('pages/about', $data);
    }


  }