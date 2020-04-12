<?php

namespace artbyrab\Harmony\controllers;

use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;

/**
 * Base controller
 * 
 * This is a base controller that can be extended by other controllers. This 
 * will handle common functionality like setting the container and the 
 * renderer.
 * 
 * @author artbyrab
 */
abstract class BaseController
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
}