<?php

namespace app\libraries;

use Exception;

class Controller {
    /**
     * Cargar un modelo
     */
    public function model(string $model) {
        $modelFile = "../app/models/{$model}.php";

        if (!file_exists($modelFile)) {
            throw new Exception("El modelo '{$model}' no existe.");
        }

        require_once $modelFile;

        if (!class_exists($model)) {
            throw new Exception("La clase '{$model}' no está definida en el modelo.");
        }

        return new $model();
    }

    /**
     * Cargar una vista
     */
    public function view(string $view, array $data = []) {
        $viewFile = "../app/views/{$view}.php";

        if (!file_exists($viewFile)) {
            throw new Exception("La vista '{$view}' no existe.");
        }

        // Convertir los datos a variables individuales
        extract($data);

        require_once $viewFile;
    }

    /**
     * Renderizar una vista con un layout (opcional)
     */
    public function render(string $layout, string $view, array $data = []) {
        $layoutFile = "../app/views/layouts/{$layout}.php";
        $viewFile = "../app/views/{$view}.php";

        if (!file_exists($layoutFile)) {
            throw new Exception("El layout '{$layout}' no existe.");
        }

        if (!file_exists($viewFile)) {
            throw new Exception("La vista '{$view}' no existe.");
        }

        // Convertir los datos a variables individuales
        extract($data);

        // Cargar el layout, que incluirá la vista
        include $layoutFile;
    }
}
