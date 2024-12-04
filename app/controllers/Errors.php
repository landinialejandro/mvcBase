<?php

namespace app\controllers;

class Errors {
    public function index() {
        http_response_code(404);
        echo "Página no encontrada. Por favor, verifica la URL.";
    }
}
