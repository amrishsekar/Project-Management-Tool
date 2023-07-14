<?php

require 'model/UserModel.php';

class userController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new userModel();
    }

    public function index()
    {
        require 'view/signUp.php';
    }

    public function login()
    {
        require 'view/login.php';
    }

    public function createUser($userData)
    {
        $this->userModel->insertUser($userData);
    }

    public function checkUser($userLoginData)
    {
        $this->userModel->checkLoggingUser($userLoginData);
    }

    public function listOfProjects()
    {
        $project = $this->userModel->fetchProject();
        require 'view/home.php';
    }

    public function createProject($data)
    {
        if ($data)
        {
            $this->userModel->insertProject($data);
        }
        else
        {
            require 'view/project-create.php';
        }
    }

    public function listOfTask($id)
    {
        $projectId = $id['project_id'];
        $_SESSION['project_id'] = $projectId;

        $project = $this->userModel->fetchProject();
        require 'view/home.php';
    }

    public function addTask($id)
    {
        $projectId = $id['add-task'];
        require 'view/task-create.php';
    }

    public function createTask($details, $img)
    {
        if ($details)
        {
            $this->userModel->insertTask($details, $img);
        }
        else
        {
            var_dump($details);
        }
    }

    public function allTasks($id)
    {
        $deletedTasks = $this->userModel->fetchDeletedTask($id['view-tasks']);
        $unDeletedTasks = $this->userModel->fetchUnDeletedTask($id['view-tasks']);

        $deleteCount = $this->userModel->deletedTaskCount($id['view-tasks']);
        $unDeleteCount = $this->userModel->unDeletedTaskCount($id['view-tasks']);
        require 'view/all-tasks.php';
    }

    public function deleteTask($targetId)
    {
        $this->userModel->deleteTask($targetId);
    }

    public function restoreTask($targetId)
    {
        $this->userModel->restoreTask($targetId);
    }

    public function logout(){
        session_unset();
        session_destroy();
        header('location: /login');
    }
}