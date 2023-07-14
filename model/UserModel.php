<?php

class database
{
    public $conn;

    public function __construct()
    {
        try
        {
            $this->conn = new PDO('mysql:host=localhost;dbname=authoraized_pmt','admin','welcome');
        }
        catch (Exception $e)
        {
            die("Connection failed: ".$e->getMessage());
        }
    }
}

class userModel extends database
{
    public function insertUser($data)
    {
        $name = $data['username'];
        $email = $data['email'];
        $password = $data['pwd'];

        if ($email && $password)
        {
            $checkUserAlreadyExists = $this->conn->query("SELECT * FROM users WHERE email = '$email' OR password = '$password'");
            $exists = $checkUserAlreadyExists->fetchAll(PDO::FETCH_OBJ);

            if ($exists)
            {
                $_SESSION['signUpError'] = "User Already Exists";
                header('location: /');
            }
            else
            {
                try {
                    $this->conn->query("INSERT INTO users(username, email, password) VALUES ('$name', '$email', '$password')");

                    $_SESSION['User'] = $name;

                    header('location: /home');
                }
                catch (PDOException $e)
                {
                    die("User creation error: ".$e->getMessage());
                }
            }

        }
    }

    public function checkLoggingUser($data)
    {
        $email = $data['email'];
        $password = $data['pwd'];

        $echoingUsername = $this->conn->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
        $loginUserExists = $echoingUsername->fetchAll();
//        var_dump($loginUserExists[0]['username']);
        $_SESSION['User'] = $loginUserExists[0]['username'];

        if ($loginUserExists)
        {
            header('location: /home');
        }
        else
        {
            $_SESSION['Incorrect credentials'] = "Incorrect credentials";
            header('location: /login');
        }

    }

    public function insertProject($projectData)
    {
     $name = $projectData['project-name'];
     $manager = $projectData['manager'];

     $this->conn->query("INSERT INTO projects(project_name,manager) VALUES ('$name','$manager')");
     header('location: /home');
    }

    public function insertTask($taskDetails, $taskImage)
    {
        $projectId = $taskDetails['project_id'];
        $name = $taskDetails['task-name'];
        $allocatedPerson = $taskDetails['allocated-person'];
        $description = $taskDetails['description'];

        $image = $taskImage['image'];
        $filepath = "images/".$image["name"];
        move_uploaded_file($image["tmp_name"], "$filepath");

        $progress = $taskDetails['status'];

        $level1 = "Not Yet";
        $level2 = "In Progress";
        $level3 = "Completed";

        $status= "";
        switch ($progress)
        {
            case "not_yet":
                $status = $level1;
                break;
            case "in_progress":
                $status = $level2;
                break;
            case "completed":
                $status = $level3;
                break;
        }

        try {
            $this->conn->query("INSERT INTO tasks(task_name, allocated_person, description, image, status, projects_id, is_delete) VALUES ('$name', '$allocatedPerson', '$description', '$filepath', '$status', $projectId, 0)");
            header('location: /home');
        }
        catch (PDOException $e)
        {
            die("Execution Failed: ".$e->getMessage());
        }
    }

    public function fetchProject()
    {
        $fetchProject = $this->conn->query("SELECT * FROM projects");
        return $fetchProject->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetchDeletedTask($id)
    {
        $fetchDeletedTask = $this->conn->query("SELECT * FROM tasks WHERE projects_id = '$id' AND is_delete = 1");
        return $fetchDeletedTask->fetchAll(PDO::FETCH_OBJ);
    }

    public function fetchUnDeletedTask($id)
    {
        $fetchUnDeletedTask = $this->conn->query("SELECT * FROM tasks WHERE projects_id = '$id' AND is_delete = 0");
        return $fetchUnDeletedTask->fetchAll(PDO::FETCH_OBJ);
    }

    public function deleteTask($id)
    {
        $id = $id['task_id'];

        $this->conn->query("UPDATE tasks SET is_delete = 1 WHERE id = '$id'");
        header('location: /home');
    }

    public function restoreTask($id)
    {
        $id = $id['task_id'];

        $this->conn->query("UPDATE tasks SET is_delete = 0 WHERE id = '$id'");
        header('location: /home');
    }

    public function deletedTaskCount($id)
    {
        $deleteCount = $this->conn->query("SELECT COUNT(is_delete) FROM tasks WHERE projects_id = '$id' AND is_delete = 1");
        return $deleteCount->fetch(PDO::FETCH_OBJ);
    }

    public function unDeletedTaskCount($id)
    {
        $unDeleteCount = $this->conn->query("SELECT COUNT(is_delete) FROM tasks WHERE projects_id = '$id' AND is_delete = 0");
        return $unDeleteCount->fetch(PDO::FETCH_OBJ);
    }
}