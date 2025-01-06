<?php
// * file: app/libraries/Core.php
namespace app\libraries;
use app\controllers\Errors;

class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $parameters = [];

    public function __construct() {
        $url = $this->getUrl();

        // Procesar el controlador
        if (!is_null($url) && $this->controllerExists($url[0])) {
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

        // Incluir y crear la instancia del controlador
        require_once "../app/controllers/{$this->currentController}.php";
        $this->currentController = new $this->currentController;

        // Procesar el método
        if (isset($url[1]) && $this->methodExists($this->currentController, $url[1])) {
            $this->currentMethod = $url[1];
            unset($url[1]);
        }

        // Obtener parámetros restantes
        $this->parameters = $url ? array_values($url) : [];

        // Llamar al método del controlador con los parámetros
        call_user_func_array([$this->currentController, $this->currentMethod], $this->parameters);
    }

    /**
     * Obtener y procesar la URL.
     */
    private function getUrl() {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode('/', $url);
        }
        return null;
    }

    /**
     * Verificar si un controlador existe.
     */
    private function controllerExists($controller): bool {
        $controllerFile = "../app/controllers/" . ucwords($controller) . ".php";
        if (file_exists($controllerFile)) {
            return true;
        }
        error_log("[Core Error] El controlador '{$controller}' no existe.");
        return false;
    }

    /**
     * Verificar si un método existe en el controlador.
     */
    private function methodExists($controller, $method): bool {
        if (method_exists($controller, $method)) {
            return true;
        }
        error_log("[Core Error] El método '{$method}' no existe en el controlador '{$controller}'.");
        return false;
    }

    /**
     * Redirigir a una página de error.
     */
    private function redirectToErrorPage() {
        require_once '../app/controllers/Errors.php';
        $errorController = new Errors();
        $errorController->index();
        exit;
    }
}
