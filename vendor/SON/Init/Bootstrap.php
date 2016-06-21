<?php

namespace SON\Init;

abstract class Bootstrap
{
    /**
     * @var array
     */
    protected $routes;

    /**
     * @var array
     */
    protected $configDb;

    private static $con;

    public function __construct()
    {
        self::$con = $this->configDb;
        $this->run($this->getUrl());
    }

    public static function getDb()
    {
        try {
            $host     = self::$con["host"];
            $dbname   = self::$con["dbname"];
            $username = self::$con["username"];
            $password = self::$con["password"];

            $db = new \PDO("mysql:host={$host};dbname={$dbname}", $username, $password);
            return $db;
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            die;
        }
    }

    protected function setRoutes(array $routes)
    {

    }

    protected function getUrl()
    {
        return parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    }

    protected function run($url)
    {
        array_walk($this->routes, function($route) use ($url){
            if($url == $route['route']){
                $class = "App\\Controllers\\". ucfirst($route['controller']);
                $controller = new $class;
                $controller->$route['action']();
            }
        });
    }
}