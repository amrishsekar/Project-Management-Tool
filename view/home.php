<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <title>Home page</title>
    <!---->
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: #2b2b2b;
        }
        .container {
            display: flex;
            justify-content: start;
            gap: 20px;
            margin: 0;
        }
        .username{
            color: antiquewhite;
            background-color: #02182e;
            padding: 10px;
            text-align: center;
        }
        .create-btn, .tasks-btn, .delete-btn {
            text-decoration: none;
            background-color: forestgreen;
            color: white;
            font-size: 18px;
            height: 40px;
            border-radius: 20px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            border: none;
            width: 250px;
        }
        .project-list{
            background: #02182e;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            color: antiquewhite;
            padding: 10px 20px;
            border-radius: 10px;
        }
        button.btn.btn-primary {
            width: 250px;
        }
        span{
            font-size: 30px;
            color: #ffffff;
            margin-left: 5px;
        }
    </style>
    <!---->
</head>
<body>
<div class="name">
<h3 class="username">Hello, <?= $_SESSION['User']; ?> Welcome back:)</h3>
</div>
<div class="container">
    <div class="project-list">
        <h1>All Projects</h1>

        <a class="create-btn" href="/view/project-create.php">Add New <span>+</span></a>

        <?php foreach ($project as $projectDatum): ?>
            <form action="/listOfTask" method="post">
                <button class="btn btn-primary" name="project_id" value="<?= $projectDatum->id ?>"><?= $projectDatum->project_name; ?></button>
            </form>
        <?php endforeach; ?>
    </div>

    <?php if (isset($_SESSION['project_id'])): ?>
        <form action="/allTasks" method="post">
            <button class="btn btn-primary" name="view-tasks" value="<?= $_SESSION['project_id']; ?>">View Tasks</button>
        </form>
    <?php endif; ?>
    <br><br>
    <br><br>
    <?php if (isset($_SESSION['project_id'])): ?>
        <form action="/addTask" method="post">
            <button class="btn btn-primary" value="<?= $_SESSION['project_id']; ?>" name="add-task">Add Task</button>
        </form>
    <?php endif; ?>

    <form action="/logout" method="post">
        <button class="btn btn-primary">Logout</button>
    </form>


</div>
</body>
</html>