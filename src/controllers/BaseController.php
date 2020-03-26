<?php

namespace artbyrab\Harmony\controllers;

use Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;

/**
 * Base controller
 * 
 * The base controller is designed to make it easy to extend other controllers
 * from. It will handle the work of constructing common utilities to be
 * used in all other controllers to save duplication of code.
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
     * @var string $views
     */
    protected $views;

    /**
     * Construct
     * 
     * @param object $container Is automatically injected.
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
}