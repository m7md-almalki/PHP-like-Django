<?php

$router = new Router();
$router->add("/", new Home());
$router->add("/login", new Login());
$router->add("/register", new Register());
$router->add("/logout", new Logout());
$router->add("/account", new Account());

?>