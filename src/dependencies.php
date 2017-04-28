<?php

$container = $app->getContainer();

// Twig
$container['view'] = function ($container) {
    $view = new \Slim\Views\Twig(__DIR__.'/../templates', [
        'cache' => false 
    ]);
    $view->addExtension(new \Slim\Views\TwigExtension($container->router,$container->request->getUri()));
    return $view;
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};


// controllers
$container['HomeController'] = function ($container){
    return new \App\Controllers\HomeController($container);
};

// TODO: Add controllers