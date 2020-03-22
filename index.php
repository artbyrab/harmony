<?php

/**
 * Composer autoload
 * 
 * Require the main composer autoload file to autoload our classes
 * and third party libraries.
 */
require "vendor/autoload.php";

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use artbyrab\Harmony\controllers\SiteController;

/**
 * Dotenv
 * 
 * Load the .env to pass the environment variables.
 */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

/**
 * Error reporting
 * 
 * If the app debug env is set to true let's show php errors.
 */
if ($_ENV['APP_DEBUG'] === true) {
    error_reporting(E_ALL); 
    ini_set('display_errors', '1');
}

/**
 * Slim PHP
 * 
 *  - Create a container that will get automatically injected into Controllers 
 *  when they are instantiated
 *  - Setup the middleware
 *  - Define routes
 *  - Run the app
 */
$container = new Container();
AppFactory::setContainer($container);

$app = AppFactory::create();

$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello Harmony!");
    return $response;
});

$app->run();


