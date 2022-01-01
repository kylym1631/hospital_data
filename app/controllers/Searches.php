<?php
class Searches extends Controller {
    public function __construct(){
        $this->searchModel = $this->model('Search');
    }

    public function index(){
        $data = [
            'title' => 'Log in',
        ];

        $this->view('searches/index', $data);
    }


}