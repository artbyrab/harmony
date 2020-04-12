<?php

namespace artbyrab\Harmony\controllers;

use artbyrab\Harmony\controllers\BaseController;

/**
 * Site controller
 * 
 * @author artbyrab
 */
class SiteController extends BaseController
{
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
        $renderer = new \Slim\Views\PhpRenderer(dirname(__DIR__, 1) . '/views');

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