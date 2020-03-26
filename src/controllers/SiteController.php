<?php

namespace artbyrab\Harmony\controllers;

use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;

/**
 * Site controller
 * 
 * @author artbyrab
 */
class SiteController
{
    /**
     * @var object $container An instance of the container interface
     * automatically injected into the class via the entry script.
     */
   protected $container;

    /**
     * Construct
     * 
     * @param object $container Is automatically injected.
     */
    public function __construct(ContainerInterface $container) 
    {
        $this->container = $container;
    }

    /**
     * Index action
     * 
     * @param object $request
     * @param object $response
     * @param array $args
     */
    public function index($request, $response, $args) 
    {
        // your code
        // to access items in the container... $this->container->get('');
        return $response;
    }

    /**
     * Contact action
     * 
     * @param object $request
     * @param object $response
     * @param array $args
     */
    public function contact($request, $response, $args) 
    {
        $response->getBody()->write("Contact Harmony");

        return $response;
    }

    /**
     * About action
     * 
     * @param object $request
     * @param object $response
     * @param array $args
     */
    public function about($request, $response, $args) 
    {
        $renderer = new PhpRenderer(dirname(__DIR__, 1) . '/views');

        return $renderer->render($response, "/site/about.php", $args);
        
        return $response;
    }
}