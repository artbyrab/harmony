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
use Slim\Views\PhpRenderer;
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
 * Create a dependency injection container and the app.
 */
$container = new Container();
AppFactory::setContainer($container);
$app = AppFactory::create();

/**
 * Add the renderer 
 * 
 * This will add the renderer to the container. You can call it in the future 
 * using the following: 
 *  - $container->get('renderer');
 */
$container = $app->getContainer();
$container->set('renderer', function () {
    $renderer = new PhpRenderer(__DIR__ . '/src/views');
    return $renderer;
});

/**
 * Middleware
 */
$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

/** 
 * A typical route
 * 
 * We add text to the response body object before returning it.
 */
$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello Harmony!");
    return $response;
});

/**
 * MVC style controller routes
 * 
 * These work by using the $container we set up earlier. When the SiteController
 * class is instantiated the __construct method is already injected with the 
 * container. Thus allowing us access to the containers contents in the 
 * controller class.
 */
$app->get('/contact', \artbyrab\Harmony\controllers\SiteController::class . ':contact');
$app->get('/about', \artbyrab\Harmony\controllers\SiteController::class . ':about');
$app->get('/sitemap', \artbyrab\Harmony\controllers\SiteController::class . ':sitemap');

/**
 * Run 
 * 
 * Run the slim app.
 */
$app->run();
