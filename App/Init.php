<?php
namespace App;

use SON\Init\Bootstrap;

class Init extends Bootstrap
{
    protected $routes = array(
        'home' => array(
            'route' => '/',
            'controller' => 'index',
            'action' => 'index'
        ),
        'empresa' => array(
            'route' => '/empresa',
            'controller' => 'index',
            'action' => 'empresa'
        ),
    );

    protected $configDb = array(
        "host" => 'localhost',
        "dbname" => 'mvc',
        "username" => 'root',
        "password" => 'root'
    );
}