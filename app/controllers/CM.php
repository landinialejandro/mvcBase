<?php
//Create Model
use libraries\Controller;
class CM extends Controller  {
    protected $Model;
    public function __construct() {
        $this->Model = $this->model('CreateModel');
    }
    public function index() {
            
        $data = [
            'title'=>'MVC MODEL',
            'base'=> $this->Model->CreateClassesFiles(),
        ];
        $this->view('CreateModel/index',$data);
    }
}