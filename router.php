<?php

require 'controller/UserController.php';

class AuthMiddleware
{
    public function handle()
    {
        if (!isset($_SESSION['User'])) {
            header('Location: /login');
        }
    }
}

class GuestMiddleware
{
    public function handle()
    {
        if (isset($_SESSION['User'])) {
            header('Location: /home');
        }
    }
}

class router
{
    public $routes;
    public $controller;

    public function __construct()
    {
        $this->controller = new userController();
    }

    public function middleware($middleware){
        $this->routes[count($this->routes)-1]['middleware'] = $middleware;
    }

    public function post($uri, $controller)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => 'POST',
            'middleware' => NULL
        ];
        return $this;
    }

    public function route()
    {
        foreach ($this->routes as $route)
        {
            if ($route['uri'] === $_SERVER['REQUEST_URI'])
            {
                if($route["middleware"] === "auth"){
                    (new AuthMiddleware())->handle();
                }
                if ($route["middleware"] === "guest"){
                    (new GuestMiddleware())->handle();
                }

                $action = $route['controller'];

                switch ($action)
                {
                    case "main":
                        $this->controller->index();
                        break;
                    case "createUser":
                        $this->controller->createUser($_POST);
                        break;
                    case "login":
                        $this->controller->login();
                        break;
                    case "checkUser":
                        $this->controller->checkUser($_POST);
                        break;
                    case "home":
                        $this->controller->listOfProjects();
                        break;
                    case "createProject":
                        $this->controller->createProject($_POST);
                        break;
                    case "listOfTask":
                        $this->controller->listOfTask($_POST);
                        break;
                    case "addTask":
                        $this->controller->addTask($_POST);
                        break;
                    case "createTask":
                        $this->controller->createTask($_POST, $_FILES);
                        break;
                    case "allTasks":
                        $this->controller->allTasks($_POST);
                        break;
                    case "deleteTask":
                        $this->controller->deleteTask($_POST);
                        break;
                    case "restoreTask":
                        $this->controller->restoreTask($_POST);
                        break;
                    case "logout":
                        $this->controller->logout();
                        break;
                    default:
                        $this->controller->index();
                }
                $arr['controller'] =  $route['controller'];
            }

        }
        if(empty($arr['controller'])){
            require 'error.php';
        }
    }
}