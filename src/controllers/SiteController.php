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
     * @var object $renderer An instance of the Slim\Views\PhpRenderer class
     * for rendering views.
     */
    protected $renderer;

    /**
     * Construct
     * 
     * @param object $container Is automatically injected.
     */
    public function __construct(ContainerInterface $container) 
    {
        $this->container = $container;
        $this->renderer = $this->container->get('renderer');
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
    }

    /**
     * About sitemap
     * 
     * @param object $request
     * @param object $response
     * @param array $args
     */
    public function sitemap($request, $response, $args) 
    {
        return $this->renderer->render($response, "/site/about.php", $args);
    }
}