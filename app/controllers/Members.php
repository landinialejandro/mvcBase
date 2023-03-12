<?php
class Members extends Controller {
    protected $Model;
    public function __construct() {
        $this->Model = $this->model('Member');
    }
    public function index() {
            
        $data = [
            'title'=>'MVC Members',
        ];
        $this->view('members/index',$data);
    }
}