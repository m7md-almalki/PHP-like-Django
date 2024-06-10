<?php
require "settings.php";
require "database.php";
require "helpers.php";
require "Router.php";
require "view.php";
require "urls.php";
require "session.php";


// ini_set('display_errors', '0');

Session::start();

$database = new Database();

$router->route(request_uri());


?>