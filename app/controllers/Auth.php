<?php
use app\libraries\Controller;
class Auth extends Controller {

    public function __construct() {
    }

    public function index() {

        $data = [
            'title' => 'MVC Auth page',
        ];
        $this->view('auth/auth', $data);
    }

}
