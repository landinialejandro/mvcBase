<?php  

namespace app\helpers;
sec_session_start();

// Flash message helper
// EXAMPLE - flash('register_success', 'You are now registered');
// DISPLAY IN VIEW - echo flash('register_success');
function flash($name = '', $message = '', $class = 'alert alert-success') {
    if (!empty($name)) {
        if (!empty($message) && empty($_SESSION[$name])) {
            if (!empty($_SESSION[$name])) unset($_SESSION[$name]);
            if (!empty($_SESSION[$name . '_class'])) unset($_SESSION[$name . '_class']);

            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } elseif (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}

function sec_session_start() {
    // Obliga a las sesiones a solo utilizar cookies.
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        die('Could not initiate a safe session (ini_set)');
    }
    // Obtiene los params de los cookies actuales.
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params(
        $cookieParams["lifetime"],
        $cookieParams["path"],
        $cookieParams["domain"],
        true,   //If true cookie will only be sent over secure connections.
        true    //$httponly Esto detiene que JavaScript sea capaz de acceder a la identificación de la sesión.
    );

    session_name('sec_session_id');     // Configura un nombre de sesión personalizado..
    session_start();                    // Inicia la sesión PHP.
    session_regenerate_id();            // Regenera la sesión, borra la previa. 
}

function isLoggedIn() {
    return isset($_SESSION['member_id']) && isset($_SESSION['member_username']) && isset($_SESSION['login_string']);
}
function currentUserId() {
    if (!isLoggedIn()) return false;
    return $_SESSION['member_id'];
}

function rndSalt() {
    return hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
}

function showErr($err) {
    $_SESSION['err'][] = $err;
    redirect('pages/error');
}
function alert_msg($msg = "", $title = "Alert!", $class = "alert-danger") {
?>
    <div class="alert <?php echo $class ?> alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> <?php echo $title ?></h5>
        <?php echo $msg ?>
    </div>
<?php
}

function sanitizeData($request_vars = []) {
    //TODO hay sanitizar $data viene del $__POST
    $form_vars = array();
    foreach ($request_vars as $key => $value) {
        $var_text = trim(addslashes($value));
        $form_vars[$key] = $var_text;
    }
    return $form_vars;
}

function isAjaxRequest() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&  $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

// function isPostMethod() {
//     return $_SERVER['REQUEST_METHOD'] == 'POST';
// }
// function isGetMethod() {
//     return $_SERVER['REQUEST_METHOD'] == 'GET';
// }
// function isPutMethod() {
//     return $_SERVER['REQUEST_METHOD'] == 'PUT';
// }
// function isDeleteMethod() {
//     return $_SERVER['REQUEST_METHOD'] == 'DELETE';
// }

function checkMethod($request): bool {
    return $_SERVER['REQUEST_METHOD'] == strtoupper($request);
}

function getCurrentPageURL() {
    $defaultPort = "80";
    $pageURL = 'http';
    if (array_key_exists('HTTPS', $_SERVER) && $_SERVER["HTTPS"] == "on") {
        $pageURL .= "s";
        $defaultPort = "443";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != $defaultPort) {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    $pageURL = trim($pageURL, '/');
    return $pageURL;
}
