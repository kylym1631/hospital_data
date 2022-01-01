<?php
class Infos extends Controller {
    public function __construct(){
        $this->infoModel = $this->model('Info');
    }

    public function index(){
        $data = [
            'title' => 'Log in',
        ];

        $this->view('infos/index', $data);
    }


}