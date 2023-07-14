<?php

////Showing the error in UI:-
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
session_start();

require 'router.php';

$server = new router();

$server->post("/", "main")->middleware("guest");
$server->post("/createUser", "createUser")->middleware("guest");
$server->post("/login", "login")->middleware("guest");
$server->post("/checkUser", "checkUser")->middleware("guest");
$server->post("/home", "home")->middleware("auth");
$server->post("/createProject", "createProject")->middleware("auth");
$server->post("/listOfTask", "listOfTask")->middleware("auth");
$server->post("/addTask", "addTask")->middleware("auth");
$server->post("/createTask", "createTask")->middleware("auth");
$server->post("/allTasks", "allTasks")->middleware("auth");
$server->post("/deleteTask", "deleteTask")->middleware("auth");
$server->post("/restoreTask", "restoreTask")->middleware("auth");
$server->post("/logout", "logout")->middleware("auth");
$server->route();
