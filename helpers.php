<?php



function request_method() {
    return strtolower($_SERVER["REQUEST_METHOD"]);
}


function request_uri() {
    return $_SERVER["REQUEST_URI"];
}


function get_super_server(){
    foreach ($_SERVER as $name => $value){
        echo "{$name} = {$value}" . "<br><br>";
    }    
}


function get_super_get(){
    foreach ($_GET as $name => $value){
        echo "{$name} = {$value}" . "<br><br>";
    }    
}


function get_super_post(){
    foreach ($_POST as $name => $value){
        echo "{$name} = {$value}" . "<br><br>";
    }    
}


function redirect($path){
    header("Location: {$path}");
    exit();
}




function loadTemplate($path, $context=[]) {
    extract($context);
    require $path;
    exit();
}




function printt($variable) {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    echo "<br>";
}





function error_404(){
    http_response_code(404);
    loadTemplate("templates/errors/404.php");
}


function error_fatal(){
    http_response_code(400);
    loadTemplate("templates/errors/fatal.php");
}



function errors_handler() {
    if ((error_get_last()["type"] ?? null) == E_ERROR){
        error_fatal();
    }
}
register_shutdown_function("errors_handler");





?>
