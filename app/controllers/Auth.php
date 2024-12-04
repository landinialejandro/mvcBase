<?php

use app\libraries\Controller;


class Auth extends Controller {

    public function __construct() {
    }

    public function index() {
        $now   = new DateTimeImmutable();

        $data = [
            'title' => 'MVC Auth page',
        ];
        $this->view('auth/auth', $data);
    }
}
