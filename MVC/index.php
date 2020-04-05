<?php

require __DIR__ . "/vendor/autoload.php";

session_start();

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

$router->namespace("App\Controller");

$router->group(null);
$router->get("/","Web:home");
$router->get("/newproduct","Web:newProduct");
$router->post("/addnewproduct","Web:addNewProduct");
$router->get("/login/admin","Web:loginAdmin");
$router->post("/loginAdminRealase","Web:loginAdminRealase");
$router->get("/dashboard","Web:dashboard");
$router->get("/seemore/{uri}","Web:seemore");
$router->get("/destroy","Web:destroy");

/**
 * Erro 
 */

$router->group("oops");
$router->get("/{errcode}","Web:error");


$router->dispatch();

if($router->error()){
    $router->redirect("/oops/{$router->error()}");
}

